<?php
require 'Post.php';

class PostManager

{
    //Connexion à la base de données

    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    //Récupérer données de la table posts
    public function getPosts()
    {

        $posts=[];

        $q = $this->_db->query('SELECT id, title, content, date_creation FROM posts');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $posts[] = new Post($donnees);
        }
        return $posts;
    }


    //Récupèrer un post en particulier
    public function getPost($id)
    {
        $id = (int) $id;

        $q = $this->_db->query('SELECT id, title, content, date_creation FROM posts WHERE id = '.$id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Post($donnees);
    }

    /* Ajouter un post
    public function addPost(Post $post)
    {
        $q = $this->_db->prepare('INSERT INTO posts(id, title, content, date_creation) VALUES(:id, :title, :content, :date_creation)');

        $q->bindValue(':id', $post->setId());
        $q->bindValue(':title', $post->setTtitle());
        $q->bindValue(':content', $post->setContent());
        $q->bindValue(':date_creation', $post->setDte_creation());

        $q->execute();
    }

    //Supprimer un post
    public function delete(Post $post)
    {
        $this->_db->exec('DELETE FROM posts WHERE id = '.$post->setId());
    }*/

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }

}
?>
