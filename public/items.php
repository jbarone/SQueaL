<?php
while($row = $products->fetch_assoc()) {
?>
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <img src="images/<?=$row['image']?>" alt="" />
                <h2>$<?=number_format($row['price'], 2)?></h2>
                <p><?=$row['name']?></p>
                <a href="#" class="btn btn-default add-to-cart <?php if($row['quantity'] == 0) { print 'disabled'; } ?>"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                <a href="/product.php?product=<?=$row['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Details</a>
            </div>
            <div class="product-overlay">
                <div class="overlay-content">
                    <h2>$<?=number_format($row['price'], 2)?></h2>
                    <p><?=$row['name']?></p>
                    <a href="#" class="btn btn-default add-to-cart <?php if($row['quantity'] == 0) { print 'disabled'; } ?>"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    <a href="/product.php?product=<?=$row['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Details</a>
                </div>
            </div>
            <?php if($row['sale']) { ?>
            <img src="images/home/sale.png" class="new" alt="" />
            <?php } ?>
        </div>
    </div>
</div>
<?php
}
?>
