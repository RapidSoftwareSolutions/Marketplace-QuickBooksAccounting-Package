<?php
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

$app->post('/api/QuickBooksAccounting/updateCreditCardBillpayment', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'accessToken', 'tokenSecret', 'billpaymentId', 'companyId', 'syncToken', 'billpaymentLines', 'vendorRefId', 'totalAmt', 'ccAccountRefId']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $body['Id'] = $post_data['args']['billpaymentId'];
    $body['SyncToken'] = $post_data['args']['syncToken'];
    $body['Line'] = $post_data['args']['billpaymentLines'];
    $body['TotalAmt'] = $post_data['args']['totalAmt'];
    $body['PayType'] = 'CreditCard';
    $body['VendorRef']['value'] = $post_data['args']['vendorRefId'];
    $body['CreditCardPayment']['CCAccountRef']['value'] = $post_data['args']['ccAccountRefId'];
    if (isset($post_data['args']['ccAccountRefName']) && strlen($post_data['args']['ccAccountRefName']) > 0) {
        $body['CreditCardPayment']['CCAccountRef']['name'] = $post_data['args']['ccAccountRefName'];
    }
    if (isset($post_data['args']['metadataCreateTime']) && strlen($post_data['args']['metadataCreateTime']) > 0) {
        $body['Metadata']['CreateTime'] = $post_data['args']['metadataCreateTime'];
    }
    if (isset($post_data['args']['metadataUpdateTime']) && strlen($post_data['args']['metadataUpdateTime']) > 0) {
        $body['Metadata']['LastUpdatedTime'] = $post_data['args']['metadataUpdateTime'];
    }
    if (isset($post_data['args']['docNumber']) && strlen($post_data['args']['docNumber']) > 0) {
        $body['docNumber'] = $post_data['args']['docNumber'];
    }
    if (isset($post_data['args']['txnDate']) && strlen($post_data['args']['txnDate']) > 0) {
        $body['TxnDate'] = $post_data['args']['txnDate'];
    }
    if (isset($post_data['args']['departmentRefId']) && strlen($post_data['args']['departmentRefId']) > 0) {
        $body['DepartmentRef']['value'] = $post_data['args']['departmentRefId'];
    }
    if (isset($post_data['args']['departmentRefName']) && strlen($post_data['args']['departmentRefName']) > 0) {
        $body['DepartmentRef']['name'] = $post_data['args']['departmentRefName'];
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
    if (isset($post_data['args']['privateNote']) && strlen($post_data['args']['privateNote']) > 0) {
        $body['PrivateNote'] = $post_data['args']['privateNote'];
    }

    if (isset($post_data['args']['vendorRefName']) && strlen($post_data['args']['vendorRefName']) > 0) {
        $body['VendorRef']['name'] = $post_data['args']['vendorRefName'];
    }
    if (isset($post_data['args']['apAccountRefId']) && strlen($post_data['args']['apAccountRefId']) > 0) {
        $body['APAccountRef']['value'] = $post_data['args']['apAccountRefId'];
    }
    if (isset($post_data['args']['apAccountRefName']) && strlen($post_data['args']['apAccountRefName']) > 0) {
        $body['APAccountRef']['name'] = $post_data['args']['apAccountRefName'];
    }
    if (isset($post_data['args']['processBillPayment']) && strlen($post_data['args']['processBillPayment']) > 0) {
        $body['ProcessBillPayment'] = $post_data['args']['processBillPayment'];
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
//
    try {
        $resp = $client->request('POST', 'company/' . $post_data['args']['companyId'] . '/billpayment', ['auth' => 'oauth', 'json' => $body]);
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