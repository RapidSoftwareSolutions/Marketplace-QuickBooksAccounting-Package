<?php
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

$app->post('/api/QuickBooksAccounting/updateEmployee', function ($request, $response, $args) {
        $settings = $this->settings;     if(isset($post_data['args']['sandbox']) == 1){         $settings['api_url'] = 'https://sandbox-quickbooks.api.intuit.com/v3/';     }

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'accessToken', 'tokenSecret', 'companyId', 'employeeId', 'syncToken', 'givenName', 'familyName']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API

    $body['Id'] = $post_data['args']['employeeId'];
    $body['SyncToken'] = $post_data['args']['syncToken'];
    $body['sparse'] = true;
    $body['GivenName'] = $post_data['args']['givenName'];
    $body['FamilyName'] = $post_data['args']['familyName'];

    if (isset($post_data['args']['title']) && strlen($post_data['args']['title']) > 0) {
        $body['Title'] = $post_data['args']['title'];
    }

    if (isset($post_data['args']['middleName']) && strlen($post_data['args']['middleName']) > 0) {
        $body['MiddleName'] = $post_data['args']['middleName'];
    }

    if (isset($post_data['args']['suffix']) && strlen($post_data['args']['suffix']) > 0) {
        $body['Suffix'] = $post_data['args']['suffix'];
    }
    if (isset($post_data['args']['organization']) && strlen($post_data['args']['organization']) > 0) {
        $body['Organization'] = $post_data['args']['organization'];
    }
    if (isset($post_data['args']['displayName']) && strlen($post_data['args']['displayName']) > 0) {
        $body['DisplayName'] = $post_data['args']['displayName'];
    }

    if (isset($post_data['args']['printOnCheckName']) && strlen($post_data['args']['printOnCheckName']) > 0) {
        $body['PrintOnCheckName'] = $post_data['args']['printOnCheckName'];
    }
    if (isset($post_data['args']['active']) && strlen($post_data['args']['active']) > 0) {
        $body['Active'] = $post_data['args']['active'];
    }
    if (isset($post_data['args']['primaryPhone']) && strlen($post_data['args']['primaryPhone']) > 0) {
        $body['PrimaryPhone']['FreeFormNumber'] = $post_data['args']['primaryPhone'];
    }

    if (isset($post_data['args']['mobile']) && strlen($post_data['args']['mobile']) > 0) {
        $body['Mobile']['FreeFormNumber'] = $post_data['args']['mobile'];
    }
    if (isset($post_data['args']['primaryEmailAddr']) && strlen($post_data['args']['primaryEmailAddr']) > 0) {
        $body['PrimaryEmailAddr']['Address'] = $post_data['args']['primaryEmailAddr'];
    }
    if (isset($post_data['args']['employeeNumber']) && strlen($post_data['args']['employeeNumber']) > 0) {
        $body['EmployeeNumber'] = $post_data['args']['employeeNumber'];
    }
    if (isset($post_data['args']['ssn']) && strlen($post_data['args']['ssn']) > 0) {
        $body['SSN'] = $post_data['args']['ssn'];
    }
    if (isset($post_data['args']['primaryAddr']) && strlen($post_data['args']['primaryAddr']) > 0) {
        $body['PrimaryAddr'] = $post_data['args']['primaryAddr'];
    }
    if (isset($post_data['args']['billableTime']) && strlen($post_data['args']['billableTime']) > 0) {
        $body['BillableTime'] = $post_data['args']['billableTime'];
    }
    if (isset($post_data['args']['billRate']) && strlen($post_data['args']['billRate']) > 0) {
        $body['BillRate'] = $post_data['args']['billRate'];
    }
    if (isset($post_data['args']['birthDate']) && strlen($post_data['args']['birthDate']) > 0) {
        $body['BirthDate'] = $post_data['args']['birthDate'];
    }
    if (isset($post_data['args']['gender']) && strlen($post_data['args']['gender']) > 0) {
        $body['Gender'] = $post_data['args']['gender'];
    }
    if (isset($post_data['args']['hiredDate']) && strlen($post_data['args']['hiredDate']) > 0) {
        $body['HiredDate'] = $post_data['args']['hiredDate'];
    }
    if (isset($post_data['args']['releasedDate']) && strlen($post_data['args']['releasedDate']) > 0) {
        $body['ReleasedDate'] = $post_data['args']['releasedDate'];
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
        $resp = $client->request('POST', 'company/' . $post_data['args']['companyId'] . '/employee', ['auth' => 'oauth', 'json' => $body]);
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