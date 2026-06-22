<?php

declare(strict_types=1);

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
        $this->endpoint  = $endpoint;
        $this->class     = $class;
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
    public function getList(array $query = []): array
    {
        $autoPaginate = ! isset($query['page']);
        $items        = [];
        $page         = 0;

        do {
            if ($autoPaginate) {
                $query['page'] = $page;
            }

            $response = json_decode($this->apiClient->get($this->endpoint, $query)->getBody()->getContents());

            foreach ($response->content as $item) {
                $items[] = new $this->class($item);
            }
        } while ($autoPaginate && ++$page < $response->totalPages);

        return $items;
    }

    /**
     * @var EntityInterface
     * @var bool
     * @return Object
     */
    public function create(EntityInterface $entity, bool $finalize = false): Object
    {
        $finalizeParameter = $finalize ? '?finalize=true' : '';
        $response          = $this->apiClient->post($this->endpoint . $finalizeParameter, json_encode($entity));
        return json_decode($response->getBody()->getContents());
    }

    /**
     * @var EntityInterface
     * @return Object
     */
    public function update(EntityInterface $entity): Object
    {
        $response = $this->apiClient->put($this->endpoint . $entity->id, json_encode($entity));
        return json_decode($response->getBody()->getContents());
    }
}
