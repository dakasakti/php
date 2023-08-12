<?php

$routes->get("/", "Controllers/index.php");
$routes->get("/about", "Controllers/about.php");
$routes->get("/contact", "Controllers/contact.php");

$routes->get("/notes/create", "Controllers/notes/create.php");
$routes->get("/notes/edit", "Controllers/notes/edit.php");
$routes->get("/notes", "Controllers/notes/index.php");
$routes->post("/notes", "Controllers/notes/store.php");
$routes->put("/notes", "Controllers/notes/update.php");
$routes->get("/note", "Controllers/notes/show.php");
$routes->delete("/note", "Controllers/notes/destroy.php");
