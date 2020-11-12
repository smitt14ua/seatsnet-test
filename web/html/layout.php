<?php

/**
 * @var string $title
 * @var string $content
 */

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= htmlentities($title ?? 'Test') ?></title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css?t=<?= time() ?>">
</head>
<body>
<section id="content"><?= $content ?></section>
<script defer
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script defer src="js/main.js?t=<?= time() ?>"></script>
</body>
</html>