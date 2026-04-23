<?php

declare(strict_types=1);

use App\Controller\ProductController;
use FastRoute\Dispatcher;
use FastRoute\RouteCollector;

require __DIR__ . '/../vendor/autoload.php';

define('BASE_PATH', dirname(__DIR__));

$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $router): void {
    $router->addRoute('GET', '/', [ProductController::class, 'index']);
    $router->addRoute('GET', '/product/{id:\\d+}', [ProductController::class, 'show']);
});

$httpMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        http_response_code(404);
        (new ProductController())->notFound();
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(405);
        echo 'Method Not Allowed';
        break;
    case Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        [$class, $method] = $handler;
        $controller = new $class();
        $controller->$method($vars);
        break;
}
