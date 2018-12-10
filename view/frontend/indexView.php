<!DOCTYPE html>
<html>
    <?php $title="Blog"; ?>
    <?php ob_start(); ?>
        <div class="news">
                <?php
                for ($i=0; $i<count($posts); $i++){?>
                   <div class="post_container">
                      <div class="header">
                          <div class="title"><i class="far fa-file-alt"></i><?php echo $posts[$i]->title();?></div>
                          <div class="date_creation"><i class="far fa-calendar-alt"></i><?php echo date("d-m-Y H:i",strtotime($posts[$i]->date_creation()))?><?php ?></div>
                      </div>
                       <div class="content">
                    <p><?php echo $posts[$i]->content();?></p>
                       </div>
                       <div class="comment">
                       <a href="index.php?action=post&postId=<?php echo $posts[$i]->id(); ?>"><i class="far fa-comment"></i>Commentaires</a>
                       </div>
                    </div>
                <?php
                }

                ?>
                <div class="page_navigation">
                    <a href="index.php?action=listPosts&page=<?php echo $page-1 ?>"><i class="fas fa-caret-left"></i></a>
                    <?php echo $page ?>
                    <a href="index.php?action=listPosts&page=<?php echo $page+1 ?>"><i class="fas fa-caret-right"></i></a>
            </div>
        </div>
    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>
</html>
