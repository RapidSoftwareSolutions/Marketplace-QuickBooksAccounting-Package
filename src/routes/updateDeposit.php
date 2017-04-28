<?php
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

$app->post('/api/QuickBooksAccounting/updateDeposit', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'accessToken', 'tokenSecret', 'depositId', 'companyId', 'syncToken', 'depositLines']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $body['Id'] = $post_data['args']['depositId'];
    $body['sparse'] = true;
    $body['SyncToken'] = $post_data['args']['syncToken'];

    $body['Line'] = $post_data['args']['depositLines'];


    if (isset($post_data['args']['txnDate']) && strlen($post_data['args']['txnDate']) > 0) {
        $body['TxnDate'] = $post_data['args']['txnDate'];
    }
    if (isset($post_data['args']['departmentRefId']) && strlen($post_data['args']['departmentRefId']) > 0) {
        $body['DepartmentRef']['value'] = $post_data['args']['departmentRefId'];
    }
    if (isset($post_data['args']['departmentRefName']) && strlen($post_data['args']['departmentRefName']) > 0) {
        $body['DepartmentRef']['name'] = $post_data['args']['departmentRefName'];
    }
    if (isset($post_data['args']['globalTaxCalculation']) && strlen($post_data['args']['globalTaxCalculation']) > 0) {
        $body['GlobalTaxCalculation'] = $post_data['args']['globalTaxCalculation'];
    }
    if (isset($post_data['args']['privateNote']) && strlen($post_data['args']['privateNote']) > 0) {
        $body['PrivateNote'] = $post_data['args']['privateNote'];
    }
    if (isset($post_data['args']['txnStatus']) && strlen($post_data['args']['txnStatus']) > 0) {
        $body['TxnStatus'] = $post_data['args']['txnStatus'];
    }
    if (isset($post_data['args']['txnTaxDetail']) && strlen($post_data['args']['txnTaxDetail']) > 0) {
        $body['TxnTaxDetail'] = $post_data['args']['txnTaxDetail'];
    }
    if (isset($post_data['args']['depositToAccountRefId']) && strlen($post_data['args']['depositToAccountRefId']) > 0) {
        $body['DepositToAccountRef']['value'] = $post_data['args']['depositToAccountRefId'];
    }
    if (isset($post_data['args']['depositToAccountRefName']) && strlen($post_data['args']['depositToAccountRefName']) > 0) {
        $body['DepositToAccountRef']['name'] = $post_data['args']['depositToAccountRefName'];
    }
    if (isset($post_data['args']['txnSource']) && strlen($post_data['args']['txnSource']) > 0) {
        $body['TxnSource'] = $post_data['args']['txnSource'];
    }
    if (isset($post_data['args']['cashBack']) && strlen($post_data['args']['cashBack']) > 0) {
        $body['CashBack'] = $post_data['args']['cashBack'];
    }
    if (isset($post_data['args']['totalAmt']) && strlen($post_data['args']['totalAmt']) > 0) {
        $body['TotalAmt'] = $post_data['args']['totalAmt'];
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
        $resp = $client->request('POST', 'company/' . $post_data['args']['companyId'] . '/deposit', ['auth' => 'oauth', 'json' => $body]);
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