<?php
// include_once("../admin/action/config.php");
include_once('../admin/action/config.php');
session_start();
if((isset($_SESSION["loggedin"])) && ($_SESSION["loggedin"] === true)){
 header("location: ./action/sign-in.php");
 exit;
}
 $id=$_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../admin/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../admin/assets/img/favicon.png">
  <title>
  QUICK TILLER DASHBOARD
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../admin/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../admin/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../admin/assets/css/nucleo-svg.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../assets/plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../assets/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../assets/cart/qr.css">
  
  <!-- CSS Files -->
  <link id="pagestyle" href="../admin/assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>

<body class="g-sidenav-show bg-gray-100">
<?php
  $user="SELECT * FROM user where `id`=$id";
  $user_details=mysqli_query($conn,$user);
  $num=mysqli_num_rows($user_details);
  if($num==0)
{
   echo"<script>alert('No vailable people')</script>";
}
else{
for($i=0; $i<$num; $i++)
{
  $row=mysqli_fetch_array($user_details);
  $data[]=array($index=$i+1,$id=$row['id'],
  $name=$row['user_name'],$full_name=$row['full_name'],$img=$row['user_image'],$mail=$row['email'],
  $phone=$row['phone'],$address=$row['address'],$pass=$row['password'],$date=$row['date']);
 
  
  ?>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.php " target="_blank">
        <img src="../admin/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">QUICK TILLER DASHBOARD</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        
        
  
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link  active" href="./profile.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>customer-support</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(1.000000, 0.000000)">
                        <path class="color-background opacity-6" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"></path>
                        <path class="color-background" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"></path>
                        <path class="color-background" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="./listProduct.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>credit-card</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(453.000000, 454.000000)">
                        <path class="color-background opacity-6" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"></path>
                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Products</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="action/logout.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>document</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(154.000000, 300.000000)">
                        <path class="color-background opacity-6" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"></path>
                        <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Log Out</span>
          </a>
        </li>
        
      </ul>
    </div>
    <div class="sidenav-footer  ">
 
    </div>
  </aside>
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2">
        <div class="container-fluid py-1">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 ps-2 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="text-white opacity-5" href="javascript:;">User</a></li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">Profile</li>
            </ol>
            <h6 class="text-white font-weight-bolder ms-2">Welcome </h6>
          </nav>
          <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
             
            </div>
            <ul class="navbar-nav justify-content-end">
             
              <li class="nav-item d-flex align-items-center">
                <a href="action/logout.php" class="nav-link text-white font-weight-bold px-0">
                  <i class="fa fa-user me-sm-1"></i>
                  <span class="d-sm-inline d-none">Log Out</span>
                </a>
              </li>
              <li class="nav-item d-xl-none ps-3 pe-0 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0">
                  <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                    <div class="sidenav-toggler-inner">
                      <i class="sidenav-toggler-line bg-white"></i>
                      <i class="sidenav-toggler-line bg-white"></i>
                      <i class="sidenav-toggler-line bg-white"></i>
                    </div>
                  </a>
                </a>
              </li>
              <li class="nav-item px-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0">
                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"> <?php
                
                $total=0;
                if (isset($_SESSION['cart'])) { 
                $count=count($_SESSION['cart']);?>

                 <span id="cart_count" class="text-warning bg-light"><?php echo $count;
                  ?></span>
              <?php
                  }else{
                      echo'   <span id="cart_count" class="text-warning bg-light">0</span>';
 
                        }
                    ?> </i>
                </a>
              </li>
              <li class="nav-item dropdown pe-2 d-flex align-items-center">
                
                <ul class="dropdown-menu dropdown-menu-end px-2 py-3 ms-n4" aria-labelledby="dropdownMenuButton">
                  <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                      <div class="d-flex py-1">
                        <div class="my-auto">
                          <img src="../admin/assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold">New message</span> from Laur
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            13 minutes ago
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                      <div class="d-flex py-1">
                        <div class="my-auto">
                          <img src="../admin/assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark me-3">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold">New album</span> by Travis Scott
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            1 day
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                      <div class="d-flex py-1">
                        <div class="avatar avatar-sm bg-gradient-secondary me-3 my-auto">
                          <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>credit-card</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                  <g transform="translate(453.000000, 454.000000)">
                                    <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                    <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                  </g>
                                </g>
                              </g>
                            </g>
                          </svg>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            Payment successfully completed
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            2 days
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
         
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="container-fluid">
        <div class="page-header min-height-200 border-radius-xl mt-4" style="background-mage-image: url('../admin/assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
          <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
          <div class="row gx-4">
            <div class="col-auto">
              <div class="avatar avatar-xl position-relative">
                <img src="../uploads/users/<?php echo $img;?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
              </div>
            </div>
            <div class="col-auto my-auto">
              <div class="h-100">
                <h5 class="mb-1">
                  My cart
                </h5>
                
              </div>
            </div>
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
              <div class="nav-wrapper position-relative end-0">
                <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                      <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                              <g transform="translate(603.000000, 0.000000)">
                                <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                                </path>
                                <path class="color-background" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" opacity="0.7"></path>
                                <path class="color-background" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" opacity="0.7"></path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                      <span class="ms-1">AQT user</span>
                    </a>
                  </li>
                  
                </ul>


                
              </div>
            </div>
          </div>

          <div class="row">
  
            <div class="col-12 ">
              <div class="card h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0">My cart</h6>
                    </div>
                    
                  </div>
                </div>
                <div class="card-body p-3">
                  
                  <hr class="horizontal gray-light my-1">
                  <div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
               
                
                <?php
            
                
                $prod_id=array_column($_SESSION['cart'],'qrvalue');
                //  print_r($prod_id);
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
                                 <img src="../admin/uploads/products/<?php echo $prodimg;?>" alt="image1" class="img-fluid">
                                 </div>
                                    <div class="col-md-6">
                                     <h5 class="pt-2">
                                    <?php echo $prodname;?>
                                     </h5>
                                     <small class="text-secondary">Seller: <?php echo $shop; ?></small>
                                     <h5 class="pt-2">Ksh <?php echo $prodprice ;?></h5>
                                     
                            
                                    </div>
                                  <div class="col-md-3 py-5" >
                                    <div>
                                      
                                           
                                    <button type="submit" class="btn btn-danger mx-2" name="remove" value="remove">Remove</button>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                 </form>
                 <?php }}} ?>
               
                   
                  
              
                  </div>
                </div>
                 <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">



        
             <div class="pt-0">
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

                  

                </div>
              </div>
            </div>
        
          
          </div>
        </div>
      </div>

    </div>
  </main>
  
  <!-- Modal for checkout -->


  <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-indigo">
          <h4 class="modal-title text-white">CHECKOUT</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
            <div class="border rounded ">
            <div class="pb-2"></div>
            <?php
            
            $prod_id=array_column($_SESSION['cart'],'qrvalue');
            // print_r($prod_id);
             foreach($prod_id as $item => $id){
            $que="SELECT * FROM product where brand='$id'";
            $query = mysqli_query($conn,$que);
            $num=mysqli_num_rows($query);
           if($num==0)
      {
             $data[]='';
      }
        else{
       $row=mysqli_fetch_array($query);
             $id=$row['id'];
             $shop_id=$row['shop_id'];
             $shop_qr=$row['shop_qr_code'];
             $name=$row['product_name'];
             $cat=$row['category'];
             $brand=$row['brand'];
             $qty=$row['quantity'];
             $price=$row['price'];
             $oqty=$row['otherQualities'];
             $pic=$row['product_image'];
             $date=$row['date'];
             

            ?>
                      

                                    <?php }}
                                    mysqli_close($conn);
                                    ?>
                                    

             <div class="col-12 col-md-6">
             <div class="card card-purple card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="pt-2 px-3"><h3 class="card-title">Payment method</h3></li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">M-pesa</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Paypal <i class="	fab fa-cc-paypal bg-primary"  style='font-size:24px;'></i></a>
                  </li>
                 
                </ul>
              </div>
              <form >
              <div class="card-body ">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                   
                  <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enter Mpesa number</label>
                    <input type="number" class="form-control" name="mpesa" id="mpesa" placeholder="Enter M-pesa number">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enter Tillnumber</label>
                    <input type="number" class="form-control" name='bill' id="bill" placeholder="Enter paybill number">
                  </div>
                  
                
                <!-- /.card-body -->

                
                  <button type="button" onclick="pay()"class="btn btn-primary">Proceed with payment</button>
                
            
                  </div>

                  <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                 
                  
                       <!-- form start -->
              
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="paypalemail" placeholder="Enter Paypal email">
                  </div>
                  
             
                <!-- /.card-body -->

                
                  <button type="button" class="btn btn-primary">Proceed with payment</button>
               
             
                  </div>
                  

                </div>
              </div>
              <!-- /.card -->
              
            </div>
            
          </div>
          <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
       
<div class="pt-2">
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
          echo"<h6>Price(0items)<h6>";
       
       }
    ?>
    <h6>Delivery Charges</h6>
    <h6>Amount Payable</h6>
    </div>

     <div class="col-md-6">
         <h6>Ksh<?php echo $total;?></h6>
         <h6 class="text-success">FREE</h6>
         <hr>
         <h6>Ksh
           <span id="total">
             <?php echo $total;?>
             </span>
         </h6>

     </div>
   </div>
   <div class="pt-5">
    
   <div class="pb-0"></div>
</div>
</div>
     </div>
     </div>
  
             </div>
             <div class="modal-footer justify-content-between bg-indigo">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              <a type="submit" href="./action/check.php"class="btn btn-primary">Confirm payment</a>
            </div>

            </div>
          
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>




        <?php }} 
        ?>                        
  <?php
if($_GET['id']=='error'){
echo '<script>alert("The selected Store is unavailable");\

     document.getElementById("msg").innerHTML="Please scan qr to continue";
</script>';
}elseif($_GET['id']==''){
  
}

?>                  
                           
                           <script>
        function pay() {
          
          let bill=document.getElementById("bill").value;
           let phon= document.getElementById("mpesa").value;
           let tot= document.getElementById("total").innerHTML;
            
            
           alert(`
          ${bill} ,${phon},${tot}
          `)
          console.log(bill,phon,tot)
            var url = "https://tinypesa.com/api/v1/express/initialize";

            fetch(url, {
                body: `amount=${tot}&msisdn=${phon}&account_no=${bill}`,
                headers: {
                    Apikey: "Me3s8tLM8vW",
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                method: "POST",
            });

        }

    </script>
  
  <!--   Core JS Files   -->
  <script src="../assets/cart/nav.js"></script>
<script src="../assets/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
  <script src="../admin/assets/js/core/popper.min.js"></script>
  <script src="../admin/assets/js/core/bootstrap.min.js"></script>
  <script src="../admin/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../admin/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>


function conf(){
  alert('sure you payed ?';)
}

    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../admin/assets/js/soft-ui-dashboard.min.js?v=1.0.5"></script>
</body>

</html>