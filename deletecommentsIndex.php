<?php

require('Commentmanager.php');

$db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$commentManager = new CommentManager($db);

if (isset($_POST['id_delete']))
{
    $id = $_POST['id_delete'];
    $commentManager->deleteComment($id);
}

if (isset($_POST['id_ignore']))
{
    $id = $_POST['id_ignore'];
    $commentManager->ignoreSignaledComment($id);
}

$signaledcomments = $commentManager->getSignaledComments();


require('deletecommentView.php');
?>
