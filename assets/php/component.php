<?php
session_start();



if (isset($_POST['add'])) {
    # code...
    if(isset($_SESSION['cart'])){
          
       $item_array_id= array_column($_SESSION['cart'],"qrvalue");
     

       if(in_array($_POST['qrvalue'],$item_array_id)){
           echo "<script>alert('Product is already added in the cart...!')<script>";
           header('location:../../user/cart.php');
       }else{

        $count=count($_SESSION['cart']);
        $item_array=array(
            'qrvalue'=>$_POST['qrvalue']
        );

        $_SESSION['cart'][$count]=$item_array;
print_r($item_array);
header('location:../../user/cart.php');
        

       }

    }else{
        $item_array=array(
            'qrvalue'=>$_POST['qrvalue']
        );

        $_SESSION['cart'][0]=$item_array;
      
        print_r($_SESSION['cart']);
        header('location:../../user/cart.php');
    }
}
//cart removing and adding
if (isset($_POST['remove'])) {
  
    if ($_GET['action']=='remove') {
        
        foreach ($_SESSION['cart'] as $key => $value ) {
           
            if ($value['qrvalue']==$_GET['id']) {
                
                echo $_GET['id'];
                unset($_SESSION['cart'][$key]);
                echo"<script>alert('Product has been removed....!)</script>";
               

            }
        }
    }
}
















?>
