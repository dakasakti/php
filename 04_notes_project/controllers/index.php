<?php

$heading = "Home";

$id = $_GET["id"] ?? "1";
$post = DB()->table("posts")->find(["id" => $id]);

$main = "views/content/index.view.php";
require "views/partials/main.view.php";
