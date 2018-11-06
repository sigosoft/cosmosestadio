<?php 

include 'android_connection.php';

$data=array();

$category_id=$_POST['category_id'];

$products="SELECT * FROM product WHERE category_id='$category_id'";


$result=mysqli_query($conn,$products);

if(mysqli_num_rows($result)>0)
{

while($list=mysqli_fetch_assoc($result))
{
   $data[]=$list;

}




$pass['products']=$data;

}

else
{
  $pass['products']="No Data";
}

print_r(json_encode($pass));




?>