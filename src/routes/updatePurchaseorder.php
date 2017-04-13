<?php
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

$app->post('/api/QuickBooksAccounting/updatePurchaseorder', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'accessToken', 'tokenSecret', 'purchaseorderId', 'companyId', 'syncToken', 'purchaseorderLines', 'vendorRefId', 'aPAccountRefID']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $body['Id'] = $post_data['args']['purchaseorderId'];
    $body['SyncToken'] = $post_data['args']['syncToken'];

    $body['Line'] = $post_data['args']['purchaseorderLines'];

    $body['VendorRef']['value'] = $post_data['args']['vendorRefId'];

    if (isset($post_data['args']['vendorRefName']) && strlen($post_data['args']['vendorRefName']) > 0) {
        $body['VendorRef']['name'] = $post_data['args']['vendorRefName'];
    }
    $body['APAccountRef']['value'] = $post_data['args']['aPAccountRefID'];

    if (isset($post_data['args']['aPAccountRefName']) && strlen($post_data['args']['aPAccountRefName']) > 0) {
        $body['APAccountRef']['name'] = $post_data['args']['aPAccountRefName'];
    }

    if (isset($post_data['args']['customField']) && strlen($post_data['args']['customField']) > 0) {
        $body['CustomField'] = $post_data['args']['customField'];
    }
    if (isset($post_data['args']['docNumber']) && strlen($post_data['args']['docNumber']) > 0) {
        $body['DocNumber'] = $post_data['args']['docNumber'];
    }
    if (isset($post_data['args']['txnDate']) && strlen($post_data['args']['txnDate']) > 0) {
        $body['TxnDate'] = $post_data['args']['txnDate'];
    }
    if (isset($post_data['args']['privateNote']) && strlen($post_data['args']['privateNote']) > 0) {
        $body['PrivateNote'] = $post_data['args']['privateNote'];
    }
    if (isset($post_data['args']['linkedTxn']) && strlen($post_data['args']['linkedTxn']) > 0) {
        $body['LinkedTxn'] = $post_data['args']['linkedTxn'];
    }
    if (isset($post_data['args']['totalAmt']) && strlen($post_data['args']['totalAmt']) > 0) {
        $body['TotalAmt'] = $post_data['args']['totalAmt'];
    }
    if (isset($post_data['args']['memo']) && strlen($post_data['args']['memo']) > 0) {
        $body['Memo'] = $post_data['args']['memo'];
    }
    if (isset($post_data['args']['classRefId']) && strlen($post_data['args']['classRefId']) > 0) {
        $body['ClassRef']['value'] = $post_data['args']['classRefId'];
    }
    if (isset($post_data['args']['classRefName']) && strlen($post_data['args']['classRefName']) > 0) {
        $body['ClassRef']['name'] = $post_data['args']['classRefName'];
    }
    if (isset($post_data['args']['salesTermRefId']) && strlen($post_data['args']['salesTermRefId']) > 0) {
        $body['SalesTermRef']['value'] = $post_data['args']['salesTermRefId'];
    }
    if (isset($post_data['args']['salesTermRefName']) && strlen($post_data['args']['salesTermRefName']) > 0) {
        $body['SalesTermRef']['name'] = $post_data['args']['salesTermRefName'];
    }
    if (isset($post_data['args']['dueDate']) && strlen($post_data['args']['dueDate']) > 0) {
        $body['DueDate']['date'] = $post_data['args']['dueDate'];
    }
    if (isset($post_data['args']['vendorAddr']) && strlen($post_data['args']['vendorAddr']) > 0) {
        $body['VendorAddr'] = $post_data['args']['vendorAddr'];
    }
    if (isset($post_data['args']['shipAddr']) && strlen($post_data['args']['shipAddr']) > 0) {
        $body['ShipAddr'] = $post_data['args']['shipAddr'];
    }
    if (isset($post_data['args']['shipMethodRefId']) && strlen($post_data['args']['shipMethodRefId']) > 0) {
        $body['ShipMethodRef']['value'] = $post_data['args']['shipMethodRefId'];
    }
    if (isset($post_data['args']['shipMethodRefName']) && strlen($post_data['args']['shipMethodRefName']) > 0) {
        $body['ShipMethodRef']['name'] = $post_data['args']['shipMethodRefName'];
    }
    if (isset($post_data['args']['poStatus']) && strlen($post_data['args']['poStatus']) > 0) {
        $body['POStatus'] = $post_data['args']['poStatus'];
    }
    if (isset($post_data['args']['txnTaxDetail']) && strlen($post_data['args']['txnTaxDetail']) > 0) {
        $body['TxnTaxDetail'] = $post_data['args']['txnTaxDetail'];
    }
    if (isset($post_data['args']['currencyRefId']) && strlen($post_data['args']['currencyRefId']) > 0) {
        $body['CurrencyRef']['value'] = $post_data['args']['currencyRefId'];
    }
    if (isset($post_data['args']['currencyRefName']) && strlen($post_data['args']['currencyRefName']) > 0) {
        $body['CurrencyRef']['name'] = $post_data['args']['currencyRefName'];
    }
    if (isset($post_data['args']['exchangeRate']) && strlen($post_data['args']['exchangeRate']) > 0) {
        $body['ExchangeRate'] = $post_data['args']['exchangeRate'];
    }
    if (isset($post_data['args']['globalTaxCalculation']) && strlen($post_data['args']['globalTaxCalculation']) > 0) {
        $body['GlobalTaxCalculation'] = $post_data['args']['globalTaxCalculation'];
    }
    if (isset($post_data['args']['transactionLocationType']) && strlen($post_data['args']['transactionLocationType']) > 0) {
        $body['TransactionLocationType'] = $post_data['args']['transactionLocationType'];
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
        $resp = $client->request('POST', 'company/' . $post_data['args']['companyId'] . '/purchaseorder', ['auth' => 'oauth', 'json' => $body]);
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