<!DOCTYPE html>
<html>
<?php $title="Admin"; ?>
<?php ob_start();

 if (!isset($_SESSION['admin'])){ ?>
<div class="admin_page">
    <div class="admin">
        <p>Entrez votre nom d'utilisateur et votre mot de passe</p>
        <form action="index.php?action=admin" method="post">
            <p>
                <input type="text" name="user" value="user" class="form" /><br>
                <input type="password" name="password" value="password" class="form" /><br>
                <input type="submit" value="LOGIN" />
            </p>
        </form>
    </div>
</div>
<?php
    }
    else
    {
    ?>
<div class="admin_page">
    <div class="admin">
        <p><a href="index.php?action=globalView">Vue d'ensemble</a></p>
        <p><a href="index.php?action=addPost">Ajouter un billet</a></p>
        <p><a href="index.php?action=editPost&page=1">Modifier un billet</a></p>
        <p><a href="index.php?action=deleteComment">Modérer les commentaires</a></p>
        <p><a href="index.php?action=editPassword">Modifier le mot de passe</a></p>
    </div>
</div>
<?php
    }
    $content = ob_get_clean();
    require('view/template.php');
    ?>

</html>
