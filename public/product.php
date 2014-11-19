<?php
    $mysqli = new mysqli("localhost", "root", "root", "three_little_pigs");
    if(isset($_GET['product'])){
        $product_id = $_GET['product'];
        $products = $mysqli->query("SELECT * FROM product WHERE id = $product_id;");
        $product = $products->fetch_assoc();
        $page_title = $product['name'];
    } else {
        header('Location: /products.php');
        exit();
    }
    $mysqli->close();
    include('header.php');
?>

<section>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <?php include('category.php'); ?>
        </div>

        <div class="product-details">
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="images/<?=$product['image']?>" alt="" />
                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <h2><?=$product['name']?></h2>
                    <p><?=$product['description']?></p>
                    <span>
                        <span>$<?=number_format($product['price'], 2)?></span>
                        <label>Quantity:</label>
                        <input type="text" value="1" />
                        <button type="button" class="btn btn-fefault cart <?php if($product['quantity'] == 0) { print 'disabled'; } ?>">
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </button>
                    </span>
                    <p><b>Availability:</b>
                    <?php
                        if($product['quantity'] > 0) {
                            print "In Stock";
                        } else {
                            print '<span style="color: red;">Sold Out</span>';
                        }
                    ?></p>
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->
    </div>
</div>
</section>

<?php include('footer.php'); ?>
