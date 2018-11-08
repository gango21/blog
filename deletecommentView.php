<!DOCTYPE html>
<html>
    <?php $title="Supprimer un commentaire"; ?>
    <?php ob_start(); ?>
    <h1>Blog</h1>
    <p>Commentaires signalés :</p>
        <div class="news">
            <?php
            for ($i=0; $i<count($signaledcomments); $i++){?>
            <h3><?php echo $signaledcomments[$i]->author();?> </h3>
            <p><?php echo $signaledcomments[$i]->content_comment();?> </p>
            <form action="deletecommentsIndex.php" method="post">
                <input type="hidden" name="id_delete" value="<?php echo $signaledcomments[$i]->id(); ?>">
                <input type="submit" value="Supprimer" />
            </form>
            <form action="deletecommentsIndex.php" method="post">
                <input type="hidden" name="id_ignore" value="<?php echo $signaledcomments[$i]->id(); ?>">
                <input type="submit" value="Ignorer" />
            </form>
            <?php
                                        }
            ?>
        </div>
    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>
</html>
