<?php
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

$app->post('/api/QuickBooksAccounting/createItem', function ($request, $response, $args) {
        $settings = $this->settings;     if(isset($post_data['args']['sandbox']) == 1){         $settings['api_url'] = 'https://sandbox-quickbooks.api.intuit.com/v3/';     }

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'accessToken', 'tokenSecret', 'name', 'companyId']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $body['Name'] = $post_data['args']['name'];

    if (isset($post_data['args']['incomeAccountRefId']) && strlen($post_data['args']['incomeAccountRefId']) > 0) {
        $body['IncomeAccountRef']['value'] = $post_data['args']['incomeAccountRefId'];
    }
    if (isset($post_data['args']['incomeAccountRefName']) && strlen($post_data['args']['incomeAccountRefName']) > 0) {
        $body['IncomeAccountRef']['name'] = $post_data['args']['incomeAccountRefName'];
    }
    if (isset($post_data['args']['expenseAccountRefId']) && strlen($post_data['args']['expenseAccountRefId']) > 0) {
        $body['ExpenseAccountRef']['value'] = $post_data['args']['expenseAccountRefId'];
    }
    if (isset($post_data['args']['expenseAccountRefName']) && strlen($post_data['args']['expenseAccountRefName']) > 0) {
        $body['ExpenseAccountRef']['name'] = $post_data['args']['expenseAccountRefName'];
    }
    if (isset($post_data['args']['assetAccountRefId']) && strlen($post_data['args']['assetAccountRefId']) > 0) {
        $body['AssetAccountRef']['value'] = $post_data['args']['assetAccountRefId'];
    }
    if (isset($post_data['args']['assetAccountRefName']) && strlen($post_data['args']['assetAccountRefName']) > 0) {
        $body['AssetAccountRef']['name'] = $post_data['args']['assetAccountRefName'];
    }
    if (isset($post_data['args']['invStartDate']) && strlen($post_data['args']['invStartDate']) > 0) {
        $body['InvStartDate'] = $post_data['args']['invStartDate'];
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

//    var_dump(        $resp = $client->request('POST', 'company/' . $post_data['args']['companyId'] . '/item', ['auth' => 'oauth', 'json' => $body]));
//    exit();

    try {
        $resp = $client->request('POST', 'company/' . $post_data['args']['companyId'] . '/item', ['auth' => 'oauth', 'json' => $body]);
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