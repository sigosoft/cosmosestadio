<?php 

include 'android_connection.php';

$subcategory_name=$_POST['subcategory_name'];

$category_id=$_POST['category_id'];

$validate=mysqli_query($conn,"SELECT * FROM sub_category WHERE subcategory_name='$subcategory_name' AND category_id='$category_id'");



if(mysqli_num_rows($validate)>0)
{

echo "Subcategory Already Exist";

}

else
{

$sql="INSERT INTO sub_category (category_id, subcategory_name, SQLStatus) VALUES('$category_id', '$subcategory_name',1)";

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