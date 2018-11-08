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
        $q = $this->_db->query('SELECT id, id_post, author, content_comment, date_comment, signal_comment FROM comments WHERE id_post = '.$id);

        $comments = [];

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $comments[] = new Comment($donnees);
        }
        return $comments;
    }

    public function addComment($postId, $author, $content_comment)
    {
        $signal_comment = 0;
        $date_comment = date("Y-m-d H:i:s");
        $q = $this->_db->prepare('INSERT INTO comments(id_post, author, content_comment, date_comment, signal_comment) VALUES(?, ?, ?, ?, ?)');
        $q->execute(array($postId, $author, $content_comment, $date_comment, $signal_comment));
    }

    public function signalComment($id)
    {
        $q = $this->_db->exec('UPDATE comments SET signal_comment=1 WHERE id=' .$id);
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}

?>
