<?php
require('Postmanager.php');
require('Commentmanager.php');

$db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$postManager = new PostManager($db);
$post = $postManager->getPost($_GET['postId']);
$commentManager = new CommentManager($db);

if (isset($_POST['id_post']) && isset($_POST['author']) && isset($_POST['content_comment']) && isset($_POST['date_comment']))
{
    $postId = $_POST['id_post'];
    $author = $_POST['author'];
    $content_comment = $_POST['content_comment'];
    $date_comment = $_POST['date_comment'];
    $commentManager->addComment($postId, $author, $content_comment, $date_comment);
}

$comments = $commentManager->getComments($_GET['postId']);

require('postView.php');
?>
