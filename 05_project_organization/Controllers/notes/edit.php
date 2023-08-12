<?php

use Core\Helper;
use Core\App;
use Core\Database;

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

$db = App::resolve(Database::class);

$currentLogin = 2;

$note = $db->table("notes")->find(["id" => $_GET['id'] ?? 0]);
Helper::authorize($note["user_id"] === $currentLogin);

if ($errors) {
    $note = [$note, $errors];
}

Helper::view("partials/main.view.php", [
    "heading" => "Notes > Edit",
    "name" => "notes/edit.view.php",
    "contents" => $note,
]);
