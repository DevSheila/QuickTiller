<?php
require('../database/conn.php');
if(isset($_POST['add'])){
    $qr=$_POST['qrvalue'];
    // echo $qr;

    $sd="SELECT product_name FROM product where brand='$qr'";
    $qr=mysqli_query($conn,$sd) or die(mysqli_error($conn));
print_r($qr);

// header('location:../user/cart.php?id="'.$sd.'"');




}


?>