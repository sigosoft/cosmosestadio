<?php 

include 'estadio_conn.php';

$data=array();


$Users="SELECT users.*, customer_wallet.* FROM users INNER JOIN customer_wallet ON users.UserID=customer_wallet.UserID";


$result=mysqli_query($estadio_conn,$Users);



if(mysqli_num_rows($result)>0)
{

while($list=mysqli_fetch_assoc($result))
{
   $data[]=$list;

}




$pass['Users']=$data;

}

else
{
	$pass['Users']="No Data";
}

print_r(json_encode($pass));






?>