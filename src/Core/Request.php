<?php
namespace App\Core;

/**
 * Request class
 * 
 * This class represents a request to the server.
 */

final class Request
{
    public function __construct(
        public readonly string $method,
        public readonly string $path
    ) {}

    public static function fromGlobals(): self
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        return new self(
            $_SERVER['REQUEST_METHOD'], 
            rtrim($path, '/') ?: '/'
        );
    }
}