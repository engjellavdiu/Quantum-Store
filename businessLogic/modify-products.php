<?php
include_once 'ProductMapper.php';
session_start();

if(!empty($_SESSION['is_logged_in']) && isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == 1 && $_SESSION['role'] == 1){

    $pmapper = new ProductMapper();

    if(isset($_GET['action']) && ($_GET['action'] == 'delete_product')) {

        if(isset($_GET['prod_id']) && (is_numeric($_GET['prod_id']))) {
            $pmapper->deleteProduct($_GET['prod_id']);
            header("Location: ../views/dashboard.php");
        }
    } else if(isset($_GET['action']) && ($_GET['action'] == 'edit_product')){
        if(isset($_GET['prod_id']) && (is_numeric($_GET['prod_id']))){
            $prodId = $_GET['prod_id'];
            header("Location: ../views/edit-product.php?action=edit&prod_id=$prodId");
        }
    }

}else {
    header("Location: ../views/index.php");
}