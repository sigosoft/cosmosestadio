<?php
session_start();
require_once("../android_connection.php");

if(is_array($_FILES)) {
if(is_uploaded_file($_FILES['userimage']['tmp_name'])) {
$sourcePath = $_FILES['userimage']['tmp_name'];
$targetPath = "../uploads/".$_FILES['userimage']['name'];
if(move_uploaded_file($sourcePath,$targetPath)) {
$id = $_POST["id"];
	$sql = "UPDATE product SET image='$targetPath' WHERE product_id='$id'";
	mysqli_query($conn,$sql);
	header("location:viewprod.php");
?>

<?php
}
}
}
?>