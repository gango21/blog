<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>
        <h1>Blog</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>

        <div class="news">
            <h3>
                <?= htmlspecialchars_decode($post->title()); ?>
                <em>le <?php echo $post->date_creation(); ?></em>
            </h3>

            <p>
                <?= nl2br(htmlspecialchars_decode($post->content())); ?>
            </p>
        </div>

        <h2>Commentaires</h2>


        <?php
    for ($i=0; $i<count($comments); $i++){?>
        <p><strong><?php echo htmlspecialchars_decode($comments[$i]->author()); ?></strong> le <?php echo $comments[$i]->date_comment(); ?></p>
        <p><?php echo nl2br(htmlspecialchars_decode($comments[$i]->content_comment())); ?></p>
        <?php
        }
        ?>

        <h2>Ajouter un commentaire</h2>

        <form action="postindex.php?postId=<?php echo $post->id(); ?>" method="post">
            Auteur:<br>
            <input type="text" name="author" value=""><br>
            Commentaire
            <input type="text" name="content_comment" value=""><br>
            <input type="hidden" name="date_comment" value="<?php echo date("Y-m-d H:i:s"); ?>"><br>
            <input type="hidden" name="id_post" value="<?php echo $post->id(); ?>"><br>
            <input type="submit" value="Valider" />
        </form>
    </body>
</html>
