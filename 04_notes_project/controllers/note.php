<?php

$heading = "Home";

$currentLogin = 2;
$note = DB()->table("notes")->find(["id" => $_GET['id'] ?? 0]);

authorize($note["user_id"] === $currentLogin);

$main = "views/content/note.view.php";
require "views/partials/main.view.php";
