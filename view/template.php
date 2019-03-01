<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>
        <?= $title ?>
    </title>
    <link href="public/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="public/js/nav.js"></script>
    <script src="public/js/navpage.js"></script>

    <meta content="width=device-width, initial-scale=1" name="viewport" />
</head>
<header>
    <nav>
        <div class="logo">
           <ul>
               <li><a href="index.php?action=listPosts&page=1"><i class="fas fa-home"></i><span class="home"> Liste des billets</span></a></li>
            </ul>
        </div>
        <ul>
            <div class="dropdown">
                <li><a class="dropbtn" href="index.php?action=admin"><i class="far fa-user"></i><span class="home"> Admin</span></a></li>
                <?php
                if (isset($_SESSION['admin'])){
                ?>
                <div id="myDropdown" class="dropdown-content">
                    <a href="index.php?action=globalView">Vue d'ensemble</a>
                    <a href="index.php?action=addPost">Ajouter un billet</a>
                    <a href="index.php?action=editPost&page=1">Modifier un billet</a>
                    <a href="index.php?action=deleteComment">Modérer les commentaires</a>
                    <a href="index.php?action=editPassword">Modifier le mot de passe</a>
                    <a href="index.php?action=editEmail">Modifier votre email</a>
                </div>
                <?php
    }
                ?>
                </div>
            <?php
            if (isset($_SESSION['admin'])){
            ?>
            <li>
                <a href="index.php?action=logout"><i class="fas fa-power-off"></i><span class="home"> Déconnexion</span></a>
            </li>
            <?php
            }
            ?>
        </ul>
    </nav>
</header>

<body>
    <?= $content ?>
</body>



</html>
