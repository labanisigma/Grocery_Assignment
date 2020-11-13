<?php
/**
 * Created by PhpStorm.
 * User: labaniacharjee
 * Date: 13/11/20
 * Time: 11:43 PM
 */
?>


<?php
include_once('dbconnection.php');
if (!empty($_POST["keyword"])) {
    $query = mysqli_query($con, "SELECT * FROM products WHERE ProductName like '%" . $_POST["keyword"] . "%' OR ProductSKU like '%" . $_POST["keyword"] . "%' limit 5");
    ?>
    <ul class="product-list">
        <?php if(mysqli_num_rows($query) == 0) { ?>
            <li><?php echo "No Record found"; ?></li>
            <?php
        } else {
            while ($result = mysqli_fetch_array($query)) { ?>
                <li><?php echo $result["ProductName"].' ('.$result["ProductSKU"].')'; ?></li>
            <?php }
        } ?>
    </ul>
<?php }
?>