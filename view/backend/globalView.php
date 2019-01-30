<!DOCTYPE html>
<html>
<?php $title="Admin"; ?>
<?php ob_start(); ?>

<div class="global_page">
    <div class="global">
        <!--<style type="text/css">
            .tg  {border-collapse:collapse;border-spacing:0;}
            .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
            .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
            .tg .tg-0lax{text-align:left;vertical-align:top}
        </style>-->
        <table class="tg">
            <!--<tr>
                <th>date</th>
                <th>titre</th>
                <th>contenu</th>
                <th>edition</th>
                <th>suppression</th>
                <th>commenaires</th>
                <th>modération</th>
            </tr>!-->
            <?php
            for ($i=0; $i<count($posts); $i++){?>
            <tr>
                <td><?php echo date("d-m-Y H:i",strtotime($posts[$i]->date_creation()));?></td>
                <td><a href="index.php?action=post&postId=<?php echo $posts[$i]->id(); ?>"><?php echo $posts[$i]->title();?></a></td>
                <td><?php echo strip_tags(substr($posts[$i]->content(),0,30))."...";?></td>
                <td><a href="index.php?action=editPostForm&id=<?php echo $posts[$i]->id();?>"> <i class="fas fa-pencil-alt"></i></a></td>
                <td><form method="post" action="">
                    <input type="hidden" name="post_delete" value="<?php echo $posts[$i]->id(); ?>">
                    <input type="submit" value="Supprimer" type="hidden">
                    </form>
                <td><a href="index.php?action=post&postId=<?php echo $posts[$i]->id(); ?>"><?php echo $commentManager->countComments($posts[$i]->id()); ?> <i class="fa fa-comment"></i></a></td>
                <td><a href="index.php?action=deleteComment"><?php echo $commentManager->countSignaledComments($posts[$i]->id()); ?> <i class="fas fa-exclamation-triangle"></i></a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>



<?php
$content = ob_get_clean();
require('view/template.php');
?>

</html>
