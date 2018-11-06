<?php 

include 'android_connection.php';

$name=$_POST['name'];
$mobile=$_POST['mobile'];
$city=$_POST['city'];


$validate=mysqli_query($conn,"SELECT * FROM customer WHERE mobile='$mobile'");

if(mysqli_num_rows($validate)>0)
{

 echo "Mobile Number Already Exist";
 
}

else
{

$sql="INSERT INTO customer (customer_name, mobile, city, status) VALUES('$name', '$mobile', '$city', 'Active')";

if (mysqli_query($conn, $sql))
 {
    echo mysqli_insert_id($conn);
 } 

else 
{

echo "Failed";

}

}



?>