<?php 

include 'android_connection.php';

$order_id=$_POST['order_id'];


	
$sql="UPDATE orders SET status='Cancelled' WHERE order_id='$order_id'";

if (mysqli_query($conn, $sql))

{
    echo "Success";
} 

else 
{

    echo "Failed";
}





?>