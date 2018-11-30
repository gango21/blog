<!DOCTYPE html>
<html>
    <?php $title="Blog"; ?>
    <?php ob_start(); ?>
        <div class="news">
                <?php
                for ($i=0; $i<count($posts); $i++){?>
                   <div class="post_container">
                      <div class="header">
                          <h3><i class="far fa-file-alt"></i><?php echo $posts[$i]->title();?></h3><h3><i class="far fa-calendar-alt"></i><?php echo $posts[$i]->date_creation();?></h3>
                      </div>
                       <div class="content">
                    <p><?php echo $posts[$i]->content();?></p>
                       </div>
                    <a href="index.php?action=post&postId=<?php echo $posts[$i]->id(); ?>">Commentaires</a>
            </div>
                <?php
                }

                ?>
            <a href="index.php?action=listPosts&page=<?php echo $page-1 ?>">Précédent</a>
            <a href="index.php?action=listPosts&page=<?php echo $page+1 ?>">Suivant</a>
        </div>
    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>
</html>
