<?php

use Core\Helper;

Helper::view("errors/main.view.php", [
    "title" => "403 | Page Forbidden",
    "name" => "errors/content/index.view.php",
]);
