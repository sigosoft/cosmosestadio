<?php 

include 'android_connection.php';


$query="SELECT * FROM category";
$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0)

{

while($row=mysqli_fetch_assoc($result))
{
   $category[]=$row;

}

}
else
{
   $category[]="No Category";
}




$output['category']=$category;




$query1="SELECT * FROM sub_category";
$result1=mysqli_query($conn,$query1);


if(mysqli_num_rows($result1)>0)

{

while($row1=mysqli_fetch_assoc($result1))
{
   $sub_category[]=$row1;

}

}
else
{
   $sub_category[]="No Subcategory";
}




$output['sub_category']=$sub_category;

















$pass=$output;







 print_r(json_encode($pass));


?>