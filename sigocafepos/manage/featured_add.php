<?php

$product_id=$_GET['id'];

require_once("../android_connection.php");


$update="UPDATE product SET featured='1' WHERE product_id='$product_id'";
mysqli_query($conn,$update);

header('location:viewprod.php');

?>