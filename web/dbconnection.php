<?php
/**
 * Created by PhpStorm.
 * User: labaniacharjee
 * Date: 27/10/20
 * Time: 10:46 PM
 */

session_start();
$con=mysqli_connect("localhost", "root", "Labani@1998", "bsm");
if(mysqli_connect_errno()){
    echo "Connection Fail".mysqli_connect_error();
}
?>