<?php

$heading = "Notes";

$notes = DB()->table("notes")->get(["user_id" => 2]);

$main = "views/content/notes.view.php";
require "views/partials/main.view.php";
