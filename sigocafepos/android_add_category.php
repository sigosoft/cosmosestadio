<?php 

include 'android_connection.php';

$category_name=$_POST['category_name'];

$validate=mysqli_query($conn,"SELECT * FROM category WHERE category_name='$category_name'");

if(mysqli_num_rows($validate)>0)
{


echo "Category Already Exist";

}

else
{
	
$sql="INSERT INTO category (category_name,SQLStatus) VALUES('$category_name',1)";

if (mysqli_query($conn, $sql))

{
    echo "Success";
} 

else 
{

    echo "Failed";
}

}



?>