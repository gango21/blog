<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="style.css" rel="stylesheet" />
    </head>
    <header>
        <a href="index.php?action=listPosts">Liste des billets</a>
        <?php
            if (!isset($_SESSION['admin'])){
        ?>
        <a href="index.php?action=admin">Admin</a>
            <?php
        }
            ?>
        <?php
            if (isset($_SESSION['admin'])){
                ?>
        <a href="index.php?action=logout">Déconnexion</a>
        <?php
            }
        ?>
    </header>
    <body>
        <?= $content ?>
    </body>
</html>
