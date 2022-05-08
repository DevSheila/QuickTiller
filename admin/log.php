<?php
session_start();


 $username = $_POST['admin'];
 $pass = $_POST['password'];
 $_SESSION["user"] = $username;
 $_SESSION["pass"] = $pass;

 $success = false;

if($username == 'admin' && $pass == 'root'){

header('Location:index.php');

}
else{
    echo 'Invalid Details';
}


?>
