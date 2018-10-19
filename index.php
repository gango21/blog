<?php
require('model.php');
require('indexView.php');

$postManager = new PostManager;
$postManager->getPosts();
?>
