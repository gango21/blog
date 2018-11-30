<?php
session_start();
require('model/Postmanager.php');
require('model/Commentmanager.php');
require('model/Adminmanager.php');

//frontend

function listPosts($page)
{
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    $postManager = new PostManager($db);
    $pagenumber = $page-1;
    $posts = $postManager->getPosts($pagenumber);

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
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    $adminManager = new Adminmanager($db);
    $admin = $adminManager->connectAdmin();

    if (!isset($_POST['user']) OR !isset($_POST['password']) OR ($_POST['user'] != $admin['user'] OR !password_verify($_POST['password'],$admin['password']))){
    }
    else{
        $_SESSION['admin']=$_POST['user'];
    }
    require('view/backend/adminView.php');
}

//backend

function editPassword()
{
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    $adminManager = new Adminmanager($db);
    $admin = $adminManager->connectAdmin();

    if (isset($_POST['password']) && $_POST['id'])
    {
        $id = $_POST['id'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $adminManager->editPassword($id, $password);
    }

    require('view/backend/editPasswordView.php');
}

function logout()
{
    unset($_SESSION['admin']);
    header("location: index.php");

}
function addPost()
{

    if(empty($_SESSION['admin']))
    {
        header('Location: index.php');
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
    if(empty($_SESSION['admin']))
    {
        header('Location: index.php');
        exit();
    }

    else
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

}



function editPost()
{
    if(empty($_SESSION['admin']))
    {
        header('Location: index.php');
        exit();
    }

    else
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

}

function editPostForm()
{
    if(empty($_SESSION['admin']))
    {
        header('Location: index.php');
        exit();
    }
    else
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

}

function signaledComments()
{

    if(empty($_SESSION['admin']))
    {
        header('Location: index.php');
        exit();
    }

    else
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

}


