<?php
require 'Post.php';

class PostManager

{
    //Connexion à la base de données
    private function dbConnect()
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','');
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }

    //Récupérer données de la table billets
    public function getPosts()
    {
        $db = $this->dbConnect();
        $request = $db->query('SELECT id, title, content, date_creation FROM posts');

        while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
        {
            $posts = new Post($donnees);
            echo $posts->id(), $posts->title(), $posts->content(), $posts->date_creation();
        }
        $request ->closeCursor();
    }


    //Récupèrer un post en particulier
    public function getPost()
    {
        $db = $this->dbConnect();
        $request = $db->query('SELECT title, content, date_creation FROM posts WHERE id=');

        while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
        {
            $posts = new Post($donnees);
            echo $posts->id(), $posts->title(), $posts->content(), $posts->date_creation();
        }
        $request ->closeCursor();
    }

    // Ajouter un post
}




?>
