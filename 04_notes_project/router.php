<?php

$routes = require('Routes.php');
$url = parse_url($_SERVER["REQUEST_URI"])["path"];
routeToController($url, $routes);
