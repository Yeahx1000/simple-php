<?php
declare(strict_types=1);
// this is the index file for the project

require __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Core\Request;
use App\Controllers\HomeController;

$request = Request::fromGlobals();
$router = new Router();

$router->get('/', [HomeController::class, 'index']);
$router->get('/health',fn () => 'OK');

$response = $router->dispatch($request);

echo $response;