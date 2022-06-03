<?php

require('../database/conn.php');
require_once('../assets/php/component.php');
// $qses=$_SESSION['qr'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">


</head>
<body>
<nav>
  <?php
//       $qr_c=mysqli_real_escape_string($conn,$qses);

//        $qury="SELECT * FROM shop where qr_code=' $qr_c'";
//        $query = mysqli_query($conn,$qury);
//        $num=mysqli_num_rows($query);
//       if($num==0)
//  {
//         $data[]='';
//  }
//    else{
//   $row=mysqli_fetch_array($query);
//         $data[]=array($index=$i+1,$id=$row['id'],
//         $shop=$row['shop_name'],$loc=$row['location'],$logo=$row['logo'],$qr=$row['qr_code'],
//         $stat=$row['status'],$mail=$row['email'],$pass=$row['password']);
   
// echo $shop;

      ?><?php 
      ?>
    <header id='header'>
    <nav class="navbar sticky-top navbar-expand-lg bg-purple">
    <div class="container">
    
      <img src="../assets/img/stores/naivas-logo.png"  alt="" class="rounded-circle" width="50"> 
    
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <i class="fas fa-bars"></i>
             </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto w-100 justify-content-end">
          <li class="nav-item active">
            <a class="nav-link" href="../user/user-dashboard.php"style="color:white;">Home <span class="sr-only">(current)</span></a>
          </li>
            <li class="nav-link">
            <a href="../user/cart.php" >

<h5 class="px-5 cart"><i class="fas fa-shopping-cart"></i>Cart

<?php
$total=0;
if (isset($_SESSION['cart'])) { 

$count=count($_SESSION['cart']);?>

<span id="cart_count" class="text-warning bg-light"><?php echo $count;
?></span>
<?php
}else{
echo'   <span id="cart_count" class="text-warning bg-light">0</span>
';
  
}
?> 

</h5>
</a>
      
        </ul>
      </div>
    </div>
  </nav>
    <div class="curve bg-purple"  ></div>
</header>
        
        
    </nav>
    
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
               
                <hr>
                <?php
            
                
                $prod_id=array_column($_SESSION['cart'],'qrvalue');
                // print_r($prod_id);
                 foreach($prod_id as $item => $id){

                  //  echo $id;
    
                    $qury="SELECT * FROM product where brand='$id'";
    
                    $result=mysqli_query($conn,$qury);
        
                   while ($row=mysqli_fetch_array($result)) {
                      # code...
                    $prodname=$row['product_name'];
                    $duka=$row['shop_id'];
                    $prodprice=$row['price'];
                    $prodimg=$row['product_image'];
                    $prodid=$row['id'];
                    $total=$total+(int)$row['price'];
              $shp="SELECT * From shop where id ='$duka' ";
                    // echo $prodname,"<br>",$total;
                    $res=mysqli_query($conn,$shp);
                    while($duk=mysqli_fetch_array($res)){
                      $shop=$duk['shop_name'];

                   ?>
                <form action="../assets/php/component.php?action=remove&id=<?php echo $id;?>" method="POST"class="cart-items">
                     <div class="border rounded">
                            <div class="row bg-white">
                                <div class="col-md-3 pl-0">
                                 <img src="../assets/img/cart/<?php echo $prodimg;?>" alt="image1" class="img-fluid">
                                 </div>
                                    <div class="col-md-6">
                                     <h5 class="pt-2">
                                    <?php echo $prodname;?>
                                     </h5>
                                     <small class="text-secondary">Seller: <?php echo $shop; ?></small>
                                     <h5 class="pt-2">Ksh <?php echo $prodprice ;?></h5>
                                     
                                     <button type="submit" class="btn btn-warning">Save for Later</button>
                                     <button type="submit" class="btn btn-danger mx-2" name="remove" value="remove">Remove</button>

                                    </div>
                                  <div class="col-md-3 py-5" >
                                    <div>
                                      <button type="button" class="btn bg-light rounded-circle"> <i class="fa fa-minus"></i></button>
                                      <input type="text" value="1" class="form-control w-25 d-inline">
                                      <button type="button" class="btn bg-light rounded-circle"> <i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                 </form>
                 <?php }}} ?>
               
                   
                  
              
                  </div>
                </div>
                 <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">



        
             <div class="pt-4">
                 <H6>Price Details</H6>
                 <hr>
                 <div class="row price-details">
                 <div class="col-md-6">
                    <?php
                    
                    if(isset($_SESSION['cart'])){
                      $count=count($_SESSION['cart']);
                      for ($i=0; $i <$count ; $i++) { 
                        # code...
                        
                      // $item=$_SESSION['cart'][$i];
                      // print_r($item);
                      }
                       
                        echo"<h6>Price($count items)<h6>";
                    }else{
                       echo"<h6>Price(1items)<h6>";
                    
                    }
                 ?>
                 <h6>Delivery Charges</h6>
                 <h6>Amount Payable</h6>
                 </div>

                  <div class="col-md-6">
                      <h6>Ksh<?php echo $total;?></h6>
                      <h6 class="text-success">FREE</h6>
                      <hr>
                      <h6>
                          Ksh<?php echo $total;?>
                      </h6>

                  </div>
                </div>
                <div class="pt-5">
                <div class="col-md-6 pl-4">
                

                <button type="submit" class="btn bg-purple" data-toggle="modal" data-target="#modal-lg" >CHECKOUT</button>
                      
                </div> 
                <div class="pb-3"></div>
            </div>
        </div>
    </div>
</div>
<?php require("../assets/cart/checkout.php");?>
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../assets/plugins/sparklines/sparkline.js"></script>

<!-- daterangepicker -->
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets/dist/js/pages/dashboard.js"></script>
<script>
// window.onload = function () {
//   var span = document.createElement('span');

//   span.className = 'fa';
//   span.style.display = 'none';
//   document.body.insertBefore(span, document.body.firstChild);
  
//   alert(window.getComputedStyle(span, null).getPropertyValue('font-family'));
    
//   document.body.removeChild(span);
// };
</script>

</body>
</html>