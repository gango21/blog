<?php
require('controller/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    }
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['postId']) && $_GET['postId'] > 0) {
            post();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'admin') {
        admin();
    }
    //admin
    elseif ($_GET['action'] == 'addPost') {
            addPost();
        }
    elseif ($_GET['action'] == 'editPost') {
        echo $_SESSION['admin'];
        editPost();
    }
    elseif ($_GET['action'] == 'editPostForm') {
        if (isset($_GET['id']) && $_GET['id'] > 0){
            editPostForm();
        }
        else{
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'deleteComment') {
        deleteComment();
    }
    elseif ($_GET['action'] == 'signaledComments') {
        signaledComments();
    }
}
else {
    listPosts();
}

?>
