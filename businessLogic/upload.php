<?php
require_once 'ProductMapper.php';
require_once 'Product.php';
require_once 'UserMapper.php';
require_once 'MessageMapper.php';
require_once 'CartMapper.php';
session_start();

// Nese eshte shtypur butoni per te shtuar produkt, atehere procedo brenda kushtit
if(isset($_POST['add-product-btn'])){

    $mapper = new UserMapper();

    // merr nga databaza adminin aktual qe eshte i kyqur ne session
    $currentAdmin = $mapper->getUserByEmail($_SESSION['email']);

    $emri = $_POST['name'];
    $prodhuesi = $_POST['prodhuesi'];
    $cmimi = $_POST['price'];
    $pershkrimi = $_POST['desc'];
    $sasia = $_POST['qty'];
    $kategoria = $_POST['cat'];
    $image = $_FILES['image'];
    $admin = $currentAdmin['id'];

    // Variabla per filen/foton e uploaduar 
    $fileTmpName = $_FILES['image']['tmp_name']; //emri i perkohshem i file
    $imageName = $_FILES['image']['name']; //emri aktual i file
    $fileDestination = '../images/produktet/'.$imageName; // destinacioni ku ruhet file

    move_uploaded_file($fileTmpName, $fileDestination); // metode per te zhvendosur filein ne server

    $mapper = new ProductMapper();
    $product = new Product($emri, $cmimi, $pershkrimi, $sasia, $kategoria, $fileDestination, $admin, $prodhuesi);

    if($mapper->insertProduct($product)){
        header("Location: ../views/dashboard.php?action=add-product&upload=success");
    }
    else{
        header("Location: ../views/dashboard.php?action=add-product&upload=error");
    }
} 
// Nese eshte shtypur butoni per te shtuar kategori, atehere procedo brenda kushtit
else if(isset($_POST['add-category-btn'])) {
    $pmapper = new ProductMapper();
    $kategoria = $_POST['kategoria'];

    $allCategories = $pmapper->getAllCategories();
    foreach($allCategories as $category)
        if($kategoria == $category['emri'])
            header("Location: ../views/dashboard.php?action=add-category&upload=error");
    
    $pmapper->insertCategory($kategoria);
    header("Location: ../views/dashboard.php?action=add-category&upload=success");
}
// Nese eshte shtypur butoni per te shtuar foto ne slider, atehere procedo brenda kushtit
else if(isset($_POST['add-slider-img'])){
    $image = $_FILES['slider-image'];
    $fileTmpName = $_FILES['slider-image']['tmp_name'];
    $imageName = $_FILES['slider-image']['name'];
    $fileDestination = '../images/slider/'.$imageName;

    move_uploaded_file($fileTmpName, $fileDestination);
    $mapper = new ProductMapper();
    $mapper->insertIntoSlider($fileDestination);
    header("Location: ../views/dashboard.php?action=add-slider-images&upload=success");
}
else if(isset($_POST['add-brand-img'])){
    $image = $_FILES['brand-image'];
    $fileTmpName = $_FILES['brand-image']['tmp_name'];
    $imageName = $_FILES['brand-image']['name'];
    $fileDestination = '../images/brendet/'.$imageName;

    move_uploaded_file($fileTmpName, $fileDestination);
    $mapper = new ProductMapper();
    $mapper->insertIntoBrands($fileDestination);
    header("Location: ../views/dashboard.php?action=add-brand-images&upload=success");
}
// Nese eshte shtypur butoni per te derguar mesazh, atehere procedo
else if(isset($_POST['send-msg'])){
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    $mapper = new MessageMapper();
    $mapper->insertMessage($name, $lastname, $email, $msg);
    header("Location: ../views/kontakt.php?messagesend=success");
}
else if(isset($_GET['action']) && $_GET['action'] == 'add-to-cart'){
    if(isset($_GET['product-id'])){
        $usermapper = new UserMapper();
        $cartmapper = new CartMapper();
        $user = $usermapper->getUserByEmail($_SESSION['email']);
        $cartmapper->insertToCart($user['id'], $_GET['product-id']);
        header("Location: ../views/shporta.php");
    }
} else if(isset($_POST['change-reth-nesh'])){
    $newText = $_POST['text'];
    $msgmapper = new MessageMapper();
    $msgmapper->updateText($_POST['id'], $newText);
    header("Location: ../views/rrethnesh.php");
}
//perndryshe dergo ne index.php
else {
    header("Location: ../views/index.php");
}