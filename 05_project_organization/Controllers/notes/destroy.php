<?php

use Core\App;
use Core\Database;
use Core\Helper;

$db = App::resolve(Database::class);

$currentLogin = 2;

$note = $db->table("notes")->find(["id" => $_POST['id']]);

Helper::authorize($note["user_id"] === $currentLogin);

$db->table("notes")->delete(["id" => $note["id"]]);

header("location: /notes");
exit();
