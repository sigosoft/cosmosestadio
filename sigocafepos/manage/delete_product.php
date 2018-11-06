<?php

$product_id=$_GET['id'];

require_once("../android_connection.php");


$Delete="UPDATE product SET SQLStatus=3 WHERE product_id='$product_id'";
mysqli_query($conn,$Delete);

header('location:viewprod.php');


?>