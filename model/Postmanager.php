<?php
require 'Post.php';

class PostManager

{
    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function getPosts($pagenumber)
    {
        $posts=[];
        $pagenumber = $pagenumber*5;
        $q = $this->_db->query('SELECT id, title, content, date_creation FROM posts ORDER BY date_creation DESC LIMIT '.$pagenumber.', 5;');
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $posts[] = new Post($donnees);
        }
        return $posts;
    }

    public function getAllPosts()
    {
        $posts=[];
        $q = $this->_db->query('SELECT id, title, content, date_creation FROM posts ORDER BY date_creation DESC');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $posts[] = new Post($donnees);
        }
        return $posts;
    }

    public function getPost($id)
    {
        $id = (int) $id;
        $q = $this->_db->query('SELECT id, title, content, date_creation FROM posts WHERE id = '.$id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        return new Post($donnees);
    }

    public function addPost($title, $content)
    {
        $date = date("Y-m-d H:i:s");
        $donnees = [$title, $content, $date];
        $post = new Post($donnees);
        $q = $this->_db->prepare('INSERT INTO posts(title, content, date_creation) VALUES(?, ?, ?)');
        $q->execute(array($title, $content, $date));
    }

    public function editPost($id, $title, $content)
    {
        $date = date("Y-m-d H:i:s");
        $querry = 'UPDATE posts SET title ="' .$title.'", content = "'.$content.'", date_creation = "'.$date.'" WHERE id=' .$id;
        $q = $this->_db->exec($querry);
    }

    public function deletePost($id)
    {
        $q = $this->_db->exec('DELETE FROM posts WHERE id=' .$id);
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}
?>
