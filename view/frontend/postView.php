<!DOCTYPE html>
<html>
    <title><?= htmlspecialchars_decode($post->title()); ?></title>
    <?php ob_start(); ?>
    <div class="news">
        <div class="post_container">
            <div class="header">
                <div class="title"><i class="far fa-file-alt"></i><?= htmlspecialchars_decode($post->title()); ?></div>
                <div class="date_creation"><i class="far fa-calendar-alt"></i><?php echo date("d-m-Y H:i",strtotime($post->date_creation()))?><?php ?></div>
            </div>
            <div class="content">
                <p><?php echo $post->content();?></p>
            </div>

        </div>
    </div>

        <div class="comments">



            <?php
            for ($i=0; $i<count($comments); $i++){?>
            <div class="comments_header">
                <div class="author"><strong><?php echo $comments[$i]->author(); ?></strong></div>
                <div class="date"><em><?php echo date("d-m-Y H:i",strtotime($comments[$i]->date_comment())); ?></em></div>
            </div>
            <div class="comments_content">
            <p><?php echo $comments[$i]->content_comment(); ?></p>
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
                <span title="Signaler ce commentaire"><input type="submit" value="!";></span>
                <?php
                                                  }
                ?>
            </form>
        </div>

            <?php
            }
            ?>
            </div>
        <div class="comment_form">
        <form action="index.php?action=post&postId=<?php echo $post->id(); ?>" method="post">
            Nom
            <input type="text" name="author" value=""><br>
            Commentaire
            <textarea name="content_comment" value=""></textarea><br>
            <input type="hidden" name="id_post" value="<?php echo $post->id(); ?>">
            <input type="submit" value="Envoyer" />
        </form>
            </div>

        <?php $content = ob_get_clean(); ?>
        <?php require('template.php'); ?>
</html>
