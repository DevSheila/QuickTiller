<?php
include('../../admin/action/config.php');
session_start();



if (isset($_POST['add'])) {
    # code...
    $qr=$_POST['qrvalue'];
    if($qr==""){
        // echo"wewewe";
        header('location:../../barcode/scan-item.php?id="error"');
    }else{
           $store="SELECT * FROM product where `brand`='$qr'";
           $set=mysqli_query($conn,$store) or die(mysqli_error($conn));
           $num=mysqli_num_rows($set);
          if($num==0){
            //   echo"wewe";
         header('location:../../barcode/scan-item.php?id="error');
        }else{


       if(isset($_SESSION['cart'])){
          
       $item_array_id= array_column($_SESSION['cart'],"qrvalue");
     

       if(in_array($_POST['qrvalue'],$item_array_id)){
           echo "<script>alert('Product is already added in the cart...! continue shopping')<script>";
           header('location:../../barcode/scan-item.php?id=""');
       }else{

        $count=count($_SESSION['cart']);
        $item_array=array(
            'qrvalue'=>$_POST['qrvalue']
        );

        $_SESSION['cart'][$count]=$item_array;
      print_r($item_array);
        header('location:../../barcode/scan-item.php?id=""');
        

       }

     }else{
        $item_array=array(
            'qrvalue'=>$_POST['qrvalue']
        );

        $_SESSION['cart'][0]=$item_array;
      
        print_r($_SESSION['cart']);
        header('location:../../barcode/scan-item.php?id=""');
     }
}
      
    }
}


if(isset($_POST['jax'])){
    if(isset($_SESSION['cart'])){
          
        $item_array_id= array_column($_SESSION['cart'],"qrvalue");
      
 
        if(in_array($_POST['jax'],$item_array_id)){
            echo '<script>
            document.getElementById("msg").innerHTML="Product already exists in the cart";
            
            document.getElementById("qrvalue").value="";
            document.getElementById("qrvalue").innerHTML="";
            
            </script>';
        }
    }
}


//cart removing and adding
if (isset($_POST['remove'])) {
  
    if ($_GET['action']=='remove') {
      
     foreach ($_SESSION['cart'] as $key => $value ) {
         
          if ($value['qrvalue']==$_GET['id']) {
              
              echo $_GET['id'];
              unset($_SESSION['cart'][$key]);
              echo"<script>alert('Product has been removed....!);</script>";
             header('location:../../user/cart2.php?id=""');

               }
             }
          }
     }












?>
