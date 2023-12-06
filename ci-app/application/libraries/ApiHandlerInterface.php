<?php

namespace App\Libraries;

use Psr\Http\Message\ResponseInterface;

/**
 * Interface ApiHandlerInterface
 *
 * Describes the contract for handling HTTP requests to an API.
 *
 * @package App\Libraries
 */
interface ApiHandlerInterface
{
    /**
     * Performs an HTTP GET request to the API.
     *
     * @return array The structured API response array.
     *
     * @throws \Exception If the API request fails.
     */
    public function get(): array;

    /**
     * Performs an HTTP POST request to the API.
     *
     * @param string $postParamsType The type of post parameters ('form_params', 'json', etc.).
     *
     * @return array The structured API response array.
     *
     * @throws \Exception If the API request fails.
     */
    public function post(string $postParamsType = 'form_params'): array;

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
    public function _responseBuilder(array $data, string $message, int $status = 0, int $error = 0, bool $returnFlag = false): array;

    /**
     * Builds and echoes a structured success response array.
     *
     * @param array $responseData The data to be included in the success response.
     * @param string $successMessage The success message.
     */
    public static function successResponseBuilder(array $responseData, string $successMessage = 'API Success'): void;

    /**
     * Generates a structured response array from the HTTP response.
     *
     * @param ResponseInterface $response The HTTP response object.
     *
     * @return array The structured response array.
     */
    public function _generateApiResponse(ResponseInterface $response): array;

    /**
     * Checks the API response for a successful status code.
     *
     * @param array $apiResponse The structured API response array.
     *
     * @throws \Exception If the API response status code is not 200.
     */
    public function _checkApiResponse(array $apiResponse): void;
}
