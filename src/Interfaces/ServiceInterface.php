<?php declare (strict_types = 1);

namespace LexofficeSdk\Interfaces;

use LexofficeSdk\Interfaces\EntityInterface;

interface ServiceInterface
{
    public function get(string $id, array $query): EntityInterface;
    public function getList(array $query);
    public function create(EntityInterface $entity): Object;
    public function update(EntityInterface $entity): Object;

}
