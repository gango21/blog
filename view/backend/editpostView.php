<!DOCTYPE html>
<html>
    <?php $title="Editer un post"; ?>
    <?php ob_start(); ?>
    <h1>Blog</h1>

        <?php
        for ($i=0; $i<count($posts); $i++){?>
            <!--<div class="post_container">
                <div class="header">
                    <h3><?php echo $posts[$i]->title();?> </h3>
                </div>
                    <p><?php echo $posts[$i]->content();?></p>
                    <form method="post" action="index.php?action=editPostForm&id=<?php echo $posts[$i]->id(); ?>">
                        <input type="hidden" name="id" value="<?php echo $posts[$i]->id(); ?>">
                        <input type="submit" value="Modifier">
                    </form>
                    <form method="post">
                        <input type="hidden" name="post_delete" value="<?php echo $posts[$i]->id(); ?>">
                        <input type="submit" value="Supprimer">
                    </form>
    </div>
                    <?php
                                                      }
                    ?>
    -->
    <?php
    for ($i=0; $i<count($posts); $i++){?>
    <div class="post_container">
        <div class="header">
            <h3><i class="far fa-file-alt"></i><?php echo $posts[$i]->title();?></h3><h3><i class="far fa-calendar-alt"></i><?php echo $posts[$i]->date_creation();?><?php echo $posts[$i]->date_creation_fr();?></h3>
        </div>
        <div class="content">
            <p><?php echo $posts[$i]->content();?></p>
        </div>
        <form method="post">
            <input type="hidden" name="post_delete" value="<?php echo $posts[$i]->id(); ?>">
            <input type="submit" value="Supprimer">
        </form>
    </div>
    <?php
                                      }

    ?>
    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>
</html>
