<?php
/**
 * Created by PhpStorm.
 * User: labaniacharjee
 * Date: 13/11/20
 * Time: 10:38 PM
 */
include ('dbconnection.php');

if(isset($_REQUEST['query'])) {


//echo "in";
    $query = $_REQUEST['query'];
    $selectquery = "SELECT * FROM products WHERE ProductName LIKE '%" . $query . "%' OR ProductSKU LIKE '%" . $query . "%' ";
    $result = $con->query($selectquery);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row['ProductName'];
        }
    }
    else {
        echo 'No Record';}
}

?>





<?php

$keyword = $_GET["search"];
$pageUrl = "?search=".$keyword;

if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}

$total_records_per_page = 3;
$offset = ($page_no - 1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";

$result_count = mysqli_query($con, "SELECT COUNT(*) As total_records FROM products WHERE ProductName like '%" . $keyword . "%' OR ProductSKU like '%" . $keyword . "%'");
$total_records = mysqli_fetch_array($result_count);


$total_records = $total_records['total_records'];////34
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total page minus 1

if (!empty($keyword)) {
    $query = mysqli_query($con, "SELECT * FROM products WHERE ProductName like '%" . $keyword . "%' OR ProductSKU like '%" . $keyword . "%' LIMIT $offset, $total_records_per_page");
}
?>






