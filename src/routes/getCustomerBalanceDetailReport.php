<?php
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

$app->post('/api/QuickBooksAccounting/getCustomerBalanceDetailReport', function ($request, $response, $args) {
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
    if (isset($post_data['args']['agingMethod']) && strlen($post_data['args']['agingMethod']) > 0) {
        $body['aging_method'] = $post_data['args']['agingMethod'];
    }

    if (isset($post_data['args']['arpaid']) && strlen($post_data['args']['arpaid']) > 0) {
        $body['arpaid'] = $post_data['args']['arpaid'];
    }

    if (isset($post_data['args']['columns']) && strlen($post_data['args']['columns']) > 0) {
        $body['columns'] = $post_data['args']['columns'];
    }

    if (isset($post_data['args']['custom1']) && strlen($post_data['args']['custom1']) > 0) {
        $body['custom1'] = $post_data['args']['custom1'];
    }

    if (isset($post_data['args']['customer']) && strlen($post_data['args']['customer']) > 0) {
        $body['customer'] = $post_data['args']['customer'];
    }

    if (isset($post_data['args']['department']) && strlen($post_data['args']['department']) > 0) {
        $body['department'] = $post_data['args']['department'];
    }
    if (isset($post_data['args']['reportDate']) && strlen($post_data['args']['reportDate']) > 0) {
        $body['report_date'] = $post_data['args']['reportDate'];
    }

    if (isset($post_data['args']['shipvia']) && strlen($post_data['args']['shipvia']) > 0) {
        $body['shipvia'] = $post_data['args']['shipvia'];
    }

    if (isset($post_data['args']['sortBy']) && strlen($post_data['args']['sortBy']) > 0) {
        $body['sort_by'] = $post_data['args']['sortBy'];
    }
    if (isset($post_data['args']['sortOrder']) && strlen($post_data['args']['sortOrder']) > 0) {
        $body['sort_order'] = $post_data['args']['sortOrder'];
    }
    if (isset($post_data['args']['startDuedate']) && strlen($post_data['args']['startDuedate']) > 0) {
        $body['start_duedate'] = $post_data['args']['startDuedate'];
    }

    if (isset($post_data['args']['endDuedate']) && strlen($post_data['args']['endDuedate']) > 0) {
        $body['end_duedate'] = $post_data['args']['endDuedate'];
    }

    if (isset($post_data['args']['term']) && strlen($post_data['args']['term']) > 0) {
        $body['term'] = $post_data['args']['term'];
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
        $resp = $client->request('GET', 'company/' . $post_data['args']['companyId'] . '/reports/AgedPayableDetail', ['auth' => 'oauth', 'query' => $body]);
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