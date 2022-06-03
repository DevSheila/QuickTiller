<?php
include("../action/config.php");
session_start();


date_default_timezone_set("Africa/Nairobi");

// $_SESSION['categoryId'] =0;
$_SESSION['category_id'] = 0;
$_SESSION['category_name'] = '';
$_SESSION['category_shop_id'] = '';
$shop_id =$_SESSION['admin_id'];

//>>>>>>>>>>>>>>>  CREATE RECORD <<<<<<<<<<<
if(isset($_POST['add'])){
    $category_name =mysqli_real_escape_string($conn,$_POST['name']) ;

    // Check connection
    if (!$conn ||mysqli_connect_errno()) {
      echo("Connection failed: " . mysqli_connect_error());
    }else{
      if($_SERVER["REQUEST_METHOD"] == "POST") {

          //escaping
          $category_name =mysqli_real_escape_string($conn,$_POST['category_name']) ;

          $category_Image =mysqli_real_escape_string($conn,$category_image_image_name) ;

          $sql = "INSERT INTO category(shop_id,category_name, category_image) VALUES ($shop_id,'$category_name','')";
      
          
          if ($conn->query($sql) === TRUE) {
        
            header("Location: ../pages/listCategory.php");
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
    $_SESSION['category_id'] =$id;

    $update = true;
      // Check connection
      if (!$conn ||mysqli_connect_errno()) {
        echo("Connection failed: " . mysqli_connect_error());
      }else{
            $sql= "SELECT * FROM category WHERE id= $id";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
             
            $count = mysqli_num_rows($result);
            
          
            if($count == 1) {

              $_SESSION['update'] = 'true';
              $_SESSION['category_id'] = $row['id'];
              $_SESSION['category_name'] = $row['category_name'];
              $_SESSION['category_shop_id'] = $row['shop_id'];
              header("Location: ../pages/editCategory.php");
            }else{
              
                echo "Unsuccessful";
              }
     
      }
  }


      //>>>>>>>>>>>>>>>  UPDATE RECORD <<<<<<<<<<<

if(isset($_POST['update'])){
  $time = time();
  $errors= array();
  $id = $_POST['id'];


  $category_name =mysqli_real_escape_string($conn,$_POST['category_name']) ;


            // Check connection
  if (!$conn ||mysqli_connect_errno()) {
      echo("Connection failed: " . mysqli_connect_error());
  }else{
      if($_SERVER["REQUEST_METHOD"] == "POST") {
    
      $sql= "UPDATE category SET shop_id='$shop_id',category_name='$category_name' WHERE  id = $id";
        
      
          if ($conn->query($sql) === TRUE) {
        
            header("Location:../pages/listcategory.php");

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

      $sql= "SELECT * FROM categorys WHERE id= $id";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
           
          $count = mysqli_num_rows($result);
          
        
          if($count == 1) {
            $_SESSION['image'] =$row['image'];
           
          }else{
            
              echo "Unsuccessful";
          }

  $file_pointer = "../uploads/category/".$_SESSION['image']."";

      // Use unlink() function to delete a file
      if (!unlink($file_pointer)) {
          echo ("$file_pointer cannot be deleted due to an error");
      }
      else {

        $sql ="DELETE FROM categorys WHERE id= $id ";

        if ($conn->query($sql) === TRUE) {
    
        echo "Record Successfully deleted";
    
        mysqli_query($conn,$sql);
    
        header("Location: ../pages/listcategory.php");
        }else{
            
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }

}

?>