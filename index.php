<?php
require('Postmanager.php');

$db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$postManager = new PostManager($db);
$posts = $postManager->getPosts();

require('indexView.php');
?>
