<?php
$conn= mysqli_connect('localhost','root','','mysql') or die('Unable to Connect to Database');
if($_GET["id"]!="" && $_GET['sec']!="" ){
$id=$_GET["id"];
$id2=$_GET["sec"];
$strSQLc= "DROP USER '$id'@'$id2' ";
 $query = mysqli_query($conn,$strSQLc)or die(mysqli_error($conn));
 if($query==True){

header('location:users.php');
}
 }
 elseif ($_POST["username"]!=""&&$_POST["host"]!=""&&$_POST["password"]!="") {
   // code...
$name=$_POST["username"];
$host=$_POST["host"];
$pass=$_POST["password"];

$str= "create USER '$name'@'$host' identified by '$pass' ";
// create user peter@localhost identified by 'jtp12345';
$query= mysqli_query($conn,$str)or die(mysqli_error($conn));
if($query==True){

header('location:users.php');
}
 }
 elseif ($_GET["stdreg"]!="" ) {
   // code...
   header('location:data.php');
 }

 ?>
