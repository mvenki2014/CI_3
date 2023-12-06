<?php

namespace App\Libraries;

defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ApiHandler
 *
 * Handles HTTP requests to an API using GuzzleHttp.
 *
 * @package App\Libraries
 */
class ApiHandler implements ApiHandlerInterface
{
    /**
     * The content type for form-urlencoded data.
     */
    private const CONTENT_TYPE_FORM_URLENCODED = 'application/x-www-form-urlencoded';

    /**
     * The constructed API URL for the request.
     *
     * @var string
     */
    private string $apiURL;

    private const REQUEST_HEADERS = [
        'Content-Type' => self::CONTENT_TYPE_FORM_URLENCODED
    ];
    /**
     * The data to be sent in the request.
     *
     * @var array
     */
    private array $postData;

    /**
     * The Guzzle HTTP client instance.
     *
     * @var Client
     */
    private Client $client;

    /**
     * ApiHandler constructor.
     *
     * @param string $url The endpoint URL for the API request. Defaults to '/'.
     * @param array $postData The data to be sent in the request.
     * @param array $reqHeaders REQUEST_HEADERS
     */
    public function __construct(string $url = '/', array $postData = [], array $reqHeaders = self::REQUEST_HEADERS)
    {
        $this->apiURL = $url;
        $this->postData = $postData;
        $this->client = self::configureApi($reqHeaders);
    }

    /**
     * Configures and returns a new instance of the Guzzle HTTP client.
     *
     * @return Client The configured Guzzle HTTP client instance.
     */
    private static function configureApi(array $reqHeaders = self::REQUEST_HEADERS): Client
    {
        $apiConfig = [
            'headers' => $reqHeaders,
        ];

        return new Client($apiConfig);
    }

    /**
     * Generates a structured response array from the HTTP response.
     *
     * @param ResponseInterface $response The HTTP response object.
     *
     * @return array The structured response array.
     */
    public final function _generateApiResponse(ResponseInterface $response): array
    {
        $result = $response->getBody()->getContents();
        $json = false;

        if (str_contains($response->getHeaderLine('Content-Type'), 'application/json')) {
            $result = json_decode($response->getBody(), true);
            $json = true;
        }

        return [
            'statusCode' => $response->getStatusCode(),
            'data' => $result,
            'json' => $json,
        ];
    }

    /**
     * Checks the API response for a successful status code.
     *
     * @param array $apiResponse The structured API response array.
     *
     * @throws \Exception If the API response status code is not 200.
     */
    public final function _checkApiResponse(array $apiResponse): void
    {
        if ($apiResponse['statusCode'] !== 200) {
            throw new \Exception('API request failed with status code ' . $apiResponse['statusCode']);
        }
    }

    /**
     * Performs an HTTP GET request to the API.
     *
     * @return array The structured API response array.
     *
     * @throws \Exception If the API request fails.
     */
    public final function get(): array
    {
        try {
            $response = $this->client->get($this->apiURL, [
                'query' => $this->postData,
                'verify' => false, // set to true if you want to verify SSL
            ]);

            $apiResponse = $this->_generateApiResponse($response);
            $this->_checkApiResponse($apiResponse);

            return $apiResponse;
        } catch (RequestException|GuzzleException $e) {
            return $this->_responseBuilder([], 'API request failed: ' . $e->getMessage(), 0, 1, true);
        }
    }

    /**
     * Performs an HTTP POST request to the API.
     *
     * @return array The structured API response array.
     *
     * @throws \Exception If the API request fails.
     */
    public final function post(string $postParamsType = 'form_params'): array
    {
        try {
            $response = $this->client->post($this->apiURL, [
                $postParamsType => $this->postData,
            ]);

            $apiResponse = $this->_generateApiResponse($response);
            $this->_checkApiResponse($apiResponse);

            return $apiResponse;
        } catch (RequestException|GuzzleException $e) {
            return $this->_responseBuilder([], 'API request failed: ' . $e->getMessage(), 0, 1, true);
        }
    }

    /**
     * Builds and returns a structured response array.
     *
     * @param array $data The data to be included in the response.
     * @param string $message The response message.
     * @param int $status The response status code. Defaults to 0.
     * @param int $error The error code. Defaults to 0.
     * @param bool $returnFlag If true, returns the response array. Otherwise, echoes the response as JSON and exits.
     *
     * @return array The structured response array if $returnFlag is true.
     */
    public final function _responseBuilder(array $data, string $message, int $status = 0, int $error = 0, bool $returnFlag = false): array
    {
        $response = [
            'status' => $status,
            'message' => $message,
            'error' => $error,
            'data' => $data,
        ];

        if ($returnFlag) {
            return $response;
        }

        echo json_encode($response, JSON_PRETTY_PRINT);
        exit; // or return if this is not the end of the script
    }

    /**
     * Builds and echoes a structured success response array.
     *
     * @param array $responseData The data to be included in the success response.
     * @param string $successMessage The success message.
     */
    public static function successResponseBuilder(array $responseData, string $successMessage = 'API Success', bool $returnFlag = false): void
    {
        (new ApiHandler)->_responseBuilder($responseData, $successMessage, 1, 0, $returnFlag);
    }

    /**
     * Builds and echoes a structured error response array.
     *
     * @param array $responseData An associative array containing data to be included in the error response.
     * @param string $errorMessage A string representing the error message. It defaults to 'API Error' if not provided.
     */
    public static function errorResponseBuilder(array $responseData, string $errorMessage = 'API Error'): void
    {
        (new ApiHandler)->_responseBuilder($responseData, $errorMessage, 0, 1);
    }

    /**
     * @throws \Exception
     */
    public final function _showError(string $message): void
    {
        throw new \Exception('API request failed :: ' . $message);
        exit();
    }
}
