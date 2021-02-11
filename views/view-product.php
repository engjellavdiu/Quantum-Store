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

    $productsOfSameCategory = $pmapper->getProductsByCategory($product['kategoria'], $product['id']);
}
?>

<main id="main">
    <div class="wrapper">
        <div class="view-product">
            <div class="view-product-image">
                <img src="<?= $product['image']?>" alt="">
            </div>
            <div class="product-info">
                <div>
                    <p><?= $product['prodhuesi']?></p>
                    <h1><?= $product['emri']?></h1>
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

        <?php if(count($productsOfSameCategory) > 1) {?>
            <div class="products-container">
            <div class="section-title">
                    <h3>Produkte të ngjashme</h3>
                    <hr class="divider">
                </div>
                    <div class="products-panel">
                        <?php foreach($productsOfSameCategory as $catProduct){
                            $pid = $catProduct['id']; ?>
                            <div class="square">
                            <div>
                                <a href="<?php echo "view-product.php?pid=$pid" ?>"><img src=<?php echo $catProduct['image']; ?> alt=""></a>
                            </div>
                            <div>
                                <h3><?php echo $catProduct['emri']; ?></h3>
                                <h2><?php echo $catProduct['cmimi']; ?>&euro;</h2>
                                <a href="" class="button">Shto ne shporte</a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
        <?php } ?>
    </div>

</main>
<?php 
include '../components/footer.php'
?>
