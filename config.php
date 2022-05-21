<?php 
	$host="localhost";
	$user="root";
	$password='';
	$db_name="useraccounts";

	$link=mysqli_connect($host,$user,$password,$db_name);

	if($link===false){
		die("Failed to connect with MySQL:".mysqli_connect_error());
	}
?>