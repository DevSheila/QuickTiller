<?php

include("./admin/action/config.php");
session_start();

$_SESSION["user_loggedin"] = false;
$_SESSION["user_id"] ="";
$_SESSION["user_email"] ="";



if($_SESSION["user_loggedin"] === true){

    header("location: ./user/user-dashboard.php");
    exit;
}else{
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $_err = "";
 
// Processing form data when form is submitted
if(isset($_POST['sign-in'])){
 
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($email_err) && empty($password_err)){
      if (!$conn ||mysqli_connect_errno()) {
        echo("Connection failed: " . mysqli_connect_error());
      }else{
      
          // Password is correct, so start a new session
              $sql= "SELECT* FROM user WHERE email ='$email'";
              $result = mysqli_query($conn,$sql);
              $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
              
              $count = mysqli_num_rows($result);
              
            
              if($count == 1) {
                if(password_verify($password, $row ['password'])){
                  // $_SESSION['user_id'] = $row ['id'];
                  $_SESSION['user_id'] = $row ['id'];

                  $_SESSION['user_qr'] = $row ['qr_code'];
                  $_SESSION["user_loggedin"] = true;
                  // header("../pages/sign-up.php");
                  header("location: ./user/user-dashboard.php");
                  exit;
                }
              }else{
                  echo "Unsuccessful.$count .'password:'$hashed_password";
              }
                mysqli_close($conn);
      }
    }
}
}

?>
