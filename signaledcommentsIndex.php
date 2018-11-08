<?php
require('Commentmanager.php');

$db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$postManager = new PostManager($db);
$post = $postManager->getPost($_GET['postId']);
$commentManager = new CommentManager($db);

if (isset($_POST['id_post']) && isset($_POST['author']) && isset($_POST['content_comment']))
{
$postId = $_POST['id_post'];
$author = $_POST['author'];
$content_comment = $_POST['content_comment'];
$commentManager->addComment($postId, $author, $content_comment);
}

if (isset($_POST['signal_comment']))
{
$id = $_POST['id'];
$commentManager->signalComment($id);
}

$comments = $commentManager->getComments($_GET['postId']);

require('postView.php');
?>
