<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
<?php

    $result = $mysqli->query("SELECT pc1.id, pc1.name, pc2.id, pc2.name FROM product_category AS pc1 LEFT JOIN product_category AS pc2 ON pc2.parent = pc1.id WHERE pc1.parent IS NULL");

    if ($result->num_rows > 0) { ?>
        <div class="panel panel-default">
<?php
        $row = $result->fetch_array(MYSQLI_NUM);
        $offset = -1;
        do {
            $offset++;
            $name = $row[1];
            print '<div class="panel-heading"><h4 class="panel-title">';
            if ($row[2]) {
                print "<a data-toggle=\"collapse\" data-parent=\"#accordian\" href=\"#$name\">";
                print '<span class="badge pull-right"><i class="fa fa-plus"></i></span>';
                print "$name</a><h4></div><div id=\"$name\" class=\"panel-collapse ";
                print 'collapse"><div class="panel-body"><ul>';

                while (true) {
                    if ($name == $row[1]) {
                        print "<li><a href=\"products.php?category={$row[2]}\">{$row[3]}</a></li>";
                        $row = $result->fetch_array(MYSQLI_NUM);
                        $offset++;
                    } else {
                        $result->data_seek($offset--);
                        break;
                    }
                }

                print '</ul></div>';
            } else {
                print "<a href=\"products.php?category={$row[0]}\">$name</a></h4>";
            }
            print '</div>';
        } while($row = $result->fetch_array(MYSQLI_NUM));

    }
?>
    </div>
    </div>
</div>
