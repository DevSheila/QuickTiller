<?php
include("../action/config.php");
session_start();


date_default_timezone_set("Africa/Nairobi");

// $_SESSION['isbnId'] =0;
$_SESSION['isbn_id'] = 0;
$_SESSION['isbn'] = '';
$_SESSION['shop_id'] = '';

$_SESSION['isbn_id'] = 0;
$_SESSION['isbn_value'] = '';
$_SESSION['isbn_status'] = '';
$_SESSION['isbn_product_id'] ='';
$_SESSION['isbn_date'] = '';

$shop_id =$_SESSION['admin_id'];

$date=date("F j, Y, g:i a");


//>>>>>>>>>>>>>>>  CREATE RECORD <<<<<<<<<<<
if(isset($_POST['add'])){
    $isbn =mysqli_real_escape_string($conn,$_POST['qrvalue']) ;
    $product_id=mysqli_real_escape_string($conn,$_POST['product_id']);

    // Check connection
    if (!$conn ||mysqli_connect_errno()) {
      echo("Connection failed: " . mysqli_connect_error());
    }else{
      if($_SERVER["REQUEST_METHOD"] == "POST") {
              //escaping
              $sql2 ="INSERT INTO isbn(product_id, isbn, status, date)VALUES ('$product_id','$isbn','available','$date')";
              if ($conn->query($sql2) === TRUE) {
                header("Location: ../pages/listItem.php");
                echo "success";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
           
          $conn->close();
        }
      }
} 

//>>>>>>>>>>>>>>>  EDIT RECORD <<<<<<<<<<<

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $_SESSION['isbn_id'] =$id;

    $update = true;
      // Check connection
      if (!$conn ||mysqli_connect_errno()) {
        echo("Connection failed: " . mysqli_connect_error());
      }else{
            $sql= "SELECT * FROM isbn WHERE id= $id";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
            if($count == 1) {
              $_SESSION['update'] = 'true';
              $_SESSION['isbn_id'] = $row['id'];
              $_SESSION['isbn_value'] = $row['isbn'];
              $_SESSION['isbn_status'] = $row['status'];
              $_SESSION['isbn_product_id'] = $row['product_id'];
              $_SESSION['isbn_date'] = $row['date'];

              header("Location: ../pages/editItem.php");
            }else{
                echo "Unsuccessful";
              }
      }
  }
      //>>>>>>>>>>>>>>>  UPDATE RECORD <<<<<<<<<<<

if(isset($_POST['update'])){
  $time = time();
  $errors= array();
  $id = $_POST['isbn_id'];

  $isbn=mysqli_real_escape_string($conn,$_POST['qrvalue']);
  $isbn_product_id=mysqli_real_escape_string($conn,$_POST['isbn_product_id']);
  $isbn_date=mysqli_real_escape_string($conn,$_POST['isbn_date']);
  $isbn_status=mysqli_real_escape_string($conn,$_POST['isbn_status']);

            // Check connection
  if (!$conn ||mysqli_connect_errno()) {
      echo("Connection failed: " . mysqli_connect_error());
  }else{
      if($_SERVER["REQUEST_METHOD"] == "POST") {
    
      $sql=
      // "UPDATE isbn SET shop_id='$shop_id',isbn='$isbn_value' WHERE  id = $id";
      "UPDATE isbn SET product_id='$isbn_product_id',isbn='$isbn',status='$isbn_status',date='$isbn_date' WHERE id = $id";
        
      
          if ($conn->query($sql) === TRUE) {
        
            header("Location:../pages/listItem.php");

          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          
          $conn->close();
        }
  }
     
}

          
      
  

//>>>>>>>>>>>>>>>  DELETE RECORD <<<<<<<<<<<

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
              // delete isbn and of current shop

              $sql2 ="DELETE FROM isbn WHERE id= $id ";


              if ($conn->query($sql2) === TRUE) {
          
              echo "Record Successfully deleted";
          
              mysqli_query($conn,$sql2);
          
              header("Location: ../pages/listItem.php");
              }else{
                  
                  echo "Error: " . $sql2 . "<br>" . $conn->error;
              }
      
}

?>