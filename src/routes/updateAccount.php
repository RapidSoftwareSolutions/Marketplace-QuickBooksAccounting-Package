<?php
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

$app->post('/api/QuickBooksAccounting/updateAccount', function ($request, $response, $args) {
        $settings = $this->settings;     if(isset($post_data['args']['sandbox']) == 1){         $settings['api_url'] = 'https://sandbox-quickbooks.api.intuit.com/v3/';     }

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'accessToken', 'tokenSecret', 'name', 'companyId', 'accountType', 'accountId', 'syncToken']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $body['Name'] = $post_data['args']['name'];
    $body['Id'] = $post_data['args']['accountId'];
    $body['AccountType'] = $post_data['args']['accountType'];
    $body['SyncToken'] = $post_data['args']['syncToken'];
    if (isset($post_data['args']['accountSubType']) && strlen($post_data['args']['accountSubType']) > 0) {
        $body['AccountSubType'] = $post_data['args']['accountSubType'];
    }
    if (isset($post_data['args']['acctNum']) && strlen($post_data['args']['acctNum']) > 0) {
        $body['AcctNum'] = $post_data['args']['acctNum'];
    }
    if (isset($post_data['args']['description']) && strlen($post_data['args']['description']) > 0) {
        $body['Description'] = $post_data['args']['description'];
    }
    if (isset($post_data['args']['accountAlias']) && strlen($post_data['args']['accountAlias']) > 0) {
        $body['AccountAlias'] = $post_data['args']['accountAlias'];
    }
    if (isset($post_data['args']['txnLocationType']) && strlen($post_data['args']['txnLocationType']) > 0) {
        $body['TxnLocationType'] = $post_data['args']['txnLocationType'];
    }
    if (isset($post_data['args']['active']) && strlen($post_data['args']['active']) > 0) {
        $body['Active'] = $post_data['args']['active'];
    }
    if (isset($post_data['args']['classification']) && strlen($post_data['args']['classification']) > 0) {
        $body['Classification'] = $post_data['args']['classification'];
    }
    if (isset($post_data['args']['taxCodeRefId']) && strlen($post_data['args']['taxCodeRefId']) > 0) {
        $body['TaxCodeRef']['value'] = $post_data['args']['taxCodeRefId'];
    }
    if (isset($post_data['args']['taxCodeRefName']) && strlen($post_data['args']['taxCodeRefName']) > 0) {
        $body['TaxCodeRef']['name'] = $post_data['args']['taxCodeRefName'];
    }
    if (isset($post_data['args']['parentRefId']) && strlen($post_data['args']['parentRefId']) > 0) {
        $body['ParentRef']['value'] = $post_data['args']['parentRefId'];
    }
    if (isset($post_data['args']['parentRefName']) && strlen($post_data['args']['parentRefName']) > 0) {
        $body['ParentRef']['name'] = $post_data['args']['parentRefName'];
    }
    if (isset($post_data['args']['currencyRefId']) && strlen($post_data['args']['currencyRefId']) > 0) {
        $body['CurrencyRef']['value'] = $post_data['args']['currencyRefId'];
    }
    if (isset($post_data['args']['currencyRefName']) && strlen($post_data['args']['currencyRefName']) > 0) {
        $body['CurrencyRef']['name'] = $post_data['args']['currencyRefName'];
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
        $resp = $client->request('POST', 'company/' . $post_data['args']['companyId'] . '/account', ['auth' => 'oauth', 'json' => $body]);
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