<?php

include 'android_connection.php';

$subcategory_id=$_POST['subcategory_id'];




$sql="UPDATE sub_category SET SQLStatus=0 WHERE subcategory_id='$subcategory_id'";

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