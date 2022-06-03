<?php
require('../database/conn.php');
if (isset($_POST['update'])) {
	$id='';
	$image="avatar.png";
	$name =mysqli_real_escape_string($conn,$_POST['name']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$pass = mysqli_real_escape_string($conn,$_POST['password']);
	$phone = mysqli_real_escape_string($conn,$_POST['phone']);
	$addres = mysqli_real_escape_string($conn,$_POST['address']);
	$time=mysqli_real_escape_string($conn,date("Y-m-d h:i:sa"));
	$on='online';
	
    echo $email,"<br>",$name,"<br>",$pass,"<br>",$addres,"<br>",$phone,"<br>",$time;
	$query="UPDATE `user` SET `user_name`='$name',`email`='$email',`phone`='$phone',`address`='$addres',`password`='$pass' WHERE 3";
  
	$que=mysqli_query($conn,$query) or die(mysqli_error($conn));

	header('location:user-dashboard.php');
}
?>