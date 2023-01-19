<?php

require "Validator.php";

$heading = "Create";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
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

    if (empty($errors)) {
        DB()->table("notes")->create([
            "title" => $_POST["title"],
            "body" => $_POST["body"],
            "user_id" => 2
        ]);
    }
}

$main = "views/content/notes.create.view.php";
require "views/partials/main.view.php";
