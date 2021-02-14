<?php 
include '../businessLogic/ProductMapper.php';
include '../components/header.php';

    $mapper = new ProductMapper();
    $recentProducts = $mapper->getRecentProducts();
    $promotedProducts = $mapper->getPromotedProducts();
    $brands = $mapper->getBrandImages();
?>

<main id="main">
    <!--Slideshow-->
    <?php include '../components/slider.php' ?>
    
    <!-- Trending products static component -->
    <?php // include '../components/trendingprod.php' ?>

    <button onclick="topFunction()" id="back-to-top" title="Go to top"><img style="width: 50px;" src="../images/icons/arrow-circle-up-solid.svg" alt=""></button>
        
        <?php if(count($promotedProducts) > 0) { ?>
            <div class="section-title">
                <h3>Produkte të promovuara</h3>
                <hr class="divider">
            </div>
            <div class="products-container">
                <div class="products-panel wrapper">
                    <?php foreach($promotedProducts as $product){
                        $pid = $product['id']; ?>
                        <div class="square">
                        <div>
                            <a href="<?php echo "view-product.php?pid=$pid" ?>"><img src=<?php echo $product['image']; ?> alt=""></a>
                        </div>
                        <div>
                            <h3><?php echo $product['emri']; ?></h3>
                            <h2><?php echo $product['cmimi']; ?>&euro;</h2>
                            <a class="button" href="<?php echo "view-product.php?pid=$pid" ?>">Shiko Produktin</a>
                        </div>
                    </div>
                        <?php } ?>
                </div>
            </div>
        <?php }?>
        
        <?php if(count($brands) > 0) { ?>
            <div class="section-title">
                <h3>Brendet</h3>
                <hr class="divider">
            </div>
            <div class="brendet">
                <?php foreach($brands as $brand) {  ?>
                    <img src="<?php echo $brand['image']?>" alt="">
                <?php } ?>
            </div>
        <?php } ?>
            
            <!--Produktet-->
            <div class="section-title">
                <h3>Produktet e fundit</h3>
                <hr class="divider">
            </div>
            <div class="products-container">
                <div class="products-panel wrapper">
                    <?php foreach($recentProducts as $product){
                        $pid = $product['id']; ?>
                        <div class="square">
                        <div>
                            <a href="<?php echo "view-product.php?pid=$pid" ?>"><img src=<?php echo $product['image']; ?> alt=""></a>
                        </div>
                        <div>
                            <h3><?php echo $product['emri']; ?></h3>
                            <h2><?php echo $product['cmimi']; ?>&euro;</h2>
                            <a class="button" href="<?php echo "view-product.php?pid=$pid" ?>">Shiko Produktin</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div id="shiko-te-gjitha">
                <a href="produktet.php">Shiko te gjitha produktet</a>
            </div>
        </main>

<?php include '../components/footer.php'?>