<?php
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

$app->post('/api/QuickBooksAccounting/getTransactionListReport', function ($request, $response, $args) {
    $settings = $this->settings;
    if (isset($post_data['args']['sandbox']) == 1) {
        $settings['api_url'] = 'https://sandbox-quickbooks.api.intuit.com/v3/';
    }

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
    if (isset($post_data['args']['arpaid']) && strlen($post_data['args']['arpaid']) > 0) {
        $body['arpaid'] = $post_data['args']['arpaid'];
    }

    if (isset($post_data['args']['bothamount']) && strlen($post_data['args']['bothamount']) > 0) {
        $body['bothamount'] = $post_data['args']['bothamount'];
    }
    if (isset($post_data['args']['class']) && strlen($post_data['args']['class']) > 0) {
        $body['class'] = $post_data['args']['class'];
    }
    if (isset($post_data['args']['cleared']) && strlen($post_data['args']['cleared']) > 0) {
        $body['cleared'] = $post_data['args']['cleared'];
    }
    if (isset($post_data['args']['columns']) && strlen($post_data['args']['columns']) > 0) {
        $body['columns'] = $post_data['args']['columns'];
    }
    if (isset($post_data['args']['createdateMacro']) && strlen($post_data['args']['createdateMacro']) > 0) {
        $body['createdate_macro'] = $post_data['args']['createdateMacro'];
    }
    if (isset($post_data['args']['customer']) && strlen($post_data['args']['customer']) > 0) {
        $body['customer'] = $post_data['args']['customer'];
    }
    if (isset($post_data['args']['dateMacro']) && strlen($post_data['args']['dateMacro']) > 0) {
        $body['date_macro'] = $post_data['args']['dateMacro'];
    }
    if (isset($post_data['args']['department']) && strlen($post_data['args']['department']) > 0) {
        $body['department'] = $post_data['args']['department'];
    }
    if (isset($post_data['args']['docnum']) && strlen($post_data['args']['docnum']) > 0) {
        $body['docnum'] = $post_data['args']['docnum'];
    }
    if (isset($post_data['args']['duedateMacro']) && strlen($post_data['args']['duedateMacro']) > 0) {
        $body['duedate_macro'] = $post_data['args']['duedateMacro'];
    }
    if (isset($post_data['args']['groupBy']) && strlen($post_data['args']['groupBy']) > 0) {
        $body['group_by'] = $post_data['args']['groupBy'];
    }
    if (isset($post_data['args']['item']) && strlen($post_data['args']['item']) > 0) {
        $body['item'] = $post_data['args']['item'];
    }
    if (!empty($post_data['args']['memo'])) {
        $body['memo'] = is_array($post_data['args']['memo']) ? implode(',', $post_data['args']['memo']) : $post_data['args']['memo'];
    }
    if (isset($post_data['args']['moddateMacro']) && strlen($post_data['args']['moddateMacro']) > 0) {
        $body['moddate_macro'] = $post_data['args']['moddateMacro'];
    }
    if (isset($post_data['args']['name']) && strlen($post_data['args']['name']) > 0) {
        $body['name'] = $post_data['args']['name'];
    }
    if (isset($post_data['args']['paymentMethod']) && strlen($post_data['args']['paymentMethod']) > 0) {
        $body['payment_method'] = $post_data['args']['paymentMethod'];
    }
    if (isset($post_data['args']['printed']) && strlen($post_data['args']['printed']) > 0) {
        $body['printed'] = $post_data['args']['printed'];
    }
    if (isset($post_data['args']['qzurl']) && strlen($post_data['args']['qzurl']) > 0) {
        $body['qzurl'] = $post_data['args']['qzurl'];
    }
    if (isset($post_data['args']['sortBy']) && strlen($post_data['args']['sortBy']) > 0) {
        $body['sort_by'] = $post_data['args']['sortBy'];
    }
    if (isset($post_data['args']['sortOrder']) && strlen($post_data['args']['sortOrder']) > 0) {
        $body['sort_order'] = $post_data['args']['sortOrder'];
    }
    if (isset($post_data['args']['sourceAccountType']) && strlen($post_data['args']['sourceAccountType']) > 0) {
        $body['source_account_type'] = $post_data['args']['sourceAccountType'];
    }
    if (isset($post_data['args']['startCreatedate']) && strlen($post_data['args']['startCreatedate']) > 0) {
        $dateTime = new DateTime($post_data['args']['startCreatedate']);
        $body['start_createdate'] = $dateTime->format('Y-m-d\TH:i:s\Z');
    }
    if (isset($post_data['args']['subtendCreatedate']) && strlen($post_data['args']['subtendCreatedate']) > 0) {
        $dateTime = new DateTime($post_data['args']['subtendCreatedate']);
        $body['subtend_createdate'] = $dateTime->format('Y-m-d\TH:i:s\Z');
    }
    if (isset($post_data['args']['startDate']) && strlen($post_data['args']['startDate']) > 0) {
        $dateTime = new DateTime($post_data['args']['startDate']);
        $body['start_date'] = $dateTime->format('Y-m-d\TH:i:s\Z');
    }
    if (isset($post_data['args']['endDate']) && strlen($post_data['args']['endDate']) > 0) {
        $dateTime = new DateTime($post_data['args']['endDate']);
        $body['end_date'] = $dateTime->format('Y-m-d\TH:i:s\Z');
    }
    if (isset($post_data['args']['startDuedate']) && strlen($post_data['args']['startDuedate']) > 0) {
        $dateTime = new DateTime($post_data['args']['startDuedate']);
        $body['start_duedate'] = $dateTime->format('Y-m-d\TH:i:s\Z');
    }
    if (isset($post_data['args']['subtendDuedate']) && strlen($post_data['args']['subtendDuedate']) > 0) {
        $dateTime = new DateTime($post_data['args']['subtendDuedate']);
        $body['subtend_duedate'] = $dateTime->format('Y-m-d\TH:i:s\Z');
    }
    if (isset($post_data['args']['startModdate']) && strlen($post_data['args']['startModdate']) > 0) {
        $dateTime = new DateTime($post_data['args']['startModdate']);
        $body['start_moddate'] = $dateTime->format('Y-m-d\TH:i:s\Z');
    }
    if (isset($post_data['args']['endModdate']) && strlen($post_data['args']['endModdate']) > 0) {
        $dateTime = new DateTime($post_data['args']['endModdate']);
        $body['end_moddate'] = $dateTime->format('Y-m-d\TH:i:s\Z');
    }
    if (isset($post_data['args']['term']) && strlen($post_data['args']['term']) > 0) {
        $body['term'] = $post_data['args']['term'];
    }
    if (isset($post_data['args']['transactionType']) && strlen($post_data['args']['transactionType']) > 0) {
        $body['transaction_type'] = $post_data['args']['transactionType'];
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
        $resp = $client->request('GET', 'company/' . $post_data['args']['companyId'] . '/reports/TransactionList', ['auth' => 'oauth', 'query' => $body]);
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