<!DOCTYPE html>
<html>
<?php $title="Admin"; ?>
<?php ob_start();

 if (isset($_SESSION['admin'])){ ?>
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
