<?php
include_once 'UserMapper.php';

$mapper = new UserMapper();

if(isset($_GET['action']) && ($_GET['action'] == 'delete')) {
    if(isset($_GET['user_id']) && (is_numeric($_GET['user_id'])))  {
        $mapper->deleteUser($_GET['user_id']);
        header("Location: ../views/dashboard.php");
    } 
  
}