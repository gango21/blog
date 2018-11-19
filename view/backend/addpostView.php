<!DOCTYPE html>
<html>
    <?php $title="Ajouter un post"; ?>
    <?php ob_start(); ?>
    <h1>Blog</h1>
    <p>Ajouter un post :</p>

    <script src='https://devpreview.tiny.cloud/demo/tinymce.min.js'></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>

    <body>
        <form method="post" action="">
            <input type="text" name="titlepost" value="Titre du Post"><br>
            <textarea id="mytextarea" name="content">Hello, World!</textarea>
            <input type="submit"  value="Envoyer">
        </form>
    </body>

    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>
</html>
