<?php 

include 'android_connection.php';





$sSQL= 'SET CHARACTER SET utf8'; 

mysqli_query($conn,$sSQL);


$query="SELECT * FROM product";
$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0)

{

while($row=mysqli_fetch_assoc($result))
{
   $menu_item[]=$row;

}

}
else
{
   $menu_item[]="No Menu Item";
}




$output['menu_item']=$menu_item;





$pass=$output;


print_r(json_encode($pass));





?>