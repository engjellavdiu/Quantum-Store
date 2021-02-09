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
<div class="details-container-row">
    <div class="details-container-col-left">
        
        <ul>
            <li><h3><?php echo $products['emri']?></h3></li>
            <li>/</li>
            <li><h3><?php echo $products['kategoria']?></h3></li>
        </ul>
        <img src=<?php echo $products['image'] ?> alt="">
        </div>        
             
    <div class="details-container-col-right">
        <div class="section-title">                 
        <ul>
            <li><h2>Id: <?php echo $products['id'] ?></h2></li> 
            <li><h2>Pershkrimi: </h2><hr class="divider"><h4><?php echo $products['pershkrimi'] ?></h4></li>
            
            <li><h3>Sasia: <?php echo $products['sasia']?></h3></li>
            <li><h3>Cmimi: $<?php echo $products['cmimi'] ?></h3></li>
        </ul>
        </div> 
    </div>
    
    
</div>

</main>
<?php 
include '../components/footer.php'
?>
