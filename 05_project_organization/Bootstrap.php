<?php

use Core\App;
use Core\Container;
use Core\Database;
use Core\Helper;

$container = new Container();

$container->bind(Database::class, function () {
    $config = require(Helper::base_path("config/Database.php"));
    return new Database($config);
});

App::setContainer($container);
