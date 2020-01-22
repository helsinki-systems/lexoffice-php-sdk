<?php declare (strict_types = 1);

namespace LexofficeSdk\Api;

interface ApiClientInterface
{
    public function post(string $body): \Psr\Http\Message\ResponseInterface;
}
