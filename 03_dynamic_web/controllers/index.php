<?php

$heading = "Home";
$config = require('config/Database.php');
$db = new Database($config);

$id = $_GET["id"] ?? "1";
$post = $db->query("SELECT * FROM posts WHERE id = :id", ['id' => $id])->fetch();

$main = "views/content/index.view.php";

require "views/partials/main.view.php";
