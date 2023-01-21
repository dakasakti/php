<?php

use Core\Helper;

Helper::view("errors/main.view.php", [
    "title" => "404 | Page Not Found",
    "name" => "errors/content/index.view.php",
]);
