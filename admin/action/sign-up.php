<?php
// Include config file
require_once "../action/config.php";
if(isset($_SESSION["loggedin"]) && !($_SESSION["loggedin"] === true)){
  header("location: ../pages/dashboard.php");
  exit;
}
// Define variables and initialize with empty values
$shop_name =$shop_location=$shop_logo= $password =$email = $confirm_password = "";
$shop_name_err = $shop_location_err =$shop_logo_err =$password_err = $confirm_password_err = "";
$status='pending';
$shops_upload_dir = "../uploads/shops";
$date=date("F j, Y, g:i a");
 
// Processing form data when form is submitted
// if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST['sign-up'])){
 

     // validate shop name 
     if(empty(trim($_POST["shop_name"]))){
        $email_err = "Please enter a shop_name.";
    }else{
        // Prepare a select statement
        $sql = "SELECT id FROM shop WHERE shop_name = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_shop_name);
            
            // Set parameters
            $param_shop_name = trim($_POST["shop_name"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This shop_name is already taken.";
                } else{
                    $shop_name = trim($_POST["shop_name"]);
  
  
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
  
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // validate shop location
    if(empty(trim($_POST["shop_location"]))){
    $shop_location_err = "Please enter your shop location.";
    }else{
        $shop_location = trim($_POST["shop_location"]);

    }

    // validate shop logo
    // if(empty(trim($_POST["shop_logo"]))){
    //     $shop_logo_err = "Please enter your shop logo.";
    // }else{
        
        $time = time();

          //shop logo
          $shop_logo_name = $_FILES['image']['name'];
          $shop_logo_size =$_FILES['image']['size'];
          $shop_logo_tmp =$_FILES['image']['tmp_name'];
          $shop_logo_type=$_FILES['image']['type'];
          // $shop_logo_ext=strtolower(end(explode('.',$_FILES['shop_logo']['name'])));
          $shop_logo_image_name = $time.'_'.$shop_logo_name;
          $extensions= array("jpg","png");
    // }

    // validate email
    if(empty(trim($_POST["email"]))){
      $email_err = "Please enter a email.";
  }else{
      // Prepare a select statement
      $sql = "SELECT id FROM shop WHERE email = ?";
      
      if($stmt = mysqli_prepare($conn, $sql)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "s", $param_shop_name);
          
          // Set parameters
          $param_shop_name = trim($_POST["email"]);
          
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
    
    

    // $shop_name=trim($_POST['shop_name']);
    // $email=trim($_POST['email']);
    // $password=trim($_POST['password']);

    $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
  
    move_uploaded_file($shop_logo_tmp,"$shops_upload_dir/$shop_logo_image_name");

    // Check input errors before inserting in database
    if(empty($shop_name_err) && empty($email_err)&& empty($password_err) && empty($confirm_password_err)){
        
        $time = time();
        $qr_code=$time;
        // Prepare an insert statement
        $sql ="INSERT INTO shop(shop_name, location, logo, qr_code, status, email, password) VALUES ('$shop_name','$shop_location','$shop_logo_image_name','$qr_code','$status','$email','$param_password')";

                
        if ($conn->query($sql) === TRUE) {
      
          header("Location: ../pages/sign-in.php");

        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        

    }
    
    // Close connection
    $conn->close();
}
?>