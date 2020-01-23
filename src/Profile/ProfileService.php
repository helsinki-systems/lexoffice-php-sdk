<?php declare (strict_types = 1);

namespace LexofficeSdk\Profile;

use LexofficeSdk\Api\ApiClientInterface;
use LexofficeSdk\Api\LexofficeException;

class ProfileService extends ServiceAbstract
{

    public function __construct(ApiClientInterface $apiClient)
    {
        parent::__construct($apiClient, "profile/", Profile::class);
    }

    public function getList(array $query = ['page' => 0, 'size' => 25]): array
    {
        throw new LexofficeException('currently no getList endpoint for profile available');
    }

    public function create(EntityInterface $entity): Object
    {
        throw new LexofficeException('currently no create endpoint for profile available');
    }

    public function update(EntityInterface $entity): Object
    {
        throw new LexofficeException('currently no create endpoint for profile available');
    }
}
