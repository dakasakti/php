<?php

use Core\Helper;

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

Helper::view("partials/main.view.php", [
    "heading" => "Notes > Create",
    "name" => "notes/create.view.php",
    "contents" => $errors
]);
