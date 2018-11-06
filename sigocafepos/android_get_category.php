<?php 

include 'android_connection.php';



$data=array();

$category="SELECT * FROM category";
$result=mysqli_query($conn,$category);

if(mysqli_num_rows($result)>0)
{

while($list=mysqli_fetch_assoc($result))
{
   $data[]=$list;

}




$pass['category']=$data;

}

else
{
	$pass['category']="No category Data";
}

print_r(json_encode($pass));





?>