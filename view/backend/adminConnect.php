<!DOCTYPE html>
<html>
<?php $title="Admin"; ?>
<?php ob_start();?>

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
$content = ob_get_clean();
require('view/template.php');
?>

</html>
