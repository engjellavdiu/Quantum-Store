<?php 
    include_once '../businessLogic/ProductMapper.php';
    include_once '../businessLogic/Product.php';
    include '../components/header.php';

    if(!empty($_SESSION['is_logged_in']) && isset($_SESSION['is_logged_in']) 
        && $_SESSION['is_logged_in'] == 1 && $_SESSION['role'] == 1){
        
            $pmapper = new ProductMapper();
            $productList = $pmapper->getAllProducts();

?>  
    <main id="main">
    <div class="db-container">
        <table class="db-table">
            <thead>
                <tr>
                    <th colspan="5"><a href="add-product.php">Shto produkt</a></th>
                </tr>
                <tr>    
                    <th>Emri</th>
                    <th>Cmimi</th>
                    <th>Sasia</th>
                    <th colspan="2">Modifiko</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($productList as $product){ ?>
                    <tr>
                        <td>
                            <?php echo $product['emri']; ?>
                        </td>
                        <td>
                            <?php echo $product['cmimi']; ?>
                        </td>
                        <td>
                            <?php echo $product['sasia']; ?>
                        </td>
                        <td><a href="<?php echo "../businessLogic/modify-products.php?action=delete_product&prod_id=".$product['id']; ?>" onclick="return confirm('A jeni të sigurt që dëshironi të fshini produktin?');">Fshij</a></td>
                        <td><a href="<?php echo "../businessLogic/modify-products.php?action=edit_product&prod_id=".$product['id']; ?>">Edito</a></td>
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