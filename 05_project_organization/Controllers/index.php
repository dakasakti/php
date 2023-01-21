<?php

use Core\App;
use Core\Database;
use Core\Helper;

$db = App::resolve(Database::class);

Helper::view("partials/main.view.php", [
    "heading" => "Home",
    "name" => "content/index.view.php",
    "contents" => $db->table("posts")->find(["id" => $_GET["id"] ?? "1"]),
]);
