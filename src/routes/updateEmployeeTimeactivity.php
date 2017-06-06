<?php
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

$app->post('/api/QuickBooksAccounting/updateEmployeeTimeactivity', function ($request, $response, $args) {
        $settings = $this->settings;     if(isset($post_data['args']['sandbox']) == 1){         $settings['api_url'] = 'https://sandbox-quickbooks.api.intuit.com/v3/';     }

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'accessToken', 'tokenSecret', 'companyId', 'timeactivityId', 'syncToken', 'employeeRefId']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $body['NameOf'] = 'Employee';

    $body['EmployeeRef']['value'] = $post_data['args']['employeeRefId'];
    $body['Id'] = $post_data['args']['timeactivityId'];
    $body['SyncToken'] = $post_data['args']['syncToken'];

    if (isset($post_data['args']['employeeRefName']) && strlen($post_data['args']['employeeRefName']) > 0) {
        $body['EmployeeRef']['name'] = $post_data['args']['employeeRefName'];
    }

    if (isset($post_data['args']['customerRefId']) && strlen($post_data['args']['customerRefId']) > 0) {
        $body['CustomerRef']['value'] = $post_data['args']['customerRefId'];
    }

    if (isset($post_data['args']['customerRefName']) && strlen($post_data['args']['customerRefName']) > 0) {
        $body['CustomerRef']['name'] = $post_data['args']['customerRefName'];
    }
    if (isset($post_data['args']['hourlyRate']) && strlen($post_data['args']['hourlyRate']) > 0) {
        $body['HourlyRate'] = $post_data['args']['hourlyRate'];
    }

    if (isset($post_data['args']['startTime']) && strlen($post_data['args']['startTime']) > 0) {
        $dateTime = new DateTime($post_data['args']['startTime']);
        $body['StartTime'] = $dateTime->format('Y-m-d\TH:i:s\Z');
    }
    if (isset($post_data['args']['endTime']) && strlen($post_data['args']['endTime']) > 0) {
        $dateTime = new DateTime($post_data['args']['endTime']);
        $body['endTime'] = $dateTime->format('Y-m-d\TH:i:s\Z');
    }

    if (isset($post_data['args']['txnDate']) && strlen($post_data['args']['txnDate']) > 0) {
        $body['TxnDate'] = $post_data['args']['txnDate'];
    }
    if (isset($post_data['args']['billableStatus']) && strlen($post_data['args']['billableStatus']) > 0) {
        $body['BillableStatus'] = $post_data['args']['billableStatus'];
    }
    if (isset($post_data['args']['departmentRefId']) && strlen($post_data['args']['departmentRefId']) > 0) {
        $body['DepartmentRef']['value'] = $post_data['args']['departmentRefId'];
    }
    if (isset($post_data['args']['departmentRefName']) && strlen($post_data['args']['departmentRefName']) > 0) {
        $body['DepartmentRef']['name'] = $post_data['args']['departmentRefName'];
    }
    if (isset($post_data['args']['itemRefId']) && strlen($post_data['args']['itemRefId']) > 0) {
        $body['ItemRef']['value'] = $post_data['args']['itemRefId'];
    }
    if (isset($post_data['args']['itemRefName']) && strlen($post_data['args']['itemRefName']) > 0) {
        $body['ItemRef']['name'] = $post_data['args']['itemRefName'];
    }
    if (isset($post_data['args']['classRefId']) && strlen($post_data['args']['classRefId']) > 0) {
        $body['ClassRef']['value'] = $post_data['args']['classRefId'];
    }
    if (isset($post_data['args']['classRefName']) && strlen($post_data['args']['classRefName']) > 0) {
        $body['ClassRef']['name'] = $post_data['args']['classRefName'];
    }
    if (isset($post_data['args']['taxable']) && strlen($post_data['args']['taxable']) > 0) {
        $body['Taxable'] = $post_data['args']['taxable'];
    }
    if (isset($post_data['args']['breakHours']) && strlen($post_data['args']['breakHours']) > 0) {
        $body['BreakHours'] = $post_data['args']['breakHours'];
    }
    if (isset($post_data['args']['breakMinutes']) && strlen($post_data['args']['breakMinutes']) > 0) {
        $body['BreakMinutes'] = $post_data['args']['breakMinutes'];
    }
    if (isset($post_data['args']['description']) && strlen($post_data['args']['description']) > 0) {
        $body['Description'] = $post_data['args']['description'];
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
        $resp = $client->request('POST', 'company/' . $post_data['args']['companyId'] . '/timeactivity', ['auth' => 'oauth', 'json' => $body]);
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