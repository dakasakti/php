<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function requestIs($url)
{
    return $_SERVER["REQUEST_URI"] === $url;
}

function abort($code = 404)
{
    http_response_code($code);
    require "views/errors/{$code}.php";
}

function routeToController($url, $routes)
{
    if (array_key_exists($url, $routes)) {
        require $routes[$url];
    } else {
        abort();
    }
}
