<?php

declare(strict_types=1);

namespace LexofficeSdk\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use LexofficeSdk\Api\LexofficeException;
use LexofficeSdk\Interfaces\ApiClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ApiClient implements ApiClientInterface
{
    private const MAX_RETRIES = 3;
    private const RETRYABLE_METHODS = ['GET', 'DELETE', 'HEAD', 'OPTIONS'];

    /**
     * @var Client
     */
    private $client;

    /**
     * @param string $apiKey
     * @param string $endpoint
     */
    public function __construct(
        string $apiKey,
        string $endpoint = 'https://api.lexware.io/v1/',
    ) {
        $stack = HandlerStack::create();
        $stack->push(Middleware::retry($this->retryRequest(), $this->retryDelay()));

        $this->client = new Client([
            'base_uri' => $endpoint,
            'timeout' => 25.0,
            'handler' => $stack,
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);
    }

    private function retryRequest(): callable
    {
        return function (
            int $retries,
            RequestInterface $request,
            ?ResponseInterface $response = null,
            ?\Throwable $exception = null
        ): bool {
            return $retries < self::MAX_RETRIES
                && $this->shouldRetry($request, $response, $exception);
        };
    }

    private function shouldRetry(
        RequestInterface $request,
        ?ResponseInterface $response,
        ?\Throwable $exception
    ): bool {
        if ($exception instanceof ConnectException) {
            return true;
        }
        if ($response === null) {
            return false;
        }

        $status = $response->getStatusCode();
        if ($status === 429) {
            return true;
        }
        if ($status >= 500) {
            return in_array(strtoupper($request->getMethod()), self::RETRYABLE_METHODS, true);
        }

        return false;
    }

    private function retryDelay(): callable
    {
        return static function (int $retries, ?ResponseInterface $response = null): int {
            if ($response !== null && $response->hasHeader('Retry-After')) {
                $retryAfter = $response->getHeaderLine('Retry-After');
                if (is_numeric($retryAfter)) {
                    return (int) $retryAfter * 1000;
                }
            }

            return 2 ** ($retries - 1) * 1000;
        };
    }

    /**
     * @param string $uri
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get(string $uri, ?array $query = null): \Psr\Http\Message\ResponseInterface
    {
        try {
            return $this->client->get($uri, ['query' => $query]);
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            throw new LexofficeException($response->getBody()->getContents(), $response->getStatusCode());
        } catch (GuzzleException $e) {
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
        } catch (GuzzleException $e) {
            throw new LexofficeException($e->getMessage());
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
        } catch (GuzzleException $e) {
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
        } catch (GuzzleException $e) {
            throw new LexofficeException($e->getMessage());
        }
    }

}
