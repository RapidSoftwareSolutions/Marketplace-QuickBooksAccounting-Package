<?php
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

$app->post('/api/QuickBooksAccounting/updatePayment', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'accessToken', 'tokenSecret', 'paymentId', 'companyId', 'syncToken', 'totalAmt']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $body['Id'] = $post_data['args']['paymentId'];
    $body['sparse'] = false;
    $body['SyncToken'] = $post_data['args']['syncToken'];

    if (isset($post_data['args']['paymentLines']) && count($post_data['args']['paymentLines']) > 0) {
        $body['Line'] = $post_data['args']['paymentLines'];
    }

    if (isset($post_data['args']['txnDate']) && strlen($post_data['args']['txnDate']) > 0) {
        $body['TxnDate'] = $post_data['args']['txnDate'];
    }

    if (isset($post_data['args']['txnStatus']) && strlen($post_data['args']['txnStatus']) > 0) {
        $body['TxnStatus'] = $post_data['args']['txnStatus'];
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
    if (isset($post_data['args']['customerRefId']) && strlen($post_data['args']['customerRefId']) > 0) {
        $body['CustomerRef']['value'] = $post_data['args']['customerRefId'];
    }
    if (isset($post_data['args']['customerRefName']) && strlen($post_data['args']['customerRefName']) > 0) {
        $body['CustomerRef']['name'] = $post_data['args']['customerRefName'];
    }
    if (isset($post_data['args']['aRAccountRefId']) && strlen($post_data['args']['aRAccountRefId']) > 0) {
        $body['ARAccountRef']['value'] = $post_data['args']['aRAccountRefId'];
    }
    if (isset($post_data['args']['aRAccountRefName']) && strlen($post_data['args']['aRAccountRefName']) > 0) {
        $body['ARAccountRef']['name'] = $post_data['args']['aRAccountRefName'];
    }
    if (isset($post_data['args']['depositToAccountRefId']) && strlen($post_data['args']['depositToAccountRefId']) > 0) {
        $body['DepositToAccountRef']['value'] = $post_data['args']['depositToAccountRefId'];
    }
    if (isset($post_data['args']['depositToAccountRefName']) && strlen($post_data['args']['depositToAccountRefName']) > 0) {
        $body['DepositToAccountRef']['name'] = $post_data['args']['depositToAccountRefName'];
    }
    if (isset($post_data['args']['paymentMethodRefId']) && strlen($post_data['args']['paymentMethodRefId']) > 0) {
        $body['PaymentMethodRef']['value'] = $post_data['args']['paymentMethodRefId'];
    }
    if (isset($post_data['args']['paymentMethodRefName']) && strlen($post_data['args']['paymentMethodRefName']) > 0) {
        $body['PaymentMethodRef']['name'] = $post_data['args']['paymentMethodRefName'];
    }
    if (isset($post_data['args']['paymentRefNum']) && strlen($post_data['args']['paymentRefNum']) > 0) {
        $body['PaymentRefNum'] = $post_data['args']['paymentRefNum'];
    }
    if (isset($post_data['args']['creditCardPayment']) && strlen($post_data['args']['creditCardPayment']) > 0) {
        $body['CreditCardPayment'] = $post_data['args']['creditCardPayment'];
    }
    if (isset($post_data['args']['totalAmt']) && strlen($post_data['args']['totalAmt']) > 0) {
        $body['TotalAmt'] = $post_data['args']['totalAmt'];
    }

    if (isset($post_data['args']['txnSource']) && strlen($post_data['args']['txnSource']) > 0) {
        $body['TxnSource'] = $post_data['args']['txnSource'];
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
        $resp = $client->request('POST', 'company/' . $post_data['args']['companyId'] . '/payment', ['auth' => 'oauth', 'json' => $body]);
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