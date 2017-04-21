<?php
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

$app->post('/api/QuickBooksAccounting/updatePreferences', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'accessToken', 'tokenSecret', 'preferenceId', 'companyId', 'syncToken', 'amount']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $body['Id'] = $post_data['args']['preferenceId'];
    $body['SyncToken'] = $post_data['args']['syncToken'];

    if (isset($post_data['args']['accountingInfoPrefs']) && strlen($post_data['args']['accountingInfoPrefs']) > 0) {
        $body['AccountingInfoPrefs'] = $post_data['args']['accountingInfoPrefs'];
    }
    if (isset($post_data['args']['productAndServicesPrefs']) && strlen($post_data['args']['productAndServicesPrefs']) > 0) {
        $body['ProductAndServicesPrefs'] = $post_data['args']['productAndServicesPrefs'];
    }
    if (isset($post_data['args']['salesFormsPrefs']) && strlen($post_data['args']['salesFormsPrefs']) > 0) {
        $body['SalesFormsPrefs'] = $post_data['args']['salesFormsPrefs'];
    }
    if (isset($post_data['args']['emailMessagesPrefs']) && strlen($post_data['args']['emailMessagesPrefs']) > 0) {
        $body['EmailMessagesPrefs'] = $post_data['args']['emailMessagesPrefs'];
    }
    if (isset($post_data['args']['vendorAndPurchasesPrefs']) && strlen($post_data['args']['vendorAndPurchasesPrefs']) > 0) {
        $body['VendorAndPurchasesPrefs'] = $post_data['args']['vendorAndPurchasesPrefs'];
    }
    if (isset($post_data['args']['timeTrackingPrefs']) && strlen($post_data['args']['timeTrackingPrefs']) > 0) {
        $body['TimeTrackingPrefs'] = $post_data['args']['timeTrackingPrefs'];
    }
    if (isset($post_data['args']['taxPrefs']) && strlen($post_data['args']['taxPrefs']) > 0) {
        $body['TaxPrefs'] = $post_data['args']['taxPrefs'];
    }
    if (isset($post_data['args']['currencyPrefs']) && strlen($post_data['args']['currencyPrefs']) > 0) {
        $body['CurrencyPrefs'] = $post_data['args']['currencyPrefs'];
    }
    if (isset($post_data['args']['reportPrefs']) && strlen($post_data['args']['reportPrefs']) > 0) {
        $body['ReportPrefs'] = $post_data['args']['reportPrefs'];
    }
    if (isset($post_data['args']['otherPrefs']) && strlen($post_data['args']['otherPrefs']) > 0) {
        $body['OtherPrefs'] = $post_data['args']['otherPrefs'];
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
        $resp = $client->request('POST', 'company/' . $post_data['args']['companyId'] . '/preferences', ['auth' => 'oauth', 'json' => $body]);
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