<?php
require('Postmanager.php');

$db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$postmanager = new PostManager($db);

if (isset($_POST['titlepost']) && $_POST['content'])
{
    $titlepost = $_POST['titlepost'];
    $content = $_POST['content'];
    $postmanager->addPost($titlepost, $content);
}

require('addpostView.php');
?>
