<?php include '../components/header.php';
include_once '../businessLogic/ProductMapper.php';
include_once '../businessLogic/Product.php';

$mapper = new ProductMapper();
$products = $mapper->getAllProducts();
?>  
        <!-- Main -->
        <main id="main">
            <div class="section-title">
                <h3>Produkte</h3>
                <hr class="divider">
            </div>
            <div id="produktet-each">
                <ul>
                    <?php foreach($products as $product){ ?>
                    <?php $pid= $product['id']; ?>
                    <li>
                        <a href="<?php echo "view-product.php?pid=$pid" ?>"><div class="card">
                            <div class="imageC">
                                <img src="<?php echo $product['image']; ?>">
                            </div>
                        </a>    
                            <div class="content">
                                <h3><?php echo $product['emri']; ?></h3>
                                <h2 class="price"><?php echo $product['cmimi']; ?> €</h2>
                                <a href="#" class="addToCart">Shto në Shportë</a>
                            </div> 
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </main>
<?php include '../components/footer.php'?>

