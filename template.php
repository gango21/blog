<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="style.css" rel="stylesheet" />
    </head>
    <header>
        <a href="index.php?action=listPosts">Liste des billets</a>
        <a href="index.php?action=admin">Admin</a>
    </header>
    <body>
        <?= $content ?>
    </body>
</html>
