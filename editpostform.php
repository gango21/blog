<?php

require('Postmanager.php');
$db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$postmanager = new PostManager($db);

if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $post = $postmanager->getPost($_GET['id']);
}

if (isset($_POST['titlePostEdit']) && isset($_POST['idPostEdit']))
{
    $id = $_POST['idPostEdit'];
    $titlepost = $_POST['titlePostEdit'];
    $content = htmlspecialchars($_POST['contentPostEdit']);
    $postmanager->editPost($id, $titlepost, $content);
}

require('editpostformView.php');
?>
