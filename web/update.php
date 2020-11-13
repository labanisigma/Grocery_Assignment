<?php
include ("dbconnection.php");
$id = $_REQUEST['edit'];
//print_r($id);
$select="select * from address WHERE AddressID=$id";
//echo $select;
if($result=mysqli_query($con,$select))
{
    if(mysqli_num_rows($result)>0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $id=$row['AddressID'];
            $add=$_POST['UserAddress'];
            $country=$_POST['UserCountry'];
            $state=$_POST['UserState'];
            $city=$_POST['UserCity'];
            $postcode=$_POST['UserZip'];
//$zip=$row['Zip'];

        }
    }
}
if(isset($_REQUEST['update']))
{
    $data=array('UserAddress'=>$_REQUEST['UserAddress'],'UserCountry'=>$_REQUEST['UserCountry'],'UserState'=>$_REQUEST['UserState'],'UserCity'=>$_REQUEST['UserCity'],'UserZip'=>$_REQUEST['UserZip']);
    print_r($data);
    //$updatequery="update address set UserAddress='$data[UserAddress]',UserCountry='$data[UserCountry]',UserState='$data[UserState]',UserCity='$data[UserCity]',UserZip='$data[UserZip]' where AddressID='$id'";
    $updatequery="update useraddress set `UserAddress`='$data[UserAddress]',`UserCountry`='$data[UserCountry]',`UserState`='$data[UserState]',`UserCity`='$data[UserCity]',`UserZip`='$data[UserZip]' where `UserID`='$id'";

    echo $updatequery;
    if($con->query($updatequery))
    {
        ?><script>alert("Data Updated");
        location.href="my_account.php";

    </script><?php
    }
    else
    {
        ?><script>alert("Not Updated");</script><?php
    }
}

?>







<form method="post" action="#" >

    <input type="hidden" name="id" value="<?php echo $id; ?>"

    <div class="input-group">
        <label>Country</label>
        <input type="text" name="UserCountry" value="<?php echo $UserCountry; ?>">
    </div>
    <div class="input-group">
        <label>State</label>
        <input type="text" name="UserState" value="<?php echo $UserState; ?>">
    </div>

    <div class="input-group">
        <label>Address</label>
        <input type="text" name="UserAddress" value="<?php echo $UserAddress; ?>">
    </div>

    <div class="input-group">
        <label>City</label>
        <input type="text" name="UserCity" value="<?php echo $UserCity; ?>">
    </div>

    <div class="input-group">
        <label>Post Code</label>
        <input type="number" name="UserZip" value="<?php echo $UserZip; ?>">
    </div>

    <div class="input-group">
        <button class="btn" type="submit" name="update" style="background: #fff;">update</button>

        <!-- --><?php //if ($update == true):
        //
        // if (isset($_POST['update'])) {
        // $id = $_POST['id'];
        // $UserCountry = $_POST['country'];
        // $UserState = $_POST['state'];
        // $UserAddress = $_POST['address'];
        // $UserCity = $_POST['city'];
        //
        // mysqli_query($con, "UPDATE address SET Country='$UserCountry', State='$UserState',Address='$UserAddress',City='$UserCity' WHERE AddressID=$id");
        // $_SESSION['message'] = "Address updated!";
        // header('location: account.php');
        // }
        //
        // ?>
        <!-- <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>-->
        <!-- --><?php //else:
        //
        //
        // ?>
        <!-- <button class="btn" type="submit" name="save" >Save</button>-->
        <!-- --><?php //endif ?>
    </div>


</form>