<?php
    $mysqli = new mysqli("localhost", "root", "root", "three_little_pigs");
    if(isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $categories = $mysqli->query("SELECT name FROM product_category WHERE id = $category_id;")
            or trigger_error("Query Failed! SQL: $sql - Error: ".$mysqli->error, E_USER_ERROR);
        $category = $categories->fetch_assoc();
        $page_title = $category['name'];
        $query = "SELECT * FROM product WHERE category = $category_id ORDER BY name;";
    } else if(isset($_GET['search'])) {
        $search = $_GET['search'];
        $page_title = "Search Items";
        $query = "SELECT * FROM product WHERE name like '%$search%' or description like '%$search%' ORDER BY name;";
    } else {
        $page_title = 'All Items';
        $query = "SELECT * FROM product ORDER BY name;";
    }
    $products = $mysqli->query($query)
        or trigger_error("Query Failed! SQL: $sql - Error: ".$mysqli->error, E_USER_ERROR);
    $mysqli->close();
    include('header.php');
?>

<section>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <?php include('category.php'); ?>
        </div>

        <div class="col-sm-9 padding-right">
            <div class="features_items">
                <h2 class="title text-center"><?=$page_title?></h2>
                <?php
                    if($products->num_rows > 0){
                        include('items.php');
                    } else {
                        print '<div class="alert alert-danger">No Items Found</div>';
                    }
                ?>
            </div>

        </div>
    </div>
</div>
</section>

<?php include('footer.php'); ?>
