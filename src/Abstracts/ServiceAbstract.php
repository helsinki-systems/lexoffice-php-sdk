<?php declare (strict_types = 1);

namespace LexofficeSdk\Abstracts;

use LexofficeSdk\Interfaces\ApiClientInterface;
use LexofficeSdk\Interfaces\EntityInterface;

abstract class ServiceAbstract
{

    /**
     * @var ApiClientInterface
     */
    private $apiClient;
    private $endpoint;
    private $class;

    public function __construct(ApiClientInterface $apiClient, string $endpoint, string $class)
    {
        $this->apiClient = $apiClient;
        $this->endpoint = $endpoint;
        $this->class = $class;
    }

    /**
     * @var query
     * @return EntityInterface
     */
    public function get(string $id, array $query = []): EntityInterface
    {
        $response = json_decode($this->apiClient->get($this->endpoint . $id, $query)->getBody()->getContents());
        return new $this->class($response);
    }

    /**
     * @var query
     * @return array
     */
    public function getList(array $query = ['page' => 0, 'size' => 25]): array
    {
        $response = json_decode($this->apiClient->get($this->endpoint, $query)->getBody()->getContents());

        $contacts = array();
        foreach ($response->content as $contact) {
            array_push($contacts, new $this->class($contact));
        }

        return $contacts;
    }

    /**
     * @var EntityInterface
     * @return Object
     */
    public function create(EntityInterface $entity): Object
    {
        $response = $this->apiClient->post($this->endpoint, json_encode($entity));
        return json_decode($response->getBody()->getContents());
    }

    /**
     * @var EntityInterface
     * @return Object
     */
    public function update(EntityInterface $entity): Object
    {
        $response = $this->apiClient->put($this->endpoint . $contact->id, json_encode($entity));
        return json_decode($response->getBody()->getContents());
    }
}
