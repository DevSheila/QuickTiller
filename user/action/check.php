<?php
include("../../admin/action/config.php");

session_start();
$user_id=$_SESSION['user_id'];
$date=date("F-j-Y");
$cart_id=$date."-".$user_id;
    $prod_id=array_column($_SESSION['cart'],'qrvalue');
          
             foreach($prod_id as $item => $id){
                $pro="SELECT * FROM `product` WHERE brand='$id'";
                $query = mysqli_query($conn,$pro);
                $num=mysqli_num_rows($query);
            // $que="INSERT INTO `cartitems`(`id`, `cart_id`, `product_id`, `user_id`, `shop_id`, `isbn`, `date`) VALUES ('','[value-2]','[value-3]','$user_id','[value-5]','[value-6]','[value-7]')";
    //         $query = mysqli_query($conn,$que);
    //         $num=mysqli_num_rows($query);
           if($num==0)
      {
             $data[]='';
      }
        else{
    //    echo "Hi Mutuku";
       $row=mysqli_fetch_array($query);
       $id=$row['id'];
       $shop_id=$row['shop_id'];
       $shop_img=$row['product_image'];
    //    echo $shop_img;
       $sbn="SELECT* FROM `isbn` WHERE product_id='$id'";
       $quer = mysqli_query($conn,$sbn);
       $nu=mysqli_num_rows($quer);
       if($nu==0)
       {
             echo'why???😢😢😢😢😢😢';
       }
         else{
            $row=mysqli_fetch_array($quer);
            $isbn=$row['isbn'];
            // echo $id,",$user_id;
            $que="INSERT INTO `cartitems`(`id`, `cart_id`, `product_id`, `user_id`, `shop_id`, `isbn`, `date`) VALUES ('','$cart_id','$id','$user_id','$shop_id','$isbn','$date')";
            $qur = mysqli_query($conn,$que) or die(mysqli_error($conn));
            
         }
    //    $que="INSERT INTO `cartitems`(`id`, `cart_id`, `product_id`, `user_id`, `shop_id`, `isbn`, `date`) VALUES ('','$cart_id','$id','$user_id','$shop_id','[value-6]','$date')";
    

        }
    
// echo $pro,"<br>";
// print_r( $_SESSION['cart'][$item]);
    }
// echo $cart_id;


?>