<?php
include_once 'UserMapper.php';
session_start();

if(!empty($_SESSION['is_logged_in']) && isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == 1 && $_SESSION['role'] == 1){

    $mapper = new UserMapper();
    $user = $mapper ->getUserByEmail($_SESSION['email']);

    if(isset($_GET['action']) && ($_GET['action'] == 'delete')) {

        if(isset($_GET['user_id']) && (is_numeric($_GET['user_id']))) {
            //nese useri qe po fshijme eshte vet admini qe po fshin account e tij atehere fshije dhe logout
            if($user['id'] == $_GET['user_id']){
                $mapper->deleteUser($_GET['user_id']);
                header("Location: ../views/logout.php");
            }else {
                $mapper->deleteUser($_GET['user_id']);
                header("Location: ../views/view-users.php");
            }
            
        }
    } else if(isset($_GET['action']) && ($_GET['action'] == 'makeadmin')){
        if(isset($_GET['user_id']) && (is_numeric($_GET['user_id']))){
            $mapper->makeAdmin($_GET['user_id']);
            header("Location: ../views/view-users.php");
        }
    } else if(isset($_GET['action']) && ($_GET['action'] == 'removeadmin')){
        if(isset($_GET['user_id']) && (is_numeric($_GET['user_id']))){
            $mapper->removeAdmin($_GET['user_id']);
            header("Location: ../views/view-users.php");
        }
    } else if(isset($_GET['action']) && ($_GET['action'] == 'edit')){
        $user_id = $_GET['user_id'];
        header("Location: ../views/edit-user.php?action=edit_user&user_id=$user_id");
    }
}else {
    header("Location: ../views/index.php");
}
