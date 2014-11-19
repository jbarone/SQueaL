<?php
    $page_title = 'Home';
    include('header.php');
?>

    <section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php include('category.php'); ?>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
<?php
    $products = $mysqli->query('SELECT * FROM product WHERE featured = 1 ORDER BY name;');
    include('items.php');
?>
                </div><!--features_items-->

            </div>
        </div>
    </div>
    </section>

<?php include('footer.php'); ?>
