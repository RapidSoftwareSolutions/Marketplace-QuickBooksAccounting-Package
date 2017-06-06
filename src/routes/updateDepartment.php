<?php
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

$app->post('/api/QuickBooksAccounting/updateDepartment', function ($request, $response, $args) {
        $settings = $this->settings;     if(isset($post_data['args']['sandbox']) == 1){         $settings['api_url'] = 'https://sandbox-quickbooks.api.intuit.com/v3/';     }

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'accessToken', 'tokenSecret', 'name', 'companyId', 'departmentId', 'syncToken']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $body['Name'] = $post_data['args']['name'];
    $body['Id'] = $post_data['args']['departmentId'];
    $body['SyncToken'] = $post_data['args']['syncToken'];
    if (isset($post_data['args']['parentRefId']) && strlen($post_data['args']['parentRefId']) > 0) {
        $body['ParentRef']['value'] = $post_data['args']['parentRefId'];
    }
    if (isset($post_data['args']['parentRefName']) && strlen($post_data['args']['parentRefName']) > 0) {
        $body['ParentRef']['name'] = $post_data['args']['parentRefName'];
    }
    if (isset($post_data['args']['fullyQualifiedName']) && strlen($post_data['args']['fullyQualifiedName']) > 0) {
        $body['FullyQualifiedName'] = $post_data['args']['fullyQualifiedName'];
    }
    if (isset($post_data['args']['active']) && strlen($post_data['args']['active']) > 0) {
        $body['Active'] = $post_data['args']['active'];
    }
    if (isset($post_data['args']['subDepartment']) && strlen($post_data['args']['subDepartment']) > 0) {
        $body['SubDepartment'] = $post_data['args']['subDepartment'];
    }

    $stack = HandlerStack::create();

    $middleware = new Oauth1([
        'consumer_key' => $post_data['args']['apiKey'],
        'consumer_secret' => $post_data['args']['apiSecret'],
        'token' => $post_data['args']['accessToken'],
        'token_secret' => $post_data['args']['tokenSecret']
    ]);
    $stack->push($middleware);
    //requesting remote API
    $client = new GuzzleHttp\Client([
        'headers' => [
            'Accept' => 'application/json'
        ],
        'base_uri' => $settings['api_url'],
        'handler' => $stack
    ]);

    try {
        $resp = $client->request('POST', 'company/' . $post_data['args']['companyId'] . '/department', ['auth' => 'oauth', 'json' => $body]);
        $responseBody = $resp->getBody()->getContents();
        $rawBody = json_decode($resp->getBody());
        $all_data[] = $rawBody;
        if ($response->getStatusCode() == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($all_data) ? $all_data : json_decode($all_data);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {
        $responseBody = $exception->getResponse()->getReasonPhrase();
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $responseBody;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\BadResponseException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    }


    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});