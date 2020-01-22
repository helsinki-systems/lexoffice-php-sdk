<?php declare (strict_types = 1);

namespace LexofficeSdk\Profile;

use LexofficeSdk\Api\ApiClient;
use LexofficeSdk\Profile\ProfileEntity;

class ProfileService
{
    /**
     * @var ApiClient
     */
    private $apiClient;

    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function getProfile(): ProfileEntity
    {
        $response = json_decode($this->apiClient->get('profile')->getBody()->getContents());
        return new ProfileEntity($response);
    }
}
