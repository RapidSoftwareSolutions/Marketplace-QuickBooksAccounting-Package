<?php
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

$app->post('/api/QuickBooksAccounting/updateCreditmemo', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'accessToken', 'tokenSecret', 'creditMemoId', 'companyId', 'syncToken', 'creditMemoLines']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $body['Id'] = $post_data['args']['creditMemoId'];
    $body['SyncToken'] = $post_data['args']['syncToken'];
    $body['Line'] = $post_data['args']['creditMemoLines'];


    if (isset($post_data['args']['customField']) && strlen($post_data['args']['customField']) > 0) {
        $body['CustomField'] = $post_data['args']['customField'];
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
    if (isset($post_data['args']['txnTaxDetail']) && strlen($post_data['args']['txnTaxDetail']) > 0) {
        $body['TxnTaxDetail'] = $post_data['args']['txnTaxDetail'];
    }
    if (isset($post_data['args']['customerRefId']) && strlen($post_data['args']['customerRefId']) > 0) {
        $body['CustomerRef']['value'] = $post_data['args']['customerRefId'];
    }
    if (isset($post_data['args']['customerRefName']) && strlen($post_data['args']['customerRefName']) > 0) {
        $body['CustomerRef']['name'] = $post_data['args']['customerRefName'];
    }
    if (isset($post_data['args']['customerMemo']) && strlen($post_data['args']['customerMemo']) > 0) {
        $body['CustomerMemo']['value'] = $post_data['args']['customerMemo'];
    }
    if (isset($post_data['args']['billAddr']) && strlen($post_data['args']['billAddr']) > 0) {
        $body['BillAddr'] = $post_data['args']['billAddr'];
    }
    if (isset($post_data['args']['shipAddr']) && strlen($post_data['args']['shipAddr']) > 0) {
        $body['ShipAddr'] = $post_data['args']['shipAddr'];
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
    if (isset($post_data['args']['globalTaxCalculation']) && strlen($post_data['args']['globalTaxCalculation']) > 0) {
        $body['GlobalTaxCalculation'] = $post_data['args']['globalTaxCalculation'];
    }
    if (isset($post_data['args']['totalAmt']) && strlen($post_data['args']['totalAmt']) > 0) {
        $body['TotalAmt'] = $post_data['args']['totalAmt'];
    }

    if (isset($post_data['args']['applyTaxAfterDiscount']) && strlen($post_data['args']['applyTaxAfterDiscount']) > 0) {
        $body['ApplyTaxAfterDiscount'] = $post_data['args']['applyTaxAfterDiscount'];
    }
    if (isset($post_data['args']['printStatus']) && strlen($post_data['args']['printStatus']) > 0) {
        $body['PrintStatus'] = $post_data['args']['printStatus'];
    }
    if (isset($post_data['args']['emailStatus']) && strlen($post_data['args']['emailStatus']) > 0) {
        $body['EmailStatus'] = $post_data['args']['emailStatus'];
    }
    if (isset($post_data['args']['billEmail']) && strlen($post_data['args']['billEmail']) > 0) {
        $body['BillEmail'] = $post_data['args']['billEmail'];
    }
    if (isset($post_data['args']['balance']) && strlen($post_data['args']['balance']) > 0) {
        $body['Balance'] = $post_data['args']['balance'];
    }
    if (isset($post_data['args']['paymentMethodRefId']) && strlen($post_data['args']['paymentMethodRefId']) > 0) {
        $body['PaymentMethodRef']['value'] = $post_data['args']['paymentMethodRefId'];
    }
    if (isset($post_data['args']['paymentMethodRefName']) && strlen($post_data['args']['paymentMethodRefName']) > 0) {
        $body['PaymentMethodRef']['name'] = $post_data['args']['paymentMethodRefName'];
    }
    if (isset($post_data['args']['remainingCredit']) && strlen($post_data['args']['remainingCredit']) > 0) {
        $body['RemainingCredit'] = $post_data['args']['remainingCredit'];
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
        $resp = $client->request('POST', 'company/' . $post_data['args']['companyId'] . '/creditmemo', ['auth' => 'oauth', 'json' => $body]);
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