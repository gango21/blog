<?php

require('Postmanager.php');

$db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$postmanager = new PostManager($db);
$posts = $postmanager->getPosts();

if (isset($_POST['post_delete']))
{
    $id = $_POST['post_delete'];
    $postmanager->deletePost($id);
}

require('editpostView.php')

?>
