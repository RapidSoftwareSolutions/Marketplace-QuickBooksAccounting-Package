<?php
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

$app->post('/api/QuickBooksAccounting/getSalesByProductReport', function ($request, $response, $args) {
    $settings = $this->settings;

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

    if (isset($post_data['args']['customer']) && strlen($post_data['args']['customer']) > 0) {
        $body['customer'] = $post_data['args']['customer'];
    }
    if (isset($post_data['args']['class']) && strlen($post_data['args']['class']) > 0) {
        $body['class'] = $post_data['args']['class'];
    }
    if (isset($post_data['args']['item<']) && strlen($post_data['args']['item<']) > 0) {
        $body['item<'] = $post_data['args']['item<'];
    }

    if (isset($post_data['args']['dateMacro']) && strlen($post_data['args']['dateMacro']) > 0) {
        $body['date_macro'] = $post_data['args']['dateMacro'];
    }
    if (isset($post_data['args']['startDate']) && strlen($post_data['args']['startDate']) > 0) {
        $body['start_date'] = $post_data['args']['startDate'];
    }
    if (isset($post_data['args']['endDate']) && strlen($post_data['args']['endDate']) > 0) {
        $body['end_date'] = $post_data['args']['endDate'];
    }
    if (isset($post_data['args']['department']) && strlen($post_data['args']['department']) > 0) {
        $body['department'] = $post_data['args']['department'];
    }

    if (isset($post_data['args']['summarizeColumnBy']) && strlen($post_data['args']['summarizeColumnBy']) > 0) {
        $body['summarize_column_by'] = $post_data['args']['summarizeColumnBy'];
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
        $resp = $client->request('GET', 'company/' . $post_data['args']['companyId'] . '/reports/ItemSales', ['auth' => 'oauth', 'query' => $body]);
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