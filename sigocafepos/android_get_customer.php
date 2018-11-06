<?php 

include 'android_connection.php';



$data=array();

$category="SELECT * FROM customer";
$result=mysqli_query($conn,$category);

if(mysqli_num_rows($result)>0)
{

while($list=mysqli_fetch_assoc($result))
{
   $data[]=$list;

}




$pass['customer']=$data;

}

else
{
	$pass['customer']="No Data";
}

print_r(json_encode($pass));





?>