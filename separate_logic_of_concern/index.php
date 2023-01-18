<?php

// array
$books = [
    [
        "name" => "The Dark Web",
        "author" => "Kaila",
        "url" => "http://example.com/the-dark-web"
    ],
    [
        "name" => "Dakasakti Web",
        "author" => "Daka",
        "url" => "http://example.com/dakasakti-web"
    ]
];

// formData
$author = $_GET["author"] ?? null;

// built-in function
$filteredBooks = array_filter($books, function ($book) use ($author) {
    return $book["author"] === $author;
});

require "index.view.php";
