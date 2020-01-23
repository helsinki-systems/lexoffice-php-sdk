<?php declare (strict_types = 1);

namespace LexofficeSdk\Interfaces;

interface ApiClientInterface
{
    public function get(string $uri): \Psr\Http\Message\ResponseInterface;
    public function post(string $uri, string $body): \Psr\Http\Message\ResponseInterface;
    public function put(string $uri, string $body): \Psr\Http\Message\ResponseInterface;
    public function delete(string $uri): \Psr\Http\Message\ResponseInterface;
}
