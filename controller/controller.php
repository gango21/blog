<?php

require('model/Postmanager.php');
require('model/Commentmanager.php');

//frontend

function listPosts()
{
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    $postManager = new PostManager($db);
    $posts = $postManager->getPosts();

    require('view/frontend/indexView.php');
}

function post()
{
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    $postManager = new PostManager($db);
    $post = $postManager->getPost($_GET['postId']);
    $commentManager = new CommentManager($db);

    if (isset($_POST['id_post']) && isset($_POST['author']) && isset($_POST['content_comment']))
    {
    $postId = $_POST['id_post'];
    $author = htmlspecialchars($_POST['author']);
    $content_comment = htmlspecialchars($_POST['content_comment']);
    $commentManager->addComment($postId, $author, $content_comment);
    }

    if (isset($_POST['signal_comment']))
    {
    $id = $_POST['id'];
    $commentManager->signalComment($id);
    }

    $comments = $commentManager->getComments($_GET['postId']);

    require('view/frontend/postView.php');
}

function admin()
{
    if (!isset($_POST['user']) OR !isset($_POST['password']) OR ($_POST['user'] != "admin" OR $_POST['password'] != "password")){
        echo "Vous n'êtes pas authentifié";
    }
    else{
        echo "Vous êtes authentifié";
    }
    require('view/backend/adminView.php');
}

//backend


function addPost()
{

    if(empty($_SESSION['admin']))
    {
        // Si inexistante ou nulle, on redirige vers le formulaire de login
        header('Location: ');
        exit();
    }

    else{
        $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        $postmanager = new PostManager($db);

        if (isset($_POST['titlepost']) && $_POST['content'])
        {
            $titlepost = $_POST['titlepost'];
            $content = $_POST['content'];
            $postmanager->addPost($titlepost, $content);
        }

        require('view/backend/addpostView.php');
    }


}

function deleteComment()
{
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


    require('view/backend/deletecommentView.php');
}



function editPost()
{
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    $postmanager = new PostManager($db);
    $posts = $postmanager->getPosts();

    if (isset($_POST['post_delete']))
    {
        $id = $_POST['post_delete'];
        $postmanager->deletePost($id);
    }

    require('view/backend/editpostView.php');
}

function editPostForm()
{
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    $postmanager = new PostManager($db);

    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
        $post = $postmanager->getPost($_GET['id']);
    }

    if (isset($_POST['titlePostEdit']) && isset($_POST['idPostEdit']) && isset($_POST['contentPostEdit']))
    {
        $id = $_POST['idPostEdit'];
        $titlepost = $_POST['titlePostEdit'];
        $content = $_POST['contentPostEdit'];
        $postmanager->editPost($id, $titlepost, $content);
    }

    require('view/backend/editpostformView.php');
}

function signaledComments()
{
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

    require('view/frontend/postView.php');
}


