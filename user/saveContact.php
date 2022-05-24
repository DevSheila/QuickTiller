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

    $query="INSERT INTO `user`(`id`, `user_name`, `user_image`, `status`, `email`,`phone`,`address`, `password`, `date`) VALUES('$id','$name','$image','$on','$email','$phone','$addres','$pass','$time')";
	$que=mysqli_query($conn,$query) or die(mysqli_error($conn));

	
}
?>