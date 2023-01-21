<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::required($_POST["title"])) {
    $errors["title"] = "field title is required";
}

if (!Validator::required($_POST["body"])) {
    $errors["body"] = "field body is required";
}

if (!Validator::max($_POST["title"], 50)) {
    $errors["title"] = "field title must be less than 50";
}

if (!Validator::max($_POST["body"], 1000)) {
    $errors["body"] = "field body must be less than 1000 characters";
}

if (!empty($errors)) {
    $errors = $_SESSION['errors'] = $errors;
    header("location: /notes/create");
    exit();
}

$db->table("notes")->create([
    "title" => $_POST["title"],
    "body" => $_POST["body"],
    "user_id" => 2
]);

header("location: /notes");
exit();
