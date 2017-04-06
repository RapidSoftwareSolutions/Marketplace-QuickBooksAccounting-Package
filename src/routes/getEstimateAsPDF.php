<?php
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

$app->post('/api/QuickBooksAccounting/getEstimateAsPDF', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'accessToken', 'tokenSecret', 'estimateId', 'companyId']);
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
    //requesting remote API
    $client = new GuzzleHttp\Client();

    $client->getAsync('company/' . $post_data['args']['companyId'] . '/estimate/' . $post_data['args']['estimateId'] . '/pdf',
        [

            'base_uri' => $settings['api_url'],
            'handler' => $stack,
            'stream' => true,
            'auth' => 'oauth'
        ]
    )
        ->then(
            function (\Psr\Http\Message\ResponseInterface $response) use ($client, $post_data, $settings, &$result) {
                $responseApi = $response->getBody()->getContents();
                $fileExtension = 'pdf';
                $fileName = pathinfo($post_data['args']['filePath'])['filename'];

                $size = strlen($responseApi);
                if (in_array($response->getStatusCode(), ['200', '201', '202', '203', '204'])) {
                    try {
                        $fileUrl = $client->post($settings['uploadServiceUrl'], [
                            'multipart' => [
                                [
                                    'name' => 'length',
                                    'contents' => $size
                                ],
                                [
                                    'name' => 'file',
                                    'filename' => $fileName . '.' . $fileExtension,
                                    'contents' => $responseApi
                                ],
                            ]
                        ]);
                        $gcloud = $fileUrl->getBody()->getContents();
                        $resultDecoded = json_decode($gcloud, true);
                        $result['callback'] = 'success';
                        $result['contextWrites']['to'] = ($resultDecoded != NULL) ? $resultDecoded : $gcloud;
                    } catch (GuzzleHttp\Exception\BadResponseException $exception) {
                        $result['callback'] = 'error';
                        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
                        $result['contextWrites']['to']['status_msg'] = 'Something went wrong during file link receiving.';
                    }
                } else {
                    $resultDecoded = json_decode($responseApi, true);
                    $result['callback'] = 'error';
                    $result['contextWrites']['to']['status_code'] = 'API_ERROR';
                    $result['contextWrites']['to']['status_msg'] = ($resultDecoded != NULL) ? $resultDecoded : $responseApi;
                }
            },
            function (GuzzleHttp\Exception\BadResponseException $exception) use (&$result) {
                $result['callback'] = 'error';
                $result['contextWrites']['to']['status_code'] = 'API_ERROR';
                $result['contextWrites']['to']['status_msg'] = $exception->getMessage();
            },
            function (GuzzleHttp\Exception\ConnectException $exception) use (&$result) {
                $result['callback'] = 'error';
                $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
                $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';
            }
        )
        ->wait();


    return $response->withHeader('Content-type', 'application/json')->withJson($result, 200, JSON_UNESCAPED_SLASHES);

});
