<?php
require('../database/conn.php');
if (isset($_POST['update'])) {
	$id='';
	$image="avatar.png";
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$phone = $_POST['phone'];
	$addres = $_POST['address'];
	$time=date("Y-m-d h:i:sa");
	$on='online';
	
    echo $email,"<br>",$name,"<br>",$pass,"<br>",$addres,"<br>",$phone,"<br>",$time;
	$query="UPDATE `user` SET `user_name`='$name',`email`='$email',`phone`='$phone',`address`='$addres',`password`='$pass' WHERE 3";
  
	$que=mysqli_query($conn,$query) or die(mysqli_error($conn));

	header('location:user-dashboard.php');
}
?>