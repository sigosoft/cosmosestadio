<?php 

include 'android_connection.php';



$data=array();

$sub_category="SELECT * FROM sub_category";
$result=mysqli_query($conn,$sub_category);

if(mysqli_num_rows($result)>0)
{

while($list=mysqli_fetch_assoc($result))
{
   $data[]=$list;

}




$pass['sub_category']=$data;

}

else
{
	$pass['sub_category']="No sub_category Data";
}

print_r(json_encode($pass));





?>