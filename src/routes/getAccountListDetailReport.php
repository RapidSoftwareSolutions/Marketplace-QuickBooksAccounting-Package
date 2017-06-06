<?php
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

$app->post('/api/QuickBooksAccounting/getAccountListDetailReport', function ($request, $response, $args) {
        $settings = $this->settings;     if(isset($post_data['args']['sandbox']) == 1){         $settings['api_url'] = 'https://sandbox-quickbooks.api.intuit.com/v3/';     }

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'accessToken', 'tokenSecret', 'companyId']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $stack = HandlerStack::create();

    $middleware = new Oauth1([
        'consumer_key' => $post_data['args']['apiKey'],
        'consumer_secret' => $post_data['args']['apiSecret'],
        'token' => $post_data['args']['accessToken'],
        'token_secret' => $post_data['args']['tokenSecret']
    ]);
    $stack->push($middleware);
    $body = array();
    if (isset($post_data['args']['accountStatus']) && strlen($post_data['args']['accountStatus']) > 0) {
        $body['account_status'] = $post_data['args']['accountStatus'];
    }
    if (isset($post_data['args']['accountType']) && strlen($post_data['args']['accountType']) > 0) {
        $body['account_type'] = $post_data['args']['accountType'];
    }
    if (isset($post_data['args']['columns']) && strlen($post_data['args']['columns']) > 0) {
        $body['columns'] = $post_data['args']['columns'];
    }
    if (isset($post_data['args']['createdateMacro']) && strlen($post_data['args']['createdateMacro']) > 0) {
        $body['createdate_macro'] = $post_data['args']['createdateMacro'];
    }
    if (isset($post_data['args']['moddateMacro']) && strlen($post_data['args']['moddateMacro']) > 0) {
        $body['moddate_macro'] = $post_data['args']['moddateMacro'];
    }
    if (isset($post_data['args']['sortBy']) && strlen($post_data['args']['sortBy']) > 0) {
        $body['sort_by'] = $post_data['args']['sortBy'];
    }
    if (isset($post_data['args']['sortOrder']) && strlen($post_data['args']['sortOrder']) > 0) {
        $body['sort_order'] = $post_data['args']['sortOrder'];
    }
    if (isset($post_data['args']['startDate']) && strlen($post_data['args']['startDate']) > 0) {
        $body['start_date'] = $post_data['args']['startDate'];
    }
    if (isset($post_data['args']['endDate']) && strlen($post_data['args']['endDate']) > 0) {
        $body['end_date'] = $post_data['args']['endDate'];
    }
    if (isset($post_data['args']['startModdate']) && strlen($post_data['args']['startModdate']) > 0) {
        $body['start_moddate'] = $post_data['args']['startModdate'];
    }
    if (isset($post_data['args']['endModdate']) && strlen($post_data['args']['endModdate']) > 0) {
        $body['end_moddate'] = $post_data['args']['endModdate'];
    }
    //requesting remote API
    $client = new GuzzleHttp\Client([
        'headers' => [
            'Accept' => 'application/json'
        ],
        'base_uri' => $settings['api_url'],
        'handler' => $stack
    ]);
    try {
        $resp = $client->request('GET', 'company/' . $post_data['args']['companyId'] . '/reports/AccountList', ['auth' => 'oauth', 'query' => $body]);
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