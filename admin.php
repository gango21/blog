<!DOCTYPE html>
<html>
    <?php $title="Admin"; ?>
    <?php ob_start();

    // Le mot de passe n'a pas été envoyé ou n'est pas bon
    if (!isset($_POST['user']) OR !isset($_POST['password']) OR ($_POST['user'] != "admin" && $_POST['password'] != "password"))
    {
    ?>
    <h1>Admin</h1>
        <p>Entrez votre nom d'utilisateur et votre mot de passe</p>
        <form action="admin.php" method="post">
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
        echo "Interface d'administration";
        echo "Ajouter un billet";
        echo "Liste des Billets";
        echo "Commentaires signalés";
    }

    $content = ob_get_clean();
    require('template.php');
    ?>

</html>
