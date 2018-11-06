<?php

include 'android_connection.php';

$categoryID=$_POST['categoryID'];




$sql="UPDATE category SET SQLStatus='0' WHERE category_id='$categoryID'";


if (mysqli_query($conn, $sql))
 {

  $pass['status']="Success";

 }
 else
 {
 
  $pass['status']="Failed";

 }

 print_r(json_encode($pass));

?>