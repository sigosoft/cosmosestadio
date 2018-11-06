<?php 

include 'android_connection.php';



$data=array();

$orders="SELECT * FROM orders WHERE status='Cancelled' ORDER by order_id DESC";
$result=mysqli_query($conn,$orders);

if(mysqli_num_rows($result)>0)
{

while($list=mysqli_fetch_assoc($result))
{
   $data[]=$list;

}




$pass['orders']=$data;

}

else
{
	$pass['orders']="No Data";
}

print_r(json_encode($pass));





?>