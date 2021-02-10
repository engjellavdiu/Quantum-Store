<?php
require_once 'ProductMapper.php';
require_once 'Product.php';
include_once 'UserMapper.php';
session_start();

if(isset($_POST['add-product-btn'])){
    $mapper = new UserMapper();
    $currentAdmin = $mapper->getUserByEmail($_SESSION['email']);

    $emri = $_POST['name'];
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
    $product = new Product($emri, $cmimi, $pershkrimi, $sasia, $kategoria, $fileDestination, $admin);
    $mapper->insertProduct($product);
    header("Location: ../views/dashboard.php");
} else {
    header("Location: ../views/index.php");
}