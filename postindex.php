<?php
require('Postmanager.php');
require('Commentmanager.php');

$db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$postManager = new PostManager($db);
$post = $postManager->getPost($_GET['postId']);
$commentManager = new CommentManager($db);
$comments = $commentManager->getComments($_GET['postId']);

require('postView.php');
?>
