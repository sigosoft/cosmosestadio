<?php 

include 'android_connection.php';

$category_id=$_POST['category_id'];

$data=array();

$subcategory="SELECT * FROM sub_category WHERE category_id='$category_id'";
$result=mysqli_query($conn,$subcategory);

if(mysqli_num_rows($result)>0)
{

while($list=mysqli_fetch_assoc($result))
{
   $data[]=$list;

}




$pass['subcategory']=$data;

}

else
{
	$pass['subcategory']="No Data";
}

print_r(json_encode($pass));





?>