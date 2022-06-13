<?php
require('../database/conn.php');
session_start();
$id=$_SESSION['user_id'];
if (isset($_POST['update'])) {

	$image="avatar.png";
	$fullname=mysqli_real_escape_string($conn,$_POST['full_name']);
	$name =mysqli_real_escape_string($conn,$_POST['name']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$pass = mysqli_real_escape_string($conn,$_POST['password']);
	$phone = mysqli_real_escape_string($conn,$_POST['phone']);
	$addres = mysqli_real_escape_string($conn,$_POST['address']);
	$time=mysqli_real_escape_string($conn,date("Y-m-d h:i:sa"));
	$on='online';
	$param_password = password_hash($pass, PASSWORD_DEFAULT);
    echo $email,"<br>",$fullname,"<br>",$name,"<br>",$param_password,"<br>",$addres,"<br>",$phone;
	$query="UPDATE `user` SET `full_name`='$fullname',`user_name`='$name',`email`='$email',`phone`='$phone',`address`='$addres',`password`='$param_password' WHERE `id`= $id";
  
	$que=mysqli_query($conn,$query) or die(mysqli_error($conn));
if($que){
	header('location:profile.php');
}else{
	echo "something is wrong";
}
}
?>