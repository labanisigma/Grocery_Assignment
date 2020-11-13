<?php
include("dbconnection.php");
?>

<?php //include('server.php');
//if (isset($_GET['edit'])) {
//    $id = $_GET['edit'];
//    $update = true;
//    $id = $_SESSION['UserID'];
//    echo $id;
//    $record = mysqli_query($con, "SELECT * FROM useraddress WHERE UserID='$id'");
//    echo $record;
//}

//if (count($record) == 1 ) {
//    $add=$_POST['UserAddress'];
//    $country=$_POST['UserCountry'];
//    $state=$_POST['UserState'];
//    $city=$_POST['UserCity'];
//    $postcode=$_POST['UserZip'];
//
//}
?>







<html>
<head>
    <style>
        table,tr,th{
            border:1px solid black;
        }
    </style>
    <title> Account</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php //if (isset($_SESSION['message'])): ?>
<!--    <div class="msg">-->
<!--        --><?php
//        echo $_SESSION['message'];
//        unset($_SESSION['message']);
//        ?>
<!--    </div>-->
<?php //endif ?>

<?php
$id=$_REQUEST['ID'];
echo $id;
$results = mysqli_query($con, "SELECT * FROM useraddress WHERE UserID='$id'");
print_r($results);
?>

<button type="submit" name="insert" > <a href="my_account.php?insert=<?php echo $id; ?>" >Insert ></a> </button>

<table>
    <thead>
    <tr>
        <th>Address</th>
        <th>Country</th>
        <th>State</th>
        <th>City</th>
        <th>Post Code</th>
        <th colspan="2">Action</th>
    </tr>
    </thead>

<tbody>
    <?php
    while ($row = mysqli_fetch_array($results)) {
        echo "<pre>";
        print_r($row);

        ?>
        <tr>
            <td><?php echo $row['UserAddress']; ?></td>
            <td><?php echo $row['UserCountry']; ?></td>
            <td><?php echo $row['UserState']; ?></td>
            <td><?php echo $row['UserCity']; ?></td>2
            <td><?php echo $row['UserZip']; ?></td>
            <td id="edit">
                <a href="update.php?edit=<?php echo $row['ID']; ?>" class="edit_btn" >Edit</a>
            </td>
            <td id="del">
                <a href="delete.php?del=<?php echo $row['ID']; ?>" class="del_btn">Delete</a>
            </td>
        </tr>
    <?php } ?>
</tbody>
</table>




</body>
</html>