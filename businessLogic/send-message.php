<?php 
require_once 'MessageMapper.php';
session_start();

if(isset($_POST['send-msg'])){
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    $mapper = new MessageMapper();
    $mapper->insertMessage($name, $lastname, $email, $msg);
    
} 
if(!empty($_SESSION['is_logged_in']) && isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == 1 && $_SESSION['role'] == 1){

    $mapper = new MessageMapper();

    if(isset($_GET['action']) && ($_GET['action'] == 'delete')) {

        if(isset($_GET['msg_id']) && (is_numeric($_GET['msg_id']))) {
            $mapper->deleteMessage($_GET['msg_id']);
            header("Location: ../views/dashboard.php");
        }
    } else if(isset($_GET['action']) && $_GET['action'] == 'set_read'){
        if(isset($_GET['msg_id']) && (is_numeric($_GET['msg_id']))) {
            $mapper->setAsRead($_GET['msg_id']);
            header("Location: ../views/dashboard.php");
        }
    } else if(isset($_GET['action']) && $_GET['action'] == 'set_unread'){
        if(isset($_GET['msg_id']) && (is_numeric($_GET['msg_id']))) {
            $mapper->setAsUnread($_GET['msg_id']);
            header("Location: ../views/dashboard.php");
        }
    }
} else {
    header("Location: ../views/index.php");
}
?>