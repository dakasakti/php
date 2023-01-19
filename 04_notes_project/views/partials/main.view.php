<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Dynamic</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
</head>

<body class="h-full">
    <div class="min-h-full">
        <?php require "views/partials/navbar.view.php"; ?>
        <?php require "views/partials/heading.view.php"; ?>
        <?php require $main ?>
    </div>

</body>

</html>