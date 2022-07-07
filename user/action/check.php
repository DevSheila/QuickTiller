<?php
session_start();
$user_id=$_SESSION['user_id'];

    $prod_id=array_column($_SESSION['cart'],'qrvalue');
            //  print_r($prod_id);
             foreach($prod_id as $item => $id){
                
            // $que="INSERT INTO `cartitems`(`id`, `cart_id`, `product_id`, `user_id`, `shop_id`, `isbn`, `date`) VALUES ('[value-1]','[value-2]','[value-3]','$user_id','[value-5]','[value-6]','[value-7]')";
    //         $query = mysqli_query($conn,$que);
    //         $num=mysqli_num_rows($query);
    //        if($num==0)
    //   {
    //          $data[]='';
    //   }
    //     else{
    //    $row=mysqli_fetch_array($query);
             
    //     }
    
// echo $id,"<br>";
// print_r( $_SESSION['cart'][$item]);
    }



?>