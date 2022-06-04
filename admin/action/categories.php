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
    $category_name =mysqli_real_escape_string($conn,$_POST['category_name']) ;

    // Check connection
    if (!$conn ||mysqli_connect_errno()) {
      echo("Connection failed: " . mysqli_connect_error());
    }else{
      if($_SERVER["REQUEST_METHOD"] == "POST") {

            $sql = "SELECT * FROM category WHERE(shop_id =$shop_id)AND (category_name='$category_name')";
            $result = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($result);
            if($count == 0){
              //escaping
              $sql2 = "INSERT INTO category(shop_id,category_name) VALUES ($shop_id,'$category_name')";
              if ($conn->query($sql2) === TRUE) {
                header("Location: ../pages/listCategory.php");
                echo "success";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
            }else{
              echo "Category exists";
            }
            // echo $count;
            // echo $category_name;
            // echo $shop_id;
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
  $id = $_POST['category_id'];


  $category_name =mysqli_real_escape_string($conn,$_POST['category_name']) ;


            // Check connection
  if (!$conn ||mysqli_connect_errno()) {
      echo("Connection failed: " . mysqli_connect_error());
  }else{
      if($_SERVER["REQUEST_METHOD"] == "POST") {
    
      $sql= "UPDATE category SET shop_id='$shop_id',category_name='$category_name' WHERE  id = $id";
        
      
          if ($conn->query($sql) === TRUE) {
        
            header("Location:../pages/listCategory.php");

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

        $delete_category=" ";
        // get category name
        $sql_category = "SELECT * FROM category WHERE id=$id";
        $result_category = mysqli_query($conn,$sql_category);
        $count_category = mysqli_num_rows($result_category);
        $serial = 0;
        while( $row = mysqli_fetch_array($result_category,MYSQLI_ASSOC)){
          $delete_category=$row['category_name'];
          $serial ++;
        }
       

       echo $delete_category;
        // delete category and of current shop
        $sql ="DELETE FROM category WHERE id= $id ";

        if ($conn->query($sql) === TRUE) {
              mysqli_query($conn,$sql);
              // delete products of the specific shops with that  category
              $sql2 ="DELETE FROM product WHERE (shop_id= $shop_id) AND (category='$delete_category')";

              if ($conn->query($sql2) === TRUE) {
          
              echo "Record Successfully deleted";
          
              mysqli_query($conn,$sql2);
          
              header("Location: ../pages/listCategory.php");
              }else{
                  
                  echo "Error: " . $sql2 . "<br>" . $conn->error;
              }
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
}

?>