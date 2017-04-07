<?php
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

$app->post('/api/QuickBooksAccounting/updatePurchase', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'accessToken', 'tokenSecret', 'purchaseId', 'companyId', 'syncToken', 'paymentType', 'purchaseLines', 'accountRefId']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $body['Id'] = $post_data['args']['purchaseId'];
    $body['sparse'] = false;
    $body['SyncToken'] = $post_data['args']['syncToken'];
    $body['PaymentType'] = $post_data['args']['paymentType'];

    $body['Line'] = $post_data['args']['purchaseLines'];


    $body['AccountRef']['value'] = $post_data['args']['accountRefId'];

    if (isset($post_data['args']['accountRefName']) && strlen($post_data['args']['accountRefName']) > 0) {
        $body['AccountRef']['name'] = $post_data['args']['accountRefName'];
    }


    if (isset($post_data['args']['metadataCreateTime']) && strlen($post_data['args']['metadataCreateTime']) > 0) {
        $body['Metadata']['CreateTime']['dateTime'] = $post_data['args']['metadataCreateTime'];
    }
    if (isset($post_data['args']['metadataUpdateTime']) && strlen($post_data['args']['metadataUpdateTime']) > 0) {
        $body['Metadata']['LastUpdatedTime']['dateTime'] = $post_data['args']['metadataUpdateTime'];
    }
    if (isset($post_data['args']['docNumber']) && strlen($post_data['args']['docNumber']) > 0) {
        $body['DocNumber'] = $post_data['args']['docNumber'];
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
    if (isset($post_data['args']['txnTaxDetail']) && strlen($post_data['args']['txnTaxDetail']) > 0) {
        $body['TxnTaxDetail'] = $post_data['args']['txnTaxDetail'];
    }

    if (isset($post_data['args']['paymentMethodRefId']) && strlen($post_data['args']['paymentMethodRefId']) > 0) {
        $body['PaymentMethodRef']['value'] = $post_data['args']['paymentMethodRefId'];
    }
    if (isset($post_data['args']['paymentMethodRefName']) && strlen($post_data['args']['paymentMethodRefName']) > 0) {
        $body['PaymentMethodRef']['name'] = $post_data['args']['paymentMethodRefName'];
    }
    if (isset($post_data['args']['entityRefId']) && strlen($post_data['args']['entityRefId']) > 0) {
        $body['EntityRef']['value'] = $post_data['args']['entityRefId'];
    }
    if (isset($post_data['args']['entityRefName']) && strlen($post_data['args']['entityRefName']) > 0) {
        $body['EntityRef']['name'] = $post_data['args']['entityRefName'];
    }
    if (isset($post_data['args']['credit']) && strlen($post_data['args']['credit']) > 0) {
        $body['Credit'] = $post_data['args']['credit'];
    }
    if (isset($post_data['args']['txnSource']) && strlen($post_data['args']['txnSource']) > 0) {
        $body['TxnSource'] = $post_data['args']['txnSource'];
    }
    if (isset($post_data['args']['globalTaxCalculation']) && strlen($post_data['args']['globalTaxCalculation']) > 0) {
        $body['GlobalTaxCalculation'] = $post_data['args']['globalTaxCalculation'];
    }
    if (isset($post_data['args']['totalAmt']) && strlen($post_data['args']['totalAmt']) > 0) {
        $body['TotalAmt'] = $post_data['args']['totalAmt'];
    }
    if (isset($post_data['args']['printStatus']) && strlen($post_data['args']['printStatus']) > 0) {
        $body['PrintStatus'] = $post_data['args']['printStatus'];
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
        $resp = $client->request('POST', 'company/' . $post_data['args']['companyId'] . '/purchase', ['auth' => 'oauth', 'json' => $body]);
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