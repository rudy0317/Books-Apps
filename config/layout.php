<?php
include __DIR__ . "/config.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : $siteTitle ?></title>
    <link rel="stylesheet" href="<?= $baseURL ?>assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<div class="container">
    <h2><?= $siteTitle ?></h2>
    <hr>

    <?= $content ?>

    <hr>
    <p>&copy; (Rudy NPM :2310010148) 2025 <?= $siteTitle ?></p>
</div>
</body>
</html>
