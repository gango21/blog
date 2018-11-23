<!DOCTYPE html>
<html>
    <?php $title="Admin"; ?>
    <?php ob_start();

    // Le mot de passe n'a pas été envoyé ou n'est pas bon
    if (!isset($_SESSION['admin']))
    {

    ?>
    <h1>Admin</h1>
        <p>Entrez votre nom d'utilisateur et votre mot de passe</p>
        <form action="index.php?action=admin" method="post">
            <p>
            Nom d'utilisateur : <input type="text" name="user" /><br>
            Mot de passe : <input type="password" name="password" /><br>
            <input type="submit" value="Valider" />
            </p>
        </form>
    <?php
    }
    else
    {
    ?>
        <p><a href="index.php?action=addPost">Ajouter un billet</a></p>
        <p><a href="index.php?action=editPost">Modifier un billet</a></p>
        <p><a href="index.php?action=deleteComment">Modérer les commentaires</a></p>
        <p><a href="index.php?action=editPassword">Modifier le mot de passe</a></p>
    <?php
    }
    $content = ob_get_clean();
    require('template.php');
    ?>

</html>
