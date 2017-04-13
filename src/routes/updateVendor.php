<?php
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

$app->post('/api/QuickBooksAccounting/updateVendor', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'accessToken', 'tokenSecret', 'displayName', 'companyId', 'vendorId', 'syncToken']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $body['DisplayName'] = $post_data['args']['displayName'];
    $body['Id'] = $post_data['args']['vendorId'];
    $body['SyncToken'] = $post_data['args']['syncToken'];
    $body['sparse'] = false;

    if (isset($post_data['args']['title']) && strlen($post_data['args']['title']) > 0) {
        $body['Title'] = $post_data['args']['title'];
    }
    if (isset($post_data['args']['givenName']) && strlen($post_data['args']['givenName']) > 0) {
        $body['GivenName'] = $post_data['args']['givenName'];
    }
    if (isset($post_data['args']['middleName']) && strlen($post_data['args']['middleName']) > 0) {
        $body['MiddleName'] = $post_data['args']['middleName'];
    }
    if (isset($post_data['args']['familyName']) && strlen($post_data['args']['familyName']) > 0) {
        $body['FamilyName'] = $post_data['args']['familyName'];
    }
    if (isset($post_data['args']['suffix']) && strlen($post_data['args']['suffix']) > 0) {
        $body['Suffix'] = $post_data['args']['suffix'];
    }
    if (isset($post_data['args']['companyName']) && strlen($post_data['args']['companyName']) > 0) {
        $body['CompanyName'] = $post_data['args']['companyName'];
    }
    if (isset($post_data['args']['printOnCheckName']) && strlen($post_data['args']['printOnCheckName']) > 0) {
        $body['PrintOnCheckName'] = $post_data['args']['printOnCheckName'];
    }
    if (isset($post_data['args']['active']) && strlen($post_data['args']['active']) > 0) {
        $body['Active'] = $post_data['args']['active'];
    }
    if (isset($post_data['args']['primaryPhone']) && strlen($post_data['args']['primaryPhone']) > 0) {
        $body['PrimaryPhone']['FreeFormNumber'] = $post_data['args']['primaryPhone'];
    }
    if (isset($post_data['args']['alternatePhone']) && strlen($post_data['args']['alternatePhone']) > 0) {
        $body['AlternatePhone']['FreeFormNumber'] = $post_data['args']['alternatePhone'];
    }
    if (isset($post_data['args']['mobile']) && strlen($post_data['args']['mobile']) > 0) {
        $body['Mobile']['FreeFormNumber'] = $post_data['args']['mobile'];
    }
    if (isset($post_data['args']['fax']) && strlen($post_data['args']['fax']) > 0) {
        $body['Fax']['FreeFormNumber'] = $post_data['args']['fax'];
    }
    if (isset($post_data['args']['primaryEmailAddr']) && strlen($post_data['args']['primaryEmailAddr']) > 0) {
        $body['PrimaryEmailAddr']['Address'] = $post_data['args']['primaryEmailAddr'];
    }
    if (isset($post_data['args']['webAddr']) && strlen($post_data['args']['webAddr']) > 0) {
        $body['WebAddr']['URI'] = $post_data['args']['webAddr'];
    }
    if (isset($post_data['args']['termRefId']) && strlen($post_data['args']['termRefId']) > 0) {
        $body['TermRef']['value'] = $post_data['args']['termRefId'];
    }
    if (isset($post_data['args']['termRefName']) && strlen($post_data['args']['termRefName']) > 0) {
        $body['TermRef']['name'] = $post_data['args']['termRefName'];
    }
    if (isset($post_data['args']['taxable']) && strlen($post_data['args']['taxable']) > 0) {
        $body['Taxable'] = $post_data['args']['taxable'];
    }
    if (isset($post_data['args']['billAddr']) && strlen($post_data['args']['billAddr']) > 0) {
        $body['BillAddr'] = $post_data['args']['billAddr'];
    }
    if (isset($post_data['args']['otherContactInfo']) && strlen($post_data['args']['otherContactInfo']) > 0) {
        $body['OtherContactInfo'] = $post_data['args']['otherContactInfo'];
    }
    if (isset($post_data['args']['taxIdentifier']) && strlen($post_data['args']['taxIdentifier']) > 0) {
        $body['TaxIdentifier'] = $post_data['args']['taxIdentifier'];
    }
    if (isset($post_data['args']['acctNum']) && strlen($post_data['args']['acctNum']) > 0) {
        $body['AcctNum'] = $post_data['args']['acctNum'];
    }
    if (isset($post_data['args']['vendor1099']) && strlen($post_data['args']['vendor1099']) > 0) {
        $body['Vendor1099'] = $post_data['args']['vendor1099'];
    }
    if (isset($post_data['args']['currencyRefId']) && strlen($post_data['args']['currencyRefId']) > 0) {
        $body['CurrencyRef']['value'] = $post_data['args']['currencyRefId'];
    }
    if (isset($post_data['args']['currencyRefName']) && strlen($post_data['args']['currencyRefName']) > 0) {
        $body['CurrencyRef']['name'] = $post_data['args']['currencyRefName'];
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
        $resp = $client->request('POST', 'company/' . $post_data['args']['companyId'] . '/vendor', ['auth' => 'oauth', 'json' => $body]);
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