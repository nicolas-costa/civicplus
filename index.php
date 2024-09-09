<?php

use App\Services\BladeServiceProvider;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$containerBuilder = new DI\ContainerBuilder();

$containerBuilder->addDefinitions([
    Jenssegers\Blade\Blade::class => function () {
        $bladeServiceProvider = new BladeServiceProvider();
        return $bladeServiceProvider->register();
    },
]);

$container = $containerBuilder->build();

$dispatcher = FastRoute\simpleDispatcher(require __DIR__ . '/routes.php');

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        header("HTTP/1.0 404 Not Found");
        echo 'Page not found';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        header("HTTP/1.0 405 Method Not Allowed");
        echo 'Method not allowed';
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        list($class, $method) = explode("@", $handler, 2);
        echo call_user_func_array(array($container->get($class), $method), $vars);
        break;
}