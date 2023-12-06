<?php

namespace App\Libraries;

defined('BASEPATH') or exit('No direct script access allowed');

class APIMiddleWare extends ApiHandler
{
    /**
     * @var ApiHandler|null The API handler instance.
     */
    private ApiHandler $apiHandler;

    /**
     * Executes an API request using the provided URL and post data.
     *
     * @param string $url The API endpoint URL.
     * @param array $post The data to be sent in the request.
     * @param array $reqHeaders The data to be sent in the request headers.
     *
     * @return array The API response.
     * @throws \Exception
     */
    public final function _APIRequest(string $url, array $post = [], array $reqHeaders = [], string $postParamsType = 'form_params'): array
    {
        $this->apiHandler = new ApiHandler($url, $post, $reqHeaders);
        return $this->apiHandler->post($postParamsType);
    }

    /**
     * Executes an API request using the provided URL and post data.
     *
     * @param string $url The API endpoint URL.
     * @param array $post The data to be sent in the request.
     *
     * @return array The API response.
     * @throws Exception
     * @throws \Exception
     */
    public final function _SMSRequest(string $url, array $post = []): array
    {
        $reqHeaders = [
            'accept' => 'application/json',
            'authkey' => MSG91_AUTH_KEY,
            'content-type' => 'application/json',
        ];
        $this->apiHandler = new ApiHandler(MSG91_API_HOST . $url, $post, $reqHeaders);
        return $this->apiHandler->post('json');
    }
}
