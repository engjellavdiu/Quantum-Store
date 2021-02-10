<?php 
include_once '../businessLogic/ProductMapper.php';
include_once '../businessLogic/Product.php';
include_once '../businessLogic/UserMapper.php';
include '../components/header.php';

if(isset($_GET['pid'])){
    $pmapper = new ProductMapper();
    $mapper = new UserMapper();
    $pid=$_GET['pid'];
    $product = $pmapper->getProductsById($pid);
    $admin = $mapper->getUserById($product['admin_id']);
}
?>

<main id="main">
<!--<div class="details-container-row">
    <div class="details-container-col-left">
        
        <ul>
            <li><h3><?php //echo $products['emri']?></h3></li>
            <li>/</li>
            <li><h3><?php //echo $products['kategoria']?></h3></li>
        </ul>
        <img src=<?php //echo $products['image'] ?> alt="">
        </div>        
             
    <div class="details-container-col-right">
        <div class="section-title">                 
        <ul>
            <li>Ky produkt eshte shtuar nga: <?= $admin['first_name'].' '.$admin['last_name']?></li>
            <li><h2>Id: <?php echo $product['id'] ?></h2></li> 
            <li><h2>Pershkrimi: </h2><hr class="divider"><h4><?php echo $product['pershkrimi'] ?></h4></li>
            
            <li><h3>Sasia: <?php echo $product['sasia']?></h3></li>
            <li><h3>Cmimi: $<?php echo $product['cmimi'] ?></h3></li>
        </ul>
        </div> 
    </div>
    
    
</div>-->
    <div class="wrapper">
    <div class="view-product">
        <div class="view-product-image">
            <img src="<?= $product['image']?>" alt="">
        </div>
        <div class="product-info">
            <div>
                <p>Apple</p>
                <h2><?= $product['emri']?></h2>
            </div>
            <div>
                <p><b>Kategoria </b><?= $product['kategoria']?></p>
                <p><b>Sasia </b><?= $product['sasia']?> artikuj</p>
                <p><b>Përshkrimi </b><?= $product['pershkrimi']?></p>
            </div>
            <div>
                <p><b>Cmimi </b><?= $product['cmimi']?>&euro;</p>
                <a href="#">Shto në shportë</a>
            </div>
            <div>
                <p>*Ky produkt është postuar nga <?= $admin['first_name'].' '.$admin['last_name']?></p>
            </div>
        </div>
        
    </div>
    </div>
</main>
<?php 
include '../components/footer.php'
?>
