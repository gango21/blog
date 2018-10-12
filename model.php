<?php
require 'Billet.php';

//Connexion à la base de données
try
{
    $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$request = $db->query('SELECT id, titre, contenu, date_creation FROM billets');

while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
{
    $billet = new Billet($donnees);
    echo $billet->id(), $billet->titre(), $billet->contenu();
}
$request ->closeCursor();
?>
