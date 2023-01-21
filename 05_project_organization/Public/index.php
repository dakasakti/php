<?php
session_start();

use Core\Helper;
use Core\Routes;

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "Core/Helper.php";

spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require Helper::base_path("{$class}.php");
});

require(Helper::base_path("Bootstrap.php"));

$routes = new Routes();
require(Helper::base_path("Routes.php"));

$url = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];
$routes->route($url, $method);
