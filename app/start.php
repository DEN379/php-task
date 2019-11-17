<?php

use Aura\SqlQuery\QueryFactory;
use DI\Container;
use DI\ContainerBuilder;
use League\Plates\Engine;
use Delight\Auth\Auth;
$containerBuilder = new ContainerBuilder;

$containerBuilder->addDefinitions([
    Engine::class    =>  function() {
        return new Engine('./views');
    },
    QueryFactory::class => function() {
        return new QueryFactory('mysql');
    },
    PDO::class => function() {
        return new PDO("mysql:host=localhost;dbname=tasks","root","");
    }
]);
$container = $containerBuilder->build();



$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/app/tasks', ["App\controllers\HomeController", "index"]);
    $r->addRoute('GET', '/app/tasks/create', ["App\controllers\HomeController", "create"]);
    $r->addRoute('GET', '/app/tasks/login', ["App\controllers\HomeController", "login"]);
    $r->addRoute('GET', '/app/tasks/register', ["App\controllers\HomeController", "register"]);
    $r->addRoute('POST', '/app/tasks/auth', ["App\Auth", "login"]);
    $r->addRoute('POST', '/app/tasks/register', ["App\Auth", "register"]);
    $r->addRoute('GET', '/app/tasks/logout', ["App\Auth", "logout"]);
    $r->addRoute('GET', '/app/tasks/{id:\d+}', ["App\controllers\HomeController", "show"]);
    $r->addRoute('GET', '/app/tasks/{id:\d+}/edit', ["App\controllers\HomeController", "edit"]);
    $r->addRoute('POST', '/app/tasks/{id:\d+}/update', ["App\controllers\HomeController", "update"]);
    $r->addRoute('GET', '/app/tasks/{id:\d+}/delete', ["App\controllers\HomeController", "delete"]);
    $r->addRoute('POST', '/app/tasks/store', ["App\controllers\HomeController", "store"]);
//    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
//var_dump($routeInfo);die;
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ...
        die("404 Not Found");
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ...
        die("405 Method Not Allowed");
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $container->call($handler, $vars);
        // ... call $handler with $vars
        break;
}