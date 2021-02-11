<?php
require_once 'ProductMapper.php';
require_once 'Product.php';
include_once 'UserMapper.php';
session_start();

if(isset($_POST['add-product-btn'])){
    $mapper = new UserMapper();
    $currentAdmin = $mapper->getUserByEmail($_SESSION['email']);

    $emri = $_POST['name'];
    $prodhuesi = $_POST['prodhuesi'];
    $cmimi = $_POST['price'];
    $pershkrimi = $_POST['desc'];
    $sasia = $_POST['qty'];
    $kategoria = $_POST['cat'];
    $image = $_FILES['image'];
    $admin = $currentAdmin['id'];

    $fileTmpName = $_FILES['image']['tmp_name'];
    $imageName = $_FILES['image']['name'];
    $fileDestination = '../images/produktet/'.$imageName;
    move_uploaded_file($fileTmpName, $fileDestination);
    $mapper = new ProductMapper();
    $product = new Product($emri, $cmimi, $pershkrimi, $sasia, $kategoria, $fileDestination, $admin, $prodhuesi);
    if($mapper->insertProduct($product)){
        header("Location: ../views/add-product.php?action=success");
    }
    else{
        header("Location: ../views/add-product.php?action=error");
    }
} else if(isset($_POST['add-category-btn'])) {
    $pmapper = new ProductMapper();
    $kategoria = $_POST['kategoria'];

    $allCategories = $pmapper->getAllCategories();
    foreach($allCategories as $category)
        if($kategoria == $category['emri'])
            header("Location: ../views/add-category.php?action=error");
    
    $pmapper->insertCategory($kategoria);
    header("Location: ../views/add-category.php?action=success");
} else if(isset($_POST['add-slider-img'])){
    $image = $_FILES['slider-image'];
    $fileTmpName = $_FILES['slider-image']['tmp_name'];
    $imageName = $_FILES['slider-image']['name'];
    $fileDestination = '../images/slider/'.$imageName;

    move_uploaded_file($fileTmpName, $fileDestination);
    $mapper = new ProductMapper();
    $mapper->insertIntoSlider($fileDestination);
    header("Location: ../views/add-slider-images.php?action=success");
}else {
    header("Location: ../views/index.php");
}