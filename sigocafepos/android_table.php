<?php 

include 'android_connection.php';



$data=array();

$cafe_tables="SELECT * FROM cafe_tables";
$result=mysqli_query($conn,$cafe_tables);

if(mysqli_num_rows($result)>0)
{

while($list=mysqli_fetch_assoc($result))
{
   $data[]=$list;

}




$pass['cafe_tables']=$data;

}

else
{
	$pass['cafe_tables']="No Data";
}

print_r(json_encode($pass));





?>