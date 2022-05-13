<?php
include("../action/config.php");
session_start();


date_default_timezone_set("Africa/Nairobi");

$_SESSION['categoryId'] =0;
//>>>>>>>>>>>>>>>  CREATE RECORD <<<<<<<<<<<
   

   
if(isset($_POST['add'])){

        $time = time();
        $errors= array();


          //category image
          $category_image_name = $_FILES['image']['name'];
          $category_image_size =$_FILES['image']['size'];
          $category_image_tmp =$_FILES['image']['tmp_name'];
          $category_image_type=$_FILES['image']['type'];
          // $category_image_ext=strtolower(end(explode('.',$_FILES['category_image']['name'])));
          $category_image_image_name = $time."_".$category_image_name;
          $extensions= array("jpg","png");

        if(( ($category_image_size > 4097152) )){
            $errors[]='File size must be less than or equal to  4 MB';
            $_SESSION['msg2']="File size must be less than or equal to  4 MB'.";
        }
        if(empty($errors)==true){
            $categories_dir = "../uploads/categories";
           

            $category_image_session = "$categories_dir/$category_image_image_name";
            move_uploaded_file($category_image_tmp,"$categories_dir/$category_image_image_name");
            $date = date("l jS \of F Y h:i:s A");
          
           
        
    
                      // Check connection
              if (!$conn ||mysqli_connect_errno()) {
                echo("Connection failed: " . mysqli_connect_error());
              }else{
                if($_SERVER["REQUEST_METHOD"] == "POST") {

                    //escaping
                    $category_name =mysqli_real_escape_string($conn,$_POST['category_name']) ;
      
                    $category_Image =mysqli_real_escape_string($conn,$category_image_image_name) ;

                    $sql = "INSERT INTO category(shop_id,category_name, category_image) VALUES (1,'$category_name','$category_Image')";
                
                    
                    if ($conn->query($sql) === TRUE) {
                  
                      header("Location: ../pages/listCategory.php");
                    echo "success";

                    } else {
                      echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    
                    $conn->close();
                  
                  }
                }
            
        }else{
            print_r($errors);
          
         }
}
//>>>>>>>>>>>>>>>  EDIT RECORD <<<<<<<<<<<

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $_SESSION['categoryId'] =$id;

    $update = true;
      // Check connection
      if (!$conn ||mysqli_connect_errno()) {
        echo("Connection failed: " . mysqli_connect_error());
      }else{
            $sql= "SELECT * FROM categorys WHERE id= $id";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
             
            $count = mysqli_num_rows($result);
            
          
            if($count == 1) {

              $_SESSION['update'] = 'true';
              $_SESSION['id'] = $row['id'];
              $_SESSION['name'] = $row['name'];
              $_SESSION['path']=$row['path'];
              $_SESSION['description'] =$row['description'];
              $_SESSION['year'] =$row['year'];
              $_SESSION['image'] =$row['image'];
              header("Location: ../pages/editcategory.php");

          
            

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
          //category image
          $category_image_name = $_FILES['image']['name'];
          $category_image_size =$_FILES['image']['size'];
          $category_image_tmp =$_FILES['image']['tmp_name'];
          $category_image_type=$_FILES['image']['type'];
          // $category_image_ext=strtolower(end(explode('.',$_FILES['category_image']['name'])));
          $category_image_image_name = $time."_".$category_image_name;
          $extensions= array("jpg","png");

        if(( ($category_image_size > 4097152) )){
            $errors[]='File size must be less than or equal to  4 MB';
            $_SESSION['msg2']="File size must be less than or equal to  4 MB'.";
        }if(empty($errors)==true){
            $categories_dir = "../uploads/category";
           

            $category_image_session = "$categories_dir/$category_image_image_name";
            move_uploaded_file($category_image_tmp,"$categories_dir/$category_image_image_name");
            $date = date("l jS \of F Y h:i:s A");

            $category_name =mysqli_real_escape_string($conn,$_POST['name']) ;
            $categoryPath =mysqli_real_escape_string($conn,$_POST['path']) ;
            $categoryDescription =mysqli_real_escape_string($conn,$_POST['description']) ;
            $categoryYear =mysqli_real_escape_string($conn,$_POST['year']) ;
            $category_Image =mysqli_real_escape_string($conn,$category_image_image_name) ;
  
      
  
                             // Check connection
                    if (!$conn ||mysqli_connect_errno()) {
                       echo("Connection failed: " . mysqli_connect_error());
                    }else{
                       if($_SERVER["REQUEST_METHOD"] == "POST") {
                      
                        $sql= "UPDATE categorys SET name='$category_name',path='$categoryPath',description='$categoryDescription',image='$category_Image',year='$categoryYear' WHERE  id = $id";
                         
                       
                           if ($conn->query($sql) === TRUE) {
                         
                             header("Location:../pages/listcategory.php");
   
                           } else {
                             echo "Error: " . $sql . "<br>" . $conn->error;
                           }
                           
                           $conn->close();
                         }
                       }
                    }
        }else{
                   print_r($errors);
                 
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