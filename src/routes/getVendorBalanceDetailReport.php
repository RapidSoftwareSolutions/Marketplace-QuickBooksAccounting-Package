<?php
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

$app->post('/api/QuickBooksAccounting/getVendorBalanceDetailReport', function ($request, $response, $args) {
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
    if (isset($post_data['args']['accountingMethod']) && strlen($post_data['args']['accountingMethod']) > 0) {
        $body['accounting_method'] = $post_data['args']['accountingMethod'];
    }

    if (isset($post_data['args']['appaid']) && strlen($post_data['args']['appaid']) > 0) {
        $body['appaid'] = $post_data['args']['appaid'];
    }

    if (isset($post_data['args']['columns']) && strlen($post_data['args']['columns']) > 0) {
        $body['columns'] = $post_data['args']['columns'];
    }
    if (isset($post_data['args']['dateMacro']) && strlen($post_data['args']['dateMacro']) > 0) {
        $body['date_macro'] = $post_data['args']['dateMacro'];
    }
    if (isset($post_data['args']['department']) && strlen($post_data['args']['department']) > 0) {
        $body['department'] = $post_data['args']['department'];
    }
    if (isset($post_data['args']['duedateMacro']) && strlen($post_data['args']['duedateMacro']) > 0) {
        $body['duedate_macro'] = $post_data['args']['duedateMacro'];
    }
    if (isset($post_data['args']['reportDate']) && strlen($post_data['args']['reportDate']) > 0) {
        $dateTime = new DateTime($post_data['args']['reportDate']);
        $body['report_date'] = $dateTime->format('Y-m-d\TH:i:s\Z');
    }
    if (isset($post_data['args']['sortBy']) && strlen($post_data['args']['sortBy']) > 0) {
        $body['sort_by'] = $post_data['args']['sortBy'];
    }
    if (isset($post_data['args']['sortOrder']) && strlen($post_data['args']['sortOrder']) > 0) {
        $body['sort_order'] = $post_data['args']['sortOrder'];
    }
    if (isset($post_data['args']['startDuedate']) && strlen($post_data['args']['startDuedate']) > 0) {
        $dateTime = new DateTime($post_data['args']['startDuedate']);
        $body['start_duedate'] = $dateTime->format('Y-m-d\TH:i:s\Z');
    }
    if (isset($post_data['args']['endDuedate']) && strlen($post_data['args']['endDuedate']) > 0) {
        $dateTime = new DateTime($post_data['args']['endDuedate']);
        $body['end_duedate'] = $dateTime->format('Y-m-d\TH:i:s\Z');
    }
    if (isset($post_data['args']['term']) && strlen($post_data['args']['term']) > 0) {
        $body['term'] = $post_data['args']['term'];
    }
    if (isset($post_data['args']['vendor']) && strlen($post_data['args']['vendor']) > 0) {
        $body['vendor'] = $post_data['args']['vendor'];
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
        $resp = $client->request('GET', 'company/' . $post_data['args']['companyId'] . '/reports/VendorBalanceDetail', ['auth' => 'oauth', 'query' => $body]);
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