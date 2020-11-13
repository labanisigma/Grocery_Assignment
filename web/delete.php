<?php
/**
 * Created by PhpStorm.
 * User: labaniacharjee
 * Date: 13/11/20
 * Time: 3:19 PM
 */

?>

<?php
//database connection file
include('dbconnection.php');
//Code for deletion

$id = $_REQUEST['del'];
echo $id;

if(mysqli_query($con, "DELETE FROM useraddress WHERE ID=$id"))

{

    ?> <script>alert("Data Deleted");
window.location.href="account.php?ID=<?php echo $_SESSION['uid']; ?>";
</script> <?php

}
else
{

    ?> <script>alert("not Deleted");
    window.location.href="account.php?ID=<?php echo $_SESSION['uid']; ?>";
</script> <?php

}
// $_SESSION['message'] = "Address deleted!";

//header('location:account.php');
?>
