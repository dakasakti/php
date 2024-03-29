<?php

use Core\App;
use Core\Database;
use Core\Helper;

$db = App::resolve(Database::class);

$currentLogin = 2;

$note = $db->table("notes")->find(["id" => $_GET['id'] ?? 0]);
Helper::authorize($note["user_id"] === $currentLogin);

Helper::view("partials/main.view.php", [
    "heading" => "Notes > Show",
    "name" => "notes/show.view.php",
    "contents" => $note
]);
