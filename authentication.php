<?php
	include('config.php');

	$fullname=$_POST['fullname'];
	$mobilenumber= $_POST['mobilenumber'];
	$emailaddress= $_POST['emailaddress'];
	$Password	= $_POST['Password'];


		$fullname=stripcslashes($fullname);
		$mobilenumber=stripcslashes($mobilenumber);
		$emailaddress=stripcslashes($emailaddress);
		$Password=stripcslashes($con,$Password);

		$fullname=mysql_escape_string($con,$fullname);
		$mobilenumber=mysql_escape_string($con,$mobilenumber);
		$emailaddress=mysql_escape_string($con,$emailaddress);
		$Password=mysql_escape_string($con,$Password);

		$sql="select*from user where username='$username' and password='$Password'";
		$result=mysql_query($con,$sql);
		$row=mysql_fetch_array($result,MYSQLI_ASSOC);
		$count=mysql_num_rows($result);

		if ($count==1){
			echo "Login Successful";
		}else{
			echo "login failed";
		}

 
?> 