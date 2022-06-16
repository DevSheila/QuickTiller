<?php
// Include config file
require_once "../../admin/action/config.php";
if(isset($_SESSION["user_loggedin"]) && !($_SESSION["user_loggedin"] === true)){
  header("location: ../profile.php");
  exit;
}
// Define variables and initialize with empty values
$user_name =$full_name=$address=$user_image= $password =$email =$phone= $confirm_password = "";
$full_name_err=$user_name_err = $address_err =$user_image_err =$password_err = $confirm_password_err = "";
$status='pending';
$users_upload_dir = "../../uploads/users";
$date=date("F j, Y, g:i a");
 
// Processing form data when form is submitted
// if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST['sign-up'])){
     // validate full name 
 
    if(empty(trim($_POST["full_name"]))){
        $full_name_err = "Please enter your user location.";
    }else{
        $full_name = trim($_POST["full_name"]);
    
    }

    // validate phone number
    if(empty(trim($_POST["phone"]))){
        $phone_err = "Please enter your user location.";
    }else{
        $phone_number = trim($_POST["phone"]);
        $phone=strval($phone_number);
    
    }
     // validate user name 
     if(empty(trim($_POST["user_name"]))){
        $email_err = "Please enter a user_name.";
    }else{
        // Prepare a select statement
        $sql = "SELECT id FROM user WHERE user_name = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_user_name);
            
            // Set parameters
            $param_user_name = trim($_POST["user_name"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This user_name is already taken.";
                } else{
                    $user_name = trim($_POST["user_name"]);
  
  
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
  
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // validate user location
    if(empty(trim($_POST["address"]))){
    $address_err = "Please enter your user location.";
    }else{
        $address = trim($_POST["address"]);

    }
    

    // validate user logo
    // if(empty(trim($_POST["user_image"]))){
    //     $user_image_err = "Please enter your user logo.";
    // }else{
        
        $time = time();

          //user logo
          $user_image_name = $_FILES['image']['name'];
          $user_image_size =$_FILES['image']['size'];
          $user_image_tmp =$_FILES['image']['tmp_name'];
          $user_image_type=$_FILES['image']['type'];
          // $user_image_ext=strtolower(end(explode('.',$_FILES['user_image']['name'])));
          $user_image_image_name = $time.'_'.$user_image_name;
          $extensions= array("jpg","png");
    // }

    // validate email
    if(empty(trim($_POST["email"]))){
      $email_err = "Please enter a email.";
  }else{
      // Prepare a select statement
      $sql = "SELECT id FROM user WHERE email = ?";
      
      if($stmt = mysqli_prepare($conn, $sql)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "s", $param_user_name);
          
          // Set parameters
          $param_user_name = trim($_POST["email"]);
          
          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)){
              /* store result */
              mysqli_stmt_store_result($stmt);
              
              if(mysqli_stmt_num_rows($stmt) == 1){
                  $email_err = "This email is already taken.";
              } else{
                  $email = trim($_POST["email"]);


              }
          } else{
              echo "Oops! Something went wrong. Please try again later.";
          }

          // Close statement
          mysqli_stmt_close($stmt);
      }
  }
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{

        $password = trim($_POST["password"]);
    

    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please enter a confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }else{
            $password = trim($_POST["confirm_password"]);

        }
    }
    
    

    // $user_name=trim($_POST['user_name']);
    // $email=trim($_POST['email']);
    // $password=trim($_POST['password']);

    $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
  
    move_uploaded_file($user_image_tmp,"$users_upload_dir/$user_image_image_name");

    // Check input errors before inserting in database
    if(empty($user_name_err) && empty($email_err)&& empty($password_err) && empty($confirm_password_err)){
        
        $time = time();
        $qr_code=$time;
        // Prepare an insert statement
        $sql ="INSERT INTO user(user_name, full_name, user_image, status, email, phone, address, password, date) VALUES
 ('$user_name','$full_name','$user_image_image_name',' ','$email','$phone','$address','$param_password','$date')";
                
        if ($conn->query($sql) === TRUE) {
      
          header("Location: ./sign-in.php");

        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        

    }
    
    // Close connection
    $conn->close();
}
?>