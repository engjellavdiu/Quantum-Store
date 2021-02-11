<?php 
    include_once '../businessLogic/ProductMapper.php';
    include '../components/header.php';

    if(!empty($_SESSION['is_logged_in']) && isset($_SESSION['is_logged_in']) 
        && $_SESSION['is_logged_in'] == 1 && $_SESSION['role'] == 1){
        
        $mapper = new ProductMapper();

        $sliderImg = $mapper->getSliderImages();
        
        if(isset($_GET['action']) && $_GET['action'] == "error"){
            echo '<script>alert("Foto nuk u shtua, ka ndodhur gabim")</script>';
        }
        else if (isset($_GET['action']) && $_GET['action'] == "success"){
            echo '<script>alert("Foto u shtua me sukses në slider")</script>';
        }
?>  
    <main id="main">
    <div class="edit-product-main">
        <form method="POST" action="../businessLogic/upload-product.php" enctype="multipart/form-data" class="edit-product-card">
            <h2>Shto fotografi në slider</h2>
            <hr class="divider">
            <input type="file" name="slider-image" required>
            <input class="button" type="submit" name="add-slider-img" value="Shto foton">
            <a href="dashboard.php">Anulo</a>
        </form>
    </div>
    <div class="db-container">
        <table class="db-table">
            <thead>
                <tr>    
                    <th>Foto</th>
                    <th>Emri fotos</th>
                    <th>Opsionet</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($sliderImg as $img){ ?>
                    <tr>
                        <td>
                            <img  style="max-height: 100px;" src="<?php echo $img['image']; ?>" alt="">
                        </td>
                        <td>
                            <?php echo $img['image']; ?>
                        </td>
                        <td><a href="<?php echo "../businessLogic/modify-products.php?action=delete_product&prod_id=".$product['id']; ?>" onclick="return confirm('A jeni të sigurt që dëshironi të fshini produktin?');">Fshij</a></td>
                    </tr>
                <?php } ?>
            </tbody>                
        </table>
    </div>
    </main>
<?php } else {
    header("Location: ../views/index.php");
}
?>

<?php include '../components/footer.php'?>