<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once 'Header.php';

use FastRoute\RouteCollector;
use FastRoute\Dispatcher;
use function FastRoute\simpleDispatcher;

// Define the base URL with the directory where the index.php file is located
$baseUrl = dirname($_SERVER['SCRIPT_NAME']);
require_once 'Header.php';
// Define your routes
$routes = function (RouteCollector $r) {
    $r->addRoute('GET', '/', 'Pages/Home.php');
    $r->addRoute('GET', '/ViewPosts', 'Pages/ViewPosts.php');
    $r->addRoute('GET', '/Profile', 'Pages/ViewProfile.php');
};

// Create a dispatcher
$dispatcher = simpleDispatcher($routes);

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];


// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

// Dispatch the request
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
// Handle the route
switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo '404 Not Found';
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        http_response_code(405);
        echo '405 Method Not Allowed';
        break;
    case Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        if (is_callable($handler)) {
            call_user_func_array($handler, $vars);
        } else {
            // Include the corresponding file for the route
            // $vars will be available in the included file
            require __DIR__ . '/src/' . $handler;
        }
        break;
}
