<?php
include("../action/config.php");
session_start();


date_default_timezone_set("Africa/Nairobi");

$_SESSION['productId'] =0;
$date=date("F j, Y, g:i a");
//>>>>>>>>>>>>>>>  CREATE RECORD <<<<<<<<<<<
   

   
if(isset($_POST['add'])){

        $time = time();
        $errors= array();


          //product image
          $product_image_name = $_FILES['image']['name'];
          $product_image_size =$_FILES['image']['size'];
          $product_image_tmp =$_FILES['image']['tmp_name'];
          $product_image_type=$_FILES['image']['type'];
          // $product_image_ext=strtolower(end(explode('.',$_FILES['product_image']['name'])));
          $product_image_image_name = $time."_".$product_image_name;
          $extensions= array("jpg","png");

        if(( ($product_image_size > 4097152) )){
            $errors[]='File size must be less than or equal to  4 MB';
            $_SESSION['msg2']="File size must be less than or equal to  4 MB'.";
        }
        if(empty($errors)==true){
            $products_dir = "../uploads/products";
           

            $product_image_session = "$products_dir/$product_image_image_name";
            move_uploaded_file($product_image_tmp,"$products_dir/$product_image_image_name");
            $date = date("l jS \of F Y h:i:s A");
          
           
        
    
                      // Check connection
              if (!$conn ||mysqli_connect_errno()) {
                echo("Connection failed: " . mysqli_connect_error());
              }else{
                if($_SERVER["REQUEST_METHOD"] == "POST") {

                    //escaping
                    $product_name =mysqli_real_escape_string($conn,$_POST['name']) ;
                    $product_brand =mysqli_real_escape_string($conn,$_POST['brand']) ;
                    $product_category =mysqli_real_escape_string($conn,$_POST['category']) ;
                    $product_quantity =mysqli_real_escape_string($conn,$_POST['quantity']) ;
                    $product_qualities =mysqli_real_escape_string($conn,$_POST['qualities']) ;
                    $product_price =mysqli_real_escape_string($conn,$_POST['price']) ;

                    $product_image =mysqli_real_escape_string($conn,$product_image_image_name) ;
                    $shop_qr_code='';

                    $sql ="INSERT INTO product(shop_id, shop_qr_code, product_name, category, brand, quantity, price, otherQualities, product_image, date) VALUES (1,'$shop_qr_code','$product_name','$product_category','$product_brand','$product_quantity',$product_price,'$product_qualities','$product_image','$date')";
                    if ($conn->query($sql) === TRUE) {
                  
                      header("Location: ../pages/listProduct.php");
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
    $_SESSION['productId'] =$id;

    $update = true;
      // Check connection
      if (!$conn ||mysqli_connect_errno()) {
        echo("Connection failed: " . mysqli_connect_error());
      }else{
            $sql= "SELECT * FROM product WHERE id= $id";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
             
            $count = mysqli_num_rows($result);
            
          
            if($count == 1) {

              $_SESSION['update'] = 'true';
              $_SESSION['id'] = $row['id'];
              $_SESSION['product_name'] = $row['product_name'];
              $_SESSION['otherQualities']=$row['otherQualities'];
              $_SESSION['brand'] =$row['brand'];
              $_SESSION['category'] =$row['category'];
              $_SESSION['quantity'] =$row['quantity'];
              $_SESSION['price'] =$row['price'];
              header("Location: ../pages/editProduct.php");

          
            

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
          //product image
          $product_image_name = $_FILES['image']['name'];
          $product_image_size =$_FILES['image']['size'];
          $product_image_tmp =$_FILES['image']['tmp_name'];
          $product_image_type=$_FILES['image']['type'];
          // $product_image_ext=strtolower(end(explode('.',$_FILES['product_image']['name'])));
          $product_image_image_name = $time."_".$product_image_name;
          $extensions= array("jpg","png");

        if(( ($product_image_size > 4097152) )){
            $errors[]='File size must be less than or equal to  4 MB';
            $_SESSION['msg2']="File size must be less than or equal to  4 MB'.";
        }if(empty($errors)==true){
            $products_dir = "../uploads/product";
           

            $product_image_session = "$products_dir/$product_image_image_name";
            move_uploaded_file($product_image_tmp,"$products_dir/$product_image_image_name");
            $date = date("l jS \of F Y h:i:s A");

            $productName =mysqli_real_escape_string($conn,$_POST['name']) ;
            $productPath =mysqli_real_escape_string($conn,$_POST['path']) ;
            $productDescription =mysqli_real_escape_string($conn,$_POST['description']) ;
            $productYear =mysqli_real_escape_string($conn,$_POST['year']) ;
            $product_Image =mysqli_real_escape_string($conn,$product_image_image_name) ;
  
      
  
                             // Check connection
                    if (!$conn ||mysqli_connect_errno()) {
                       echo("Connection failed: " . mysqli_connect_error());
                    }else{
                       if($_SERVER["REQUEST_METHOD"] == "POST") {
                      
                        $sql= "UPDATE products SET name='$productName',path='$productPath',description='$productDescription',image='$product_Image',year='$productYear' WHERE  id = $id";
                         
                       
                           if ($conn->query($sql) === TRUE) {
                         
                             header("Location:../pages/listproduct.php");
   
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

      $sql= "SELECT * FROM products WHERE id= $id";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
           
          $count = mysqli_num_rows($result);
          
        
          if($count == 1) {
            $_SESSION['image'] =$row['image'];
           
          }else{
            
              echo "Unsuccessful";
          }

  $file_pointer = "../uploads/product/".$_SESSION['image']."";

      // Use unlink() function to delete a file
      if (!unlink($file_pointer)) {
          echo ("$file_pointer cannot be deleted due to an error");
      }
      else {

        $sql ="DELETE FROM products WHERE id= $id ";

        if ($conn->query($sql) === TRUE) {
    
        echo "Record Successfully deleted";
    
        mysqli_query($conn,$sql);
    
        header("Location: ../pages/listproduct.php");
        }else{
            
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }

}

?>