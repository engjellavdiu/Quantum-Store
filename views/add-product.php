<?php 
    include_once '../businessLogic/ProductMapper.php';
    include_once '../businessLogic/Product.php';
    include '../components/header.php';

    if(!empty($_SESSION['is_logged_in']) && isset($_SESSION['is_logged_in']) 
        && $_SESSION['is_logged_in'] == 1 && $_SESSION['role'] == 1){
        
        $mapper = new ProductMapper();
        $categories = $mapper->getAllCategories();

?>  
    <main id="main">
    <div class="edit-product-main">
        <form method="POST" action="../businessLogic/upload-product.php" enctype="multipart/form-data" class="edit-product-card">
            <h2>Shto produkt</h2>
            <hr class="divider">
            <label for="name">Emri i produktit</label>
            <input type="text" name="name" value="">
            <label for="price">Cmimi</label>
            <input type="number" step="any" name="price" value="">
            <label for="desc">Përshkrimi</label>
            <textarea name="desc" value=""></textarea>
            <label for="qty">Sasia në stok</label>
            <input type="number" name="qty" value="<?= $product['sasia'] ?>">
            <label for="cat">Zgjedh një kategori</label>
            <select name="cat">
                <?php foreach($categories as $category): ?>
                    <option value="<?= $category['emri']?>"><?= $category['emri']?></option>
                <?php endforeach; ?>
            </select>
            <label for="image">Ngarko foto të produktit</label>
            <input type="file" name="image">
            <input class="button" type="submit" name="add-product-btn" value="Shto produktin">
            <a href="dashboard.php">Anulo</a>
        </form>
    </div>        
    </main>
<?php } else {
    header("Location: ../views/index.php");
}
?>

<?php include '../components/footer.php'?>