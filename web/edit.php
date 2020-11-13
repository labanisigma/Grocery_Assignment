
<?php
//Database Connection
include('dbconnection.php');
if(isset($_POST['submit']))
{
    $eid=$_GET['editid'];
    //Getting Post Values
    $add=$_POST['UserAddress'];
    $country=$_POST['UserCountry'];
    $state=$_POST['UserState'];
    $city=$_POST['UserCity'];
    $postcode=$_POST['UserZip'];

    //Query for data updation
    $query=mysqli_query($con, "update  useraddress set UserAddress='$add',UserCountry='$country', UserState='$state', UserCity='$city', UserZip='$postcode' where ID='$eid'");

    if ($query) {
        echo "<script>alert('You have successfully update the data');</script>";
        echo "<script > document.location ='acount.php'; </script>";
    }
    else
    {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>



<form  method="POST">
    <?php
    $eid=$_GET['editid'];
    $ret=mysqli_query($con,"select * from useraddress where ID='$eid'");
    while ($row=mysqli_fetch_array($ret)) {
        ?>
        <h2>Update </h2>
        <p class="hint-text">Update your info.</p>
        <div class="form-group">
            <div class="row">
                <div class="col"><textarea type="text" class="form-control" name="add" value="<?php  echo $row['UserAddress'];?>" required="true"> </textarea></div>
                <div class="col"><input type="text" class="form-control" name="country" value="<?php  echo $row['UserCountry'];?>" required="true"></div>
            </div>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="state" value="<?php  echo $row['UserState'];?>" required="true" maxlength="10" pattern="[0-9]+">
        </div>

        <div class="form-group">
            <input type="email" class="form-control" name="city" value="<?php  echo $row['UserCity'];?>" required="true">
        </div>

        <div class="form-group">
            <input  type="number" class="form-control" name="postcode" required="true"><?php  echo $row['UserZip'];?>
        </div>
        <?php
    }?>
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
    </div>
</form>
