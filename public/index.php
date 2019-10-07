<?php

require __DIR__ . '/../vendor/autoload.php';

$routes = [];

$routes['/'] = function () {
    echo "<!DOCTYPE html>\n";
    echo "<title>test</title>\n";
    echo "<p>現在は" . h(date('Y年m月d日H時i分s秒')). "です</p>\n";
    echo "<ul><li><a href='/phpinfo.php'><code>phpinfo()</code></a></ul>\n";
    echo "<hr>\n";
    exit;
};

$routes[ '/phpinfo.php'] = function () {
    phpinfo();
    exit;
};

$request_uri = $_SERVER['REQUEST_URI'];

if ($routes[$request_uri]) {
    echo $routes[$request_uri]();
    exit;
}

http_response_code(404);
echo "<h1>404 Not Found</h1>";
