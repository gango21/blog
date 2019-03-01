<!DOCTYPE html>
<html>
<?php $title="Blog"; ?>
<?php ob_start(); ?>
<div class="news">
    <?php
                for ($i=0; $i<count($posts); $i++){?>
    <div class="post_container">
        <div class="header">
            <div class="title"><a href="index.php?action=post&postId=<?php echo $posts[$i]->id(); ?>"> <span><i class="far fa-file-alt"></i>
                <?php echo $posts[$i]->title();?></span></a></div>
            <div class="date_creation"><span><i class="far fa-calendar-alt"></i>
                    <?php echo date("d-m-Y H:i",strtotime($posts[$i]->date_creation()))?>
                    <?php ?></span></div>
        </div>
        <div class="content">
            <p>
                <?php echo $posts[$i]->content();?>
            </p>
        </div>
        <div class="comment">
            <a href="index.php?action=post&postId=<?php echo $posts[$i]->id(); ?>" title="Voir le post et les commentaires"><i class="far fa-comment"></i>
                <?php echo $commentManager->countComments($posts[$i]->id()); ?> commentaire(s)</a>
        </div>
    </div>
    <?php
                }
                ?>
    <div class="page_navigation">
        <select id="selectbox" name="" onchange="javascript:location.href = this.value;">
            <option value="#">--Page--</option>
            <?php
            for ($i=0; $i<$pages_count; $i++){ ?>
            <option value="index.php?action=listPosts&page=<?php echo $i+1; ?>"><?php echo $i+1; ?></option>
            <?php
            }
            ?>
        </select>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>

</html>
