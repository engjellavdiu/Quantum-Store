<?php
include_once 'ProductMapper.php';
include_once 'UserMapper.php';
include_once 'MessageMapper.php';
session_start();

//  Nqs useri eshte loggedin dhe eshte admin, atehere procedo
if(!empty($_SESSION['is_logged_in']) && isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == 1 && $_SESSION['role'] == 1){

    //krijo nje instance te ProductMapper
    $pmapper = new ProductMapper();
    $mapper = new UserMapper();
    $msgmapper = new MessageMapper();
    $user = $mapper ->getUserByEmail($_SESSION['email']);

    if(isset($_GET['action']) && ($_GET['action'] == 'delete-product')) {

        //Nese veprimi i kerkuar eshte te fshihet produkt atehere:

        if(isset($_GET['prod-id']) && (is_numeric($_GET['prod-id']))) {

            // Merr id e produktit dhe thirr metoden e ProductMapper per te fshire produktin
            // me id te dhene dhe kthe perdoruesin tek faqja e produkteve
            $product = $pmapper->getProductsById($_GET['prod-id']);
            $filepath = $product['image'];
            if(file_exists($filepath))
                unlink($filepath); //fshi foton edhe nga serveri
            $pmapper->deleteProduct($_GET['prod-id']);
            header("Location: ../views/dashboard.php?action=view-products");
        }
    } 
    // Nese veprimi i kerkuar eshte te editoje produktin, atehere: 
    else if(isset($_GET['action']) && ($_GET['action'] == 'edit-product')){

        if(isset($_GET['prod-id']) && (is_numeric($_GET['prod-id']))){

            // Merr id te produktit te dergoje perdoruesin tek faqja per editim
            $prodId = $_GET['prod-id'];
            header("Location: ../views/edit-product.php?action=edit&prod-id=$prodId");
        }
    }

    else if(isset($_GET['action']) && ($_GET['action'] == 'promote-product')){

        if(isset($_GET['prod-id']) && (is_numeric($_GET['prod-id']))){
            $pmapper->promoteProduct($_GET['prod-id']);
            header("Location: ../views/dashboard.php?action=view-products");
        }
    }

    else if(isset($_GET['action']) && ($_GET['action'] == 'demote-product')){

        if(isset($_GET['prod-id']) && (is_numeric($_GET['prod-id']))){
            $pmapper->demoteProduct($_GET['prod-id']);
            header("Location: ../views/dashboard.php?action=view-products");
        }
    }

    // Nese kerkesa eshte te fshije userin, atehere procedo brenda kushtit
    else if(isset($_GET['action']) && ($_GET['action'] == 'delete-user')) {

        if(isset($_GET['user-id']) && (is_numeric($_GET['user-id']))) {
            //nese useri qe po fshijme eshte vet admini qe po fshin accountin e tij atehere fshije dhe logout
            if($user['id'] == $_GET['user-id']){
                $mapper->deleteUser($_GET['user-id']);
                header("Location: ../views/logout.php");
            }else {
                $mapper->deleteUser($_GET['user-id']);
                header("Location: ../views/dashboard.php?action=view-users");
            }
            
        }
    } 
    
    // Nese kerkesa eshte te qe promovoje userin si admin, atehere procedo brenda kushtit
    else if(isset($_GET['action']) && ($_GET['action'] == 'make-admin')){
        if(isset($_GET['user-id']) && (is_numeric($_GET['user-id']))){
            $mapper->makeAdmin($_GET['user-id']);
            header("Location: ../views/dashboard.php?action=view-users");
        }
    } 
    // Nese kerkesa eshte te qe largoje userin si admin, atehere procedo brenda kushtit
    else if(isset($_GET['action']) && ($_GET['action'] == 'remove-admin')){
        if(isset($_GET['user-id']) && (is_numeric($_GET['user-id']))){
            $mapper->removeAdmin($_GET['user-id']);
            header("Location: ../views/dashboard.php?action=view-users");
        }
    } 
    // Nese kerkesa eshte te qe largoje userin si admin, atehere procedo brenda kushtit
    else if(isset($_GET['action']) && ($_GET['action'] == 'edit-user')){
        $user_id = $_GET['user-id'];
        header("Location: ../views/edit-user.php?action=edit-user&user-id=$user_id");
    } 
    
    
    else if(isset($_GET['action']) && ($_GET['action'] == 'delete-msg')) {
    
        if(isset($_GET['msg-id']) && (is_numeric($_GET['msg-id']))) {
            $msgmapper->deleteMessage($_GET['msg-id']);
            header("Location: ../views/dashboard.php");
        }
    } else if(isset($_GET['action']) && $_GET['action'] == 'set-read'){
        if(isset($_GET['msg-id']) && (is_numeric($_GET['msg-id']))) {
            $msgmapper->setAsRead($_GET['msg-id']);
            header("Location: ../views/dashboard.php");
        }
    } else if(isset($_GET['action']) && $_GET['action'] == 'set-unread'){
        if(isset($_GET['msg-id']) && (is_numeric($_GET['msg-id']))) {
            $msgmapper->setAsUnread($_GET['msg-id']);
            header("Location: ../views/dashboard.php");
        }
    }

    else if(isset($_GET['action']) && $_GET['action'] == 'delete-slider-img'){
        if(isset($_GET['img-id']) && (is_numeric($_GET['img-id']))) {
            $img = $pmapper->getSliderImage($_GET['img-id']);
            $filepath = $img['image'];
            if(file_exists($filepath))
                unlink($filepath);
            $pmapper->deleteFromSlider($_GET['img-id']);
            header("Location: ../views/dashboard.php?action=add-slider-images");
        }
    }

    else if(isset($_GET['action']) && $_GET['action'] == 'delete-brand-img'){
        if(isset($_GET['img-id']) && (is_numeric($_GET['img-id']))) {
            $img = $pmapper->getBrandImage($_GET['img-id']);
            $filepath = $img['image'];
            if(file_exists($filepath))
                unlink($filepath);
            $pmapper->deleteFromBrands($_GET['img-id']);
            header("Location: ../views/dashboard.php?action=add-brand-images");
        }
    }
} 
// perndryshe nese nuk eshte logged in dhe admin, atehere dergo ne index
else {
    header("Location: ../views/index.php");
}