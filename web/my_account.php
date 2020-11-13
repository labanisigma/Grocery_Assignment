<?php
/**
 * Created by PhpStorm.
 * User: labaniacharjee
 * Date: 12/11/20
 * Time: 11:17 AM
 */

//Databse Connection file
include('dbconnection.php');

$id=$_REQUEST['insert'];
//echo $id;
//exit();
//echo "<script> alert ('hello'); </script>";

if(isset($_POST['insert']))
{   //echo "<script> alert ('hii'); </script>";
    //getting the post values

    $add=$_POST['UserAddress'];
    $country=$_POST['UserCountry'];
   $state=$_POST['UserState'];
   $city=$_POST['UserCity'];
    $postcode=$_POST['UserZip'];
    //$id=$_POST['UserID'];
    echo $add.$country.$state.$city.$postcode;
   // $phone=$_POST['UserPhone'];


    // Query for data insertion
   // echo "INSERT INTO useraddress (`UserAddress`, `UserCountry`, `UserState`, `UserCity`, `UserZip`)  VALUES('$add', '$country', '$state', '$city' ,'$postcode')";
    //exit();
    $query=mysqli_query($con, "INSERT INTO useraddress (UserAddress, UserCountry, UserState,UserCity,UserZip,UserID)  VALUES('$add', '$country', '$state', '$city' ,'$postcode','$id')");
    if ($query) {
        echo "<script>alert('You have successfully inserted the data');</script>";
        echo "<script > document.location ='account.php'; </script>";
    }
    else
    {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}



?>



<form  method="POST">
    <h2>My Account Page</h2>
    <p class="hint-text">Fill below form.</p>
    <div class="form-group">

        <div class="row">
<!--            <div class="col"><input type="text" class="form-control" name="UserAddress" placeholder="First Name" required="true"></div>-->

            <div class="form-group">
                <textarea class="form-control" name="UserAddress" placeholder="Enter Your Address" required="true"></textarea>
            </div>

            <div class="col"><input type="text" class="form-control" name="UserCountry" placeholder="Enter your country Name" required="true"></div>
        </div>
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name="UserState" placeholder="Enter your State" required="true" >
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name="UserCity" placeholder="Enter your City" required="true">

    </div>
    <div class="form-group">
        <input type="number" class="form-control" name="UserZip" placeholder="Enter your PostCode" required="true">

    </div>
<!--    <div class="form-group">-->
<!--        <input type="email" class="form-control" name="UserPhone" placeholder="Enter your Pnone No." required="true">-->
<!---->
<!--    </div>-->
<!---->
<!--    <div class="form-group">-->
<!--        <textarea class="form-control" name="UserAddress" placeholder="Enter Your Address" required="true"></textarea>-->
<!--    </div>-->

    <div class="form-group">
    <input type="submit"  value="submit" name="insert">
<!--        <button type="submit" name="insert" ><a href="account.php?insert=--><?php //echo $_SESSION['uid'];?><!--">Insert </a> </button>-->
    </div>
</form>
