<!DOCTYPE html>
<html>
    <?php $title="Blog"; ?>
    <?php ob_start(); ?>
        <h1>Blog</h1>
        <p>Derniers billets du blog :</p>
        <div class="news">
                <?php
                for ($i=0; $i<count($posts); $i++){?>
                    <h3><?php echo $posts[$i]->title();?> </h3>
                    <p><?php echo $posts[$i]->content();?></p>
                    <a href="postindex.php?postId=<?php echo $posts[$i]->id(); ?>">Commentaires</a>
                <?php
                }
                ?>
        </div>
    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>
</html>
