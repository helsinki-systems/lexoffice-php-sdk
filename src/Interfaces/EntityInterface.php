<?php declare (strict_types = 1);

namespace LexofficeSdk\Interfaces;

interface EntityInterface
{
    public function __construct($data = null);
    public function setData($data): self;
    public function setDefaultData();
}
