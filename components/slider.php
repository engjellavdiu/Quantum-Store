<?php 
    require_once '../businessLogic/ProductMapper.php';

    $mapper = new ProductMapper();
    $images = $mapper->getSliderImages();
?>

    <div class="slideshow">
        <?php for($i=0; $i < count($images); $i = $i + 1) {?>
            <div class="slide">
                <img src="<?php echo $images[$i]['image']?>">
            </div>
        <?php }?>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
            <br>
    <div class="dots">
        <?php for($i = 0; $i < count($images); $i = $i + 1){ ?>
            <span class="dot" onclick="currentSlide(<?php echo $i+1 ?>)"></span>
        <?php } ?>
    </div>