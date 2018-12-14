<!DOCTYPE html>
<html>
    <?php $title="Changer de mot de passe"; ?>
    <?php ob_start(); ?>

    <body>
        <form method="post">
            <input type="text" name="id" value="<?php echo $admin['id'] ?>" hidden><br>
            Nouveau mot de passe
            <input type="password" name="password" value=""><br>
            <input type="submit"  value="Envoyer">
        </form>
    </body>

    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>
</html>
