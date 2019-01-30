<!DOCTYPE html>
<html>
<?php $title="Changer de mot de passe"; ?>
<?php ob_start(); ?>

<body>
    <div class="admin_page">
        <div class="admin">
            <form method="post">
                <input type="text" name="id" value="<?php echo $admin['id'] ?>" hidden><br>
                    <p>Nouveau mot de passe</p>
                    <p><input type="password" name="password" class="form"><br></p>
                <input type="submit" value="Envoyer">
            </form>
        </div>
    </div>
</body>

<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>

</html>
