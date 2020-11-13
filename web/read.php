<?php
/**
 * Created by PhpStorm.
 * User: labaniacharjee
 * Date: 12/11/20
 * Time: 10:58 PM
 */
?>

<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">

    <tbody>
    <?php
    $vid=$_GET['viewid'];
    $ret=mysqli_query($con,"select * from useraddress where ID =$vid");
    $cnt=1;
    while ($row=mysqli_fetch_array($ret)) {

        ?>
        <tr>
            <th>User Address</th>
            <td><?php  echo $row['UserAddress'];?></td>

        </tr>
        <tr>
            <th>User Country</th>
            <td><?php  echo $row['UserCountry'];?></td>
            <th>User State</th>
            <td><?php  echo $row['UserState'];?></td>
        </tr>
        <tr>
            <th>User City</th>
            <td><?php  echo $row['UserCity'];?></td>
            <th>Creation Date</th>
            <td><?php  echo $row['CreationDate'];?></td>
        </tr>
        <?php
        $cnt=$cnt+1;
    }?>

    </tbody>
</table>
