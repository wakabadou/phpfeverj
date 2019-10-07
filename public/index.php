<?php

require __DIR__ . '/../vendor/autoload.php';

$routes = require __DIR__ . '/../app/routes.php';

$request_uri = $_SERVER['REQUEST_URI'];

if ($routes[$request_uri]) {
    echo $routes[$request_uri]();
    exit;
}

http_response_code(404);
echo "<h1>404 Not Found</h1>";
