<?php

require ("Comment.php");

class CommentManager
{
    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function getComments($id)
    {
        $q = $this->_db->query('SELECT id, id_post, author, content_comment, date_comment, signal_comment FROM comments WHERE id_post = "'.$id.'" ORDER BY date_comment ASC');

        $comments = [];

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $comments[] = new Comment($donnees);
        }
        return $comments;
    }

    public function countComments($id)
    {
        $q = $this->_db->query('SELECT COUNT(*)S FROM comments WHERE id_post = '.$id);
        $count = $q->fetch();
        return $count[0];
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

    public function ignoreSignaledComment($id)
    {
        $q = $this->_db->exec('UPDATE comments SET signal_comment=0 WHERE id=' .$id);
    }

    public function getSignaledComments()
    {
        $q = $this->_db->query('SELECT id, id_post, author, content_comment, date_comment, signal_comment FROM comments WHERE signal_comment = 1');

        $signaledcomments = [];

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $signaledcomments[] = new Comment($donnees);
        }
        return $signaledcomments;
    }

    public function countSignaledComments($id)
    {
        $q = $this->_db->query('SELECT COUNT(*) FROM comments WHERE signal_comment = 1 AND id_post=' .$id);
        $count = $q->fetch();
        return $count[0];
    }

    public function deleteComment($id)
    {
        $q = $this->_db->exec('DELETE FROM comments WHERE id=' .$id);
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}

?>
