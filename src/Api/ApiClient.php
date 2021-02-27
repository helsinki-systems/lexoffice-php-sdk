<?php declare (strict_types = 1);

namespace LexofficeSdk\Api;

use Exception;
use GuzzleHttp\Client;

use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\RequestOptions;
use LexofficeSdk\Api\LexofficeException;
use LexofficeSdk\Interfaces\ApiClientInterface;

class ApiClient implements ApiClientInterface
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $endpoint;

    /**
     * @param string $apiKey
     * @param string $endpoint
     */
    public function __construct(
        string $apiKey,
        string $endpoint = 'https://api.lexoffice.io/v1/'
    ) {
        $this->client = new Client(
            [
            // Base URI is used with relative requests
            'base_uri' => $endpoint,
            // You can set any number of default request options.
            'timeout'  => 2.0,
            'headers' => [
                'Authorization' => 'Bearer '.$apiKey,
                'Accept'     => 'application/json',
                'content-type' => 'application/json'
            ]
            
        ]);
        $this->endpoint = $endpoint;
        $this->apiKey = $apiKey;
    }

    /**
     * @param string $uri
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get(string $uri, array $query = null): \Psr\Http\Message\ResponseInterface
    {
        try {
            return $this->client->get($uri);
        } catch (Exception $e) {
            throw new LexofficeException($e->getMessage());
        }
    }

    /**
     * @param string $uri
     * @param string $body
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post(string $uri, string $body): \Psr\Http\Message\ResponseInterface
    {
        try {
            return $this->client->post($uri, ['body' => $body]);
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            throw new LexofficeException($responseBodyAsString);
        }
    }

    /**
     * @param string $uri
     * @param string $body
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function put(string $uri, string $body): \Psr\Http\Message\ResponseInterface
    {
        try {
            return $this->client->put($uri, ['body' => $body]);
        } catch (Exception $e) {
            throw new LexofficeException($e->getMessage());
        }
    }

    /**
     * @param string $uri
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function delete(string $uri): \Psr\Http\Message\ResponseInterface
    {
        try {
            return $this->client->delete($uri);
        } catch (Exception $e) {
            throw new LexofficeException($e->getMessage());
        }
    }

}
