<?php 
include '../components/header.php';
include_once '../businessLogic/ProductMapper.php';
include_once '../businessLogic/Product.php';

$mapper = new ProductMapper();

?>
<?php
if(isset($_GET['pid']))
{
    $pid=$_GET['pid'];
    //echo $pid;
    $products = $mapper->getProductsById($pid);
}
?>
<main id="main">
<h3>Id= <?php echo $products['id'] ?></h3>
<h3>Emri= <?php echo $products['emri'] ?></h3>
<h3>Cmimi= <?php echo $products['cmimi'] ?>$</h3>
<h5>Pershkrimi= <?php echo $products['pershkrimi'] ?></h5>
<h3>Sasia= <?php echo $products['sasia']?></h3>
<h3>Kategoria= <?php echo $products['kategoria'] ?></h3>
<img src=<?php echo $products['image'] ?> alt="">
</main>
<?php 
include '../components/footer.php'
?>
