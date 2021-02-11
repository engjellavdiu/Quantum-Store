<?php 
    include_once '../businessLogic/ProductMapper.php';
    include '../components/header.php';

    if(!empty($_SESSION['is_logged_in']) && isset($_SESSION['is_logged_in']) 
        && $_SESSION['is_logged_in'] == 1 && $_SESSION['role'] == 1){
        
        $mapper = new ProductMapper();
        $categories = $mapper->getAllCategories();

        if(isset($_GET['action']) && $_GET['action'] == "error"){
            echo '<script>alert("Kategoria nuk u shtuar sepse ekziston")</script>';
        }
        else if (isset($_GET['action']) && $_GET['action'] == "success"){
            echo '<script>alert("Kategoria u shtua me sukses")</script>';
        }
?>  
    <main id="main">
    <div class="edit-product-main">
        <form method="POST" action="../businessLogic/upload-product.php" enctype="multipart/form-data" class="edit-product-card">
            <h2>Shto kategori</h2>
            <hr class="divider">
            <label for="name">Emri i kategorisë</label>
            <input type="text" name="kategoria" value="" required>
            <input class="button" type="submit" name="add-category-btn" value="Shto kategorinë">
            <a href="dashboard.php">Anulo</a>
        </form>
    </div>        
    </main>
<?php } else {
    header("Location: ../views/index.php");
}
?>

<?php include '../components/footer.php'?>