<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>
    <header>
        <ul>
            <li>
                <a href="index.php?action=listPosts">Liste des billets</a>
            </li>
            <li>
                <a href="index.php?action=admin">Admin</a>
            </li>
            <?php
            if (isset($_SESSION['admin'])){
            ?>
            <li>
                <a href="index.php?action=logout">Déconnexion</a>
            </li>
            <?php
                }
            ?>
        </ul>

    </header>
    <body>
        <?= $content ?>
    </body>
</html>
