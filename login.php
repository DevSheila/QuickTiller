<?php
require('database/conn.php');

$name=$_POST['name'];
$pass=$_POST['pass'];

echo $name,"<br>",$pass;

$qur="SELECT * from user where `user_name`='$name' and `password`='$pass'";
$query=mysqli_query($conn,$qur);
$num=mysqli_num_rows($query);
if($num<0){
    echo "<script>alert('You are not registered please regester')</script>";

}else{
session_start();


}

?>