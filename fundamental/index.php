<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Hello World version -->
    <h1>Hello World</h1>
    <h1><?php echo "Hello World"; ?></h1>
    <h1><?= "Hello World"; ?></h1>

    <!-- How To Run Server -->
    <!-- php -S localhost:8000 (php --help) -->

    <!-- Variable -->
    <?php

    $greeting = "Hello";

    // concat
    echo $greeting . " " . "World";
    echo "<br>";
    echo "$greeting World";
    echo "<br>";

    ?>

    <!-- Conditional -->
    <?php

    $bookName = "Dark Matter";
    $read = true;

    if ($read) {
        $message = "You have read the $bookName";
    } else {
        $message = "You have NOT read the $bookName";
    }

    ?>

    <h2><?= $message ?></h2>

    <!-- Array -->
    <?php

    $books = ["The Dark Web", "Programming Web", "Dakasakti Web"];

    echo "<ul>";
    foreach ($books as $book) {
        echo "<li>$book</li>";
    }
    echo "</ul>";
    ?>

    <!-- Loop -->
    <ul>
        <?php foreach ($books as $book) : ?>
            <li><?= $book ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- Array Associatif -->
    <?php

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

    ?>

    <!-- Loop -->
    <ul>
        <?php foreach ($books as $book) : ?>
            <a href="<?= $book["url"] ?>">
                <li><?= $book["name"] ?> by. <?= $book["author"] ?></li>
            </a>
        <?php endforeach; ?>
    </ul>

    <!-- Function -->
    <?php

    // formData
    $author = $_GET["author"] ?? null;

    function filter($books, $author): array
    {
        $filtered = [];

        foreach ($books as $book) {
            if ($book["author"] === $author) {
                $filtered[] = $book;
            }
        }

        return $filtered;
    }

    ?>

    <!-- Filter -->
    <!-- Interactive -->
    <form action="">
        <input type="text" name="author" value="<?= $author ?>">
        <button type="submit">Submit</button>
    </form>

    <h2>Version First</h2>
    <ul>
        <?php if (count($filters = filter($books, $author)) > 0) : ?>
            <?php foreach ($filters as $book) : ?>
                <a href="<?= $book["url"] ?>">
                    <li><?= $book["name"] ?></li>
                </a>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Book Not Found (404)</p>
        <?php endif ?>
    </ul>

    <!-- Anonymous or Lambda Function -->
    <?php

    $filter = function ($books, $fn): array {
        $filtered = [];

        foreach ($books as $book) {
            if ($fn($book)) {
                $filtered[] = $book;
            }
        }

        return $filtered;
    };

    // value author // formData
    // manual
    $filteredBooks = $filter($books, function ($book) use ($author) {
        return $book["author"] === $author;
    });

    // built-in function
    $filteredBooks = array_filter($books, function ($book) use ($author) {
        return $book["author"] === $author;
    });

    ?>

    <h2>Version Two</h2>
    <ul>
        <?php if (count($filteredBooks) > 0) : ?>
            <?php foreach ($filteredBooks as $book) : ?>
                <a href="<?= $book["url"] ?>">
                    <li><?= $book["name"] ?></li>
                </a>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Book Not Found (404)</p>
        <?php endif ?>
    </ul>
</body>

</html>