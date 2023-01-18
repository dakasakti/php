<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fundamental</title>
</head>

<body>
    <form action="">
        <input type="text" name="author" value="<?= $author ?>">
        <button type="submit">Submit</button>
    </form>

    <h2>Result Data</h2>
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