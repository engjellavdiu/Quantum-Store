<?php
include '../components/header.php';
include_once '../businessLogic/CartMapper.php';
include_once '../businessLogic/UserMapper.php';

if(!empty($_SESSION['is_logged_in']) && isset($_SESSION['is_logged_in']) 
        && $_SESSION['is_logged_in'] == 1 && $_SESSION['role'] == 0){
            
            $cmapper = new CartMapper();
            $umapper = new UserMapper();
            $cartlist = $cmapper->getCart();
            $loggeduser = $umapper->getLoginID();
            
?>
<main id="main">
<!-- <h1>Miresevini  ne shporte</h1> -->
<div class="db-container">
<table class="db-table">
            <thead>
                <tr>
                    <th>CartID</th>
                    <th>UserID</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($cartlist as $cart){ ?>
                    <tr>
                        <td>
                            <?php echo $cart['id']; ?>
                        </td>
                        <td>
                            <?php echo $cart['product_id']; ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <h3><?php echo $loggeduser['id']?></h3>
    </table> 
</div>   
  
</main>
<?php } else {

    header("Location: ../views/llogaria.php");
}
?>
<?php
include '../components/footer.php';
?>