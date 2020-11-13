<?php
/**
 * Created by PhpStorm.
 * User: labaniacharjee
 * Date: 29/10/20
 * Time: 9:47 PM
 */


session_start();
session_unset();
session_destroy();
header('location:index.php');
?>