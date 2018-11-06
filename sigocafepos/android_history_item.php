<?php 

include 'android_connection.php';

$order_id=$_POST['order_id'];



$data=array();
$customer_name=array();

$order_item="SELECT * FROM order_items WHERE order_id='$order_id'";


$result=mysqli_query($conn,$order_item);
if(mysqli_num_rows($result)>0)
{

while($list=mysqli_fetch_assoc($result))
{


 

    $customer_id=$list['customer_id'];
 

   $customer=mysqli_query($conn,"SELECT * FROM customer WHERE customer_id='$customer_id'");
   $customer_details=mysqli_fetch_assoc($customer);
   $name=$customer_details['customer_name'];
   $customer_name['CustomerName']=$name;

  
   
     $passed[]=array_merge($list,$customer_name);



}




$pass['order_item']=$passed;

}

else
{
	$pass['order_item']="No Data";
}

print_r(json_encode($pass));





?>