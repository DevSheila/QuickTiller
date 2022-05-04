<?php

// require_once('php/createDb.php');
// require_once('./php/component.php');
//create nstance of a class
// $database=new createDb("productdb","producttb");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <!-- Favicons -->
  <link href="assets/assets/img/cart/favicon.png" rel="icon">
  <link href="assets/assets/img/cart/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<link rel="stylesheet" href="./assets/css/cart.css">

</head>
<body>
    <?php
    ?>
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>Mycart</h6>
                <hr>
                <?php
            
            //     $total=$total+(int)$row['product_price']
            //       ?>
                <form action="" method="POST"class="cart-items">
                     <div class="border rounded">
                            <div class="row bg-white">
                                <div class="col-md-3 pl-0">
                                 <img src="assets/img/cart/1.jpg" alt="image1" class="img-fluid">
                                 </div>
                                    <div class="col-md-6">
                                     <h5 class="pt-2">
                                      Product1
                                     </h5>
                                     <small class="text-secondary">Seller: AQT</small>
                                     <h5 class="pt-2">Ksh2000</h5>
                                     <button type="submit" class="btn btn-warning">Save for Later</button>
                                     <button type="submit" class="btn btn-danger mx-2" name="remove" value="remove">Remove</button>

                                    </div>
                                  <div class="col-md-3 py-5" >
                                    <div>
                                      <button type="button" class="btn bg-light rounded-circle"> <i class="fas fa-minus"></i></button>
                                      <input type="text" value="1" class="form-control w-25 d-inline">
                                      <button type="button" class="btn bg-light rounded-circle"> <i class="fas fa-plus"></i></button>
                                    </div>
                             </div>
                            
                            </div>
                         </div>
                 </form>
                 <form action="" method="POST"class="cart-items">
                     <div class="border rounded">
                            <div class="row bg-white">
                                <div class="col-md-3 pl-0">
                                 <img src="assets/img/cart/3.jpg" alt="image1" class="img-fluid">
                                 </div>
                                    <div class="col-md-6">
                                     <h5 class="pt-2">
                                      Product1
                                     </h5>
                                     <small class="text-secondary">Seller: AQT</small>
                                     <h5 class="pt-2">Ksh3000</h5>
                                     <button type="submit" class="btn btn-warning">Save for Later</button>
                                     <button type="submit" class="btn btn-danger mx-2" name="remove" value="remove">Remove</button>

                                    </div>
                                  <div class="col-md-3 py-5" >
                                    <div>
                                      <button type="button" class="btn bg-light rounded-circle"> <i class="fas fa-minus"></i></button>
                                      <input type="text" value="1" class="form-control w-25 d-inline">
                                      <button type="button" class="btn bg-light rounded-circle"> <i class="fas fa-plus"></i></button>
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
                    
                    // if(isset($_SESSION['cart'])){
                    //     $count=count($_SESSION['cart']);
                    //     echo"<h6>Price($count items)<h6>";
                    // }else{
                       echo"<h6>Price(1items)<h6>";
                    
                    
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
                <div class="col-md-6">
                

                <button type="submit" class="btn btn-info">CHECKOUT</button>
                      
                </div> 
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

</body>
</html>