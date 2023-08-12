<?php

use Core\App;
use Core\Database;
use Core\Helper;
use Core\Validator;

$db = App::resolve(Database::class);

$currentLogin = 2;

$note = $db->table("notes")->find(["id" => $_POST['id']]);
Helper::authorize($note["user_id"] === $currentLogin);

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
    header("location: /notes/edit?id=" . $_POST["id"]);
    exit();
}

$db->table("notes")->update([
    "title" => $_POST["title"],
    "body" => $_POST["body"]
], ["id" => $_POST["id"]]);

header("location: /notes");
exit();
