<?php 
    include '../components/header.php';
    include_once '../businessLogic/UserMapper.php';
    include_once '../businessLogic/ProductMapper.php';
    include_once '../businessLogic/MessageMapper.php';
    include_once '../businessLogic/Admin.php';

    if(!isset($_SESSION['is_logged_in']) || $_SESSION['role'] == 0){
        header("Location: index.php");
    }
    else if (isset($_SESSION['is_logged_in']) && $_SESSION['role'] == 1){
        $mapper =  new UserMapper();
        $userList = $mapper->getAllUsers();
        $user = $mapper->getUserByEmail($_SESSION['email']);

        $pmapper = new ProductMapper();
        $productList = $pmapper->getAllProducts();

        $msgmapper = new MessageMapper();
        $msgList = $msgmapper->getAllMessages();
    ?>

    <main id='main'>
    <div class="dashboard-container">
        <div class="dashboard-panel wrapper">
            <div class="greet">
                <h3>Mirësevini në panelin e administratorit, <?= $user['first_name']?></h3>
            </div>
            <div class="square">
                <img src="../images/icons/plus-sign.svg" alt="">
                <a href="add-product.php">Shto produkt</a>
            </div>
            <div class="square">
                <img src="../images/icons/box.svg" alt="">
                <a href="view-products.php">Shiko të gjitha produktet</a>
            </div>
            <div class="square">
            <img src="../images/icons/users.svg" alt="">
                <a href="view-users.php">Shiko të gjithe perdoruesit</a>
            </div>
            <div class="square">
                <img src="../images/icons/envelope.svg" alt="">
                <a href="contact-form-messages.php?action=unread-messages">Mesazhet e pa lexuara</a>
            </div>  
            <div class="square">
                <img src="../images/icons/envelope-open.svg" alt="">
                <a href="contact-form-messages.php?action=all-messages">Shiko te gjitha mesazhet</a>
            </div>
            <div class="square">
                <img src="../images/icons/list.svg" alt="">
                <a href="add-category.php">Shto kategori</a>
            </div>
            <div class="square">
                <img src="../images/icons/photo.svg" alt="">
                <a href="add-slider-images.php">Slider</a>
            </div>
        </div>
    </div>
    
    </main>


    <?php }
    else {
        echo "Error 404";
    }

    include '../components/footer.php';
?>