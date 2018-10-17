<?php
require 'Billet.php';
require 'Comment.php';

//Connexion à la base de données
try
{
    $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

//Récupérer données de la table billets et commentaires
$request = $db->query('
SELECT billets.id, titre, contenu, date_creation, commentaires.id, id_billets, content, author, date_comment
FROM billets
INNER JOIN commentaires
ON billets.id = id_billets
');

while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
{
    $billet = new Billet($donnees);
    $comment = new Comment($donnees);
    echo $billet->id(), $billet->titre(), $billet->contenu(), $comment->id(), $comment->id_billets(), $comment->content(), $comment->author(), $comment->date_comment();
}
$request ->closeCursor();
?>
