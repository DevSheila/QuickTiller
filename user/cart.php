<?php

require_once('../assets/php/createDb.php');
require_once('../assets/php/component.php');

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
  <!-- JQVMap -->
  <link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">
<link rel="stylesheet" href="../assets/cart.css">

</head>
<body>
    <?php
    require_once('../assets/php/header.php');
    ?>
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>Mycart</h6>
                <hr>
                <?php
            
                // $total=$total+(int)$row['product_price'];
                // $prod_id=array_column($_SESSION['cart'],'prod_id');
                //  foreach($prod_id as $item => $id){
    
                //     $sql="SELECT * FROM $tablename where id='$id'";
    
                //     $result=mysqli_query($con,$sql);
        
                //    while ($row=mysqli_fetch_array($result)) {
                //       # code...
                //     $prodname=$row['product_name'];
                //     $prodprice=$row['product_price'];
                //     $prodimg=$row['product_image'];
                //     $prodid=$row['id'];
                //     $total=$total+(int)$row['product_price'];

                  ?>
                <form action="" method="POST"class="cart-items">
                     <div class="border rounded">
                            <div class="row bg-white">
                                <div class="col-md-3 pl-0">
                                 <img src="../assets/img/cart/1.jpg" alt="image1" class="img-fluid">
                                 </div>
                                    <div class="col-md-6">
                                     <h5 class="pt-2">
                                    product name
                                     </h5>
                                     <small class="text-secondary">Seller: AQT</small>
                                     <h5 class="pt-2">Ksh2000</h5>
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
                        
                      $item=$_SESSION['cart'][$i];
                      print_r($item);
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
                      <h6>Ksh12000</h6>
                      <h6 class="text-success">FREE</h6>
                      <hr>
                      <h6>
                          Ksh12000
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
<!-- JQVMap -->
<script src="../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
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
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
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