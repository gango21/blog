<?php

require ("Comment.php");

class CommentManager
{
    //Connexion à la base de données

    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function getComments($id)
    {
        $q = $this->_db->query('SELECT id, id_post, author, content_comment, date_comment FROM comments WHERE id_post = '.$id);

        $comments = [];

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $comments[] = new Comment($donnees);
        }
        return $comments;
    }

    public function addComment($postId, $author, $content_comment, $date_comment)
    {
        $q = $this->_db->prepare('INSERT INTO comments(id_post, author, content_comment, date_comment) VALUES(?, ?, ?, ?)');
        $q->execute(array($postId, $author, $content_comment, $date_comment));
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}

?>
