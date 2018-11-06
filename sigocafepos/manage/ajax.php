<?php
require_once("../android_connection.php");
$sql = "UPDATE category set " . $_POST["column"] . " = '".$_POST["value"]."' WHERE category_id=".$_POST["id"];
mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
?>