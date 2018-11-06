<?php 

include 'android_connection.php';

$category_id=$_POST['category_id'];
$subcategory_id=$_POST['subcategory_id'];
$product_name=$_POST['product_name'];
$product_code=$_POST['product_code'];
$price=$_POST['price'];

$sql="INSERT INTO product (product_name,product_code,price,subcategory_id,category_id, featured, SQLStatus) VALUES('$product_name','$product_code','$price','$subcategory_id','$category_id','0',1)";

if (mysqli_query($conn, $sql))
 {
 	$order_id=mysqli_insert_id($conn);
        echo "Success ".$order_id;
 }  

else 
{

    echo "Failed";
}





?>