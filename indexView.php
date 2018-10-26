<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>
        <h1>Blog</h1>
        <p>Derniers billets du blog :</p>
        <div class="news">
                <?php
                for ($i=0; $i<count($posts); $i++){?>
                    <h3><?php echo $posts[$i]->title();?> </h3>
                    <p><?php echo $posts[$i]->content();?></p>
                    <a href="post.php?billet=<?php echo $posts[$i]->id(); ?>">Commentaires</a>
                <?php
                }
                var_dump($posts); //Voir le contenu de l'array $posts
                ?>
        </div>
    </body>
</html>
