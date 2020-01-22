<?php declare (strict_types = 1);

namespace LexofficeSdk\Api;

use GuzzleHttp\Client;

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
        string $endpoint = 'https://api.lexoffice.io'
    ) {
        $this->client = new Client();
        $this->endpoint = $endpoint;
        $this->apiKey = $apiKey;
    }

    /**
     * @param string $body
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post(string $body): \Psr\Http\Message\ResponseInterface
    {
        $options = $this->getDefaultOptions();
        $options['body'] = $body;

        return $this->client->post($this->endpoint, $options);
    }

    /**
     * @return array
     */
    private function getDefaultOptions(): array
    {
        return [
            'auth' => [
                $this->apiKey,
            ],
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => '',
        ];
    }
}
