<?php
include("../action/config.php");
session_start();


date_default_timezone_set("Africa/Nairobi");

$_SESSION['productId'] =0;
$date=date("F j, Y, g:i a");
$shop_id =$_SESSION['admin_id'];
$shop_qr=$_SESSION['admin_qr'];

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
            $products_dir = "../uploads/products/";
           

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
                    $isn_status='available';
                    $isbn=time();

                    $sql ="INSERT INTO product(shop_id, shop_qr_code, product_name, category, brand, quantity, price, otherQualities, product_image, date) VALUES ($shop_id,'$shop_qr','$product_name','$product_category','$product_brand','$product_quantity',$product_price,'$product_qualities','$product_image','$date')";
                  
                    $product_sql = "SELECT * FROM product WHERE shop_id =$shop_id";
                    $product_result = mysqli_query($conn,$product_sql);
                    $product_count = mysqli_num_rows($product_result);
                    $product_id=0;
                    while( $row = mysqli_fetch_array($product_result,MYSQLI_ASSOC)){
                      $product_id= $row['id']; 
                    }

                    $sql2="INSERT INTO isbn(product_id, isbn, status, date) VALUES ($product_id,'$isbn','$product_status','$date')";
                    if (($conn->query($sql)) && ($conn->query($sql2))) {
                  
                      header("Location: ../pages/listProduct.php");
                      echo "success";

                    } else {
                      echo "Error: " . $sql . "<br>" . $conn->error;
                      echo "Error: " . $sql2 . "<br>" . $conn->error;

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
    $_SESSION['product_id'] =$id;

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
              $_SESSION['product_id'] = $row['id'];
              $_SESSION['product_name'] = $row['product_name'];
              $_SESSION['product_qualities']=$row['otherQualities'];
              $_SESSION['product_brand'] =$row['brand'];
              $_SESSION['product_category'] =$row['category'];
              $_SESSION['product_quantity'] =$row['quantity'];
              $_SESSION['product_price'] =$row['price'];
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

        $id = $_POST['product_id'];
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
            // $_SESSION['msg2']="File size must be less than or equal to  4 MB'.";
        }if(empty($errors)==true){
            $products_dir = "../uploads/products";
            $product_image_session = "$products_dir/$product_image_image_name";
            move_uploaded_file($product_image_tmp,"$products_dir/$product_image_image_name");
            $date = date("l jS \of F Y h:i:s A");

            $product_name =mysqli_real_escape_string($conn,$_POST['name']) ;
            $product_brand =mysqli_real_escape_string($conn,$_POST['brand']) ;
            $product_category =mysqli_real_escape_string($conn,$_POST['category']) ;
            $product_quantity =mysqli_real_escape_string($conn,$_POST['quantity']) ;
            $product_qualities =mysqli_real_escape_string($conn,$_POST['qualities']) ;
            $product_price =mysqli_real_escape_string($conn,$_POST['price']) ;
            $product_image =mysqli_real_escape_string($conn,$product_image_image_name) ;
  
      
  
                             // Check connection
                    if (!$conn ||mysqli_connect_errno()) {
                       echo("Connection failed: " . mysqli_connect_error());
                    }else{
                       if($_SERVER["REQUEST_METHOD"] == "POST") {
                      
                        $sql=
                        //  "UPDATE products SET name='$productName',path='$productPath',description='$productDescription',image='$product_Image',year='$productYear' WHERE  id = $id";
                         
                       "UPDATE product SET shop_id=$shop_id,shop_qr_code='$shop_qr',product_name='$product_name',category='$product_category',brand='$product_brand',quantity='$product_quantity'
                       ,price=$product_price,otherQualities='$product_qualities',product_image='$product_image',date='$date' WHERE id = $id";
                           if ($conn->query($sql) === TRUE) {
                         
                             header("Location:../pages/listProduct.php");
   
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
   
          
      
  

//>>>>>>>>>>>>>>>  DELETE RECORD <<<<<<<<<<<

if(isset($_GET['delete'])){
  $id = $_GET['delete'];

 
          $sql = "SELECT * FROM product WHERE id= $id";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
          $count = mysqli_num_rows($result);
          
        
          if($count == 1) {
            $_SESSION['image'] =$row['product_image'];
           
          }else{
            
              echo "Unsuccessful";
          }

         $product_image_dir = "../uploads/products/".$_SESSION['image'];

  

      // Use unlink() function to delete a file
      if (unlink($product_image_dir)) {
        
        $sql2 ="DELETE FROM product WHERE id= $id ";

        if ($conn->query($sql2) === TRUE) {
    
        echo "Record Successfully deleted";
    
        mysqli_query($conn,$sql2);
    
        header("Location: ../pages/listProduct.php");
        }else{
            
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }

      }else {

        echo ("$product_image_dir cannot be deleted due to an error");

      }

}

?>