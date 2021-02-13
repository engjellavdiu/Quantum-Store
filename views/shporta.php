<?php
include_once '../businessLogic/CartMapper.php';
include_once '../businessLogic/UserMapper.php';
include_once '../businessLogic/ProductMapper.php';
include '../components/header.php';

if(!empty($_SESSION['is_logged_in']) && isset($_SESSION['is_logged_in']) 
        && $_SESSION['is_logged_in'] == 1 && $_SESSION['role'] == 0){

            /*$cmapper = new CartMapper();
            $umapper = new UserMapper();
            $cartlist = $cmapper->getCart();
            $loggeduser = $umapper->getLoginID();
            
            $cartProducts = $cmapper->getCartProducts($loggeduser['id']);

            $pmapper = new ProductMapper();

            global $produktetNeShporte;
            $produktetNeShporte = array();

            for($i = 0; $i < count($cartProducts); $i = $i + 1){
                $prod = $pmapper->getProductsById($cartProducts[$i]['product_id']);
                $produktetNeShporte[$i] = [$prod];
            }          */
?>
    <!--<main id="main">
        <div class="db-container">
            <table class="db-table">
                <thead>
                    <tr>
                        <th>Emri</th>
                        <th>Cmimi</th>
                    </tr>
                </thead>
                    <tbody>
                    <?php foreach($produktetNeShporte as $produkt){ ?>
                            <tr>
                                <td>
                                    <?php for($i = 0; $i < count($produkt); $i = $i + 1) echo $produkt[$i]['emri'];?>
                                </td>
                                <td>
                                    <?php for($i = 0; $i < count($produkt); $i = $i + 1) echo $produkt[$i]['cmimi'];?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
            </table> 
        </div>   
    </main>-->
<?php } else { ?>
    
    <main id="main">
        <div class="cart-container">
            <div class="cart-message">
                <p>Ju nuk jeni të kyqur. Për të shtuar produkte në shportë kyquni ose krijoni llogari</p>
                <a class="button" href="llogaria.php">Kyqu</a>
            </div>
        </div>
    </main>

<?php } ?>

<?php include '../components/footer.php'; ?>