<!DOCTYPE html>
<html>
    <title><?= htmlspecialchars_decode($post->title()); ?></title>
    <?php ob_start(); ?>
        <h1>Blog</h1>

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
        <div class="comments">

        <?php
        for ($i=0; $i<count($comments); $i++){?>
        <h3><strong><?php echo htmlspecialchars_decode($comments[$i]->author()); ?></strong> <em>le <?php echo $comments[$i]->date_comment(); ?></em></h3>
        <p><?php echo nl2br(htmlspecialchars_decode($comments[$i]->content_comment())); ?></p>
        <form action="index.php?action=post&postId=<?php echo $post->id(); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $comments[$i]->id(); ?>">
            <input type="hidden" name="signal_comment" value="1">
            <?php $signal = $comments[$i]->signal_comment();
            if ($signal != 0){?>
                <input type="submit"  value="Commentaire signalé" disabled>
            <?php
            }
            else{
            ?>
                <input type="submit"  value="Signaler le commentaire">
            <?php
            }
            ?>
        </form>
        <?php
        }
        ?>

        <h2>Ajouter un commentaire</h2>

        <form action="index.php?action=post&postId=<?php echo $post->id(); ?>" method="post">
            Auteur:<br>
            <input type="text" name="author" value=""><br>
            Commentaire
            <input type="text" name="content_comment" value=""><br>
            <input type="hidden" name="id_post" value="<?php echo $post->id(); ?>"><br>
            <input type="submit" value="Valider" />
        </form>
        </div>
        <?php $content = ob_get_clean(); ?>
        <?php require('template.php'); ?>
</html>
