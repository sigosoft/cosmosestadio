<?php
 include 'android_connection.php';
 if($_SERVER['REQUEST_METHOD']=='POST'){
 
 $image = $_POST['image'];
  $id = $_POST['product_id'];   
// echo $id;
 
 $sql ="SELECT product_id FROM product WHERE product_id='$id'";
 
 $res = mysqli_query($conn,$sql);
 
 $id = 0;
 
 while($row = mysqli_fetch_array($res)){
 $id = $row['product_id'];
 }
 
 $im=$id.time();

  $p = "uploads/$im.png";

 //$p = "../uploads/$im.png";
 
 //$mainpath = "http://192.168.1.6/myimage/$p";
 
 
// $sql="insert into images(image) values('".$p."');";
// $sql="insert into images(image) values('".$p."');";
  // $result = mysqli_query($conn,"UPDATE product SET image='$im.png' WHERE product_id='$id'");
 $result = mysqli_query($conn,"UPDATE product SET image='$im.png' WHERE product_id='$id'");
  
 if(mysqli_query($conn,$sql)){
 file_put_contents($p,base64_decode($image));
 echo "Successfully Uploaded";
 }
 
 mysqli_close($conn);
 }else{
 echo "Error";
 }
 
?>