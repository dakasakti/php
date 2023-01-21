<?php

use Core\App;
use Core\Database;
use Core\Helper;

$db = App::resolve(Database::class);

Helper::view("partials/main.view.php", [
    "heading" => "Notes > Index",
    "name" => "notes/index.view.php",
    "contents" => $db->table("notes")->get(["user_id" => 2])
]);
