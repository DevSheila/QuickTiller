<?php
require_once('../database/conn.php');
session_start()

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AQT | User</title>

  <!-- Google Font: Source Sans Pro -->
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
  
</head>

<body style="font-family: neva;">
<div class="page">
<div class="wrapper"  >
 
  <nav class="navbar sticky-top navbar-expand-lg bg-purple">
    <div class="container">
      <a class="navbar-brand" href="#"style="color:white;"><img src="../assets/img/stores/AQT.png" alt="" width="80"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <i class="fas fa-bars"></i>
             </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto w-100 justify-content-end">
          <li class="nav-item active">
            <a class="nav-link" href=""style="color:white;">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="scan-store.php"style="color:white;">Shop</a>
            <li class="nav-item">
            <a class="nav-link" href="../barcode/scan.php"style="color:white;">Continue shopping</a>
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
                       echo'   <span id="cart_count" class="text-warning bg-light">0</span>';
  
                         }
                     ?> 

</h5>
</a>
            
        </ul>
      </div>
    </div>
  </nav>
      <div class="curve bg-purple"  ></div>
 
    

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->


  <div class="card card-purple ">
  <?php
                $id=$_SESSION["user_id"];
                $query="SELECT * FROM user where id=$id";
                $que=mysqli_query($conn,$query);
                $num=mysqli_num_rows($que);
                if($num==0)
           {
                 echo"<script>alert('No vailable people')</script>";
           }
             else{
            for($i=0; $i<$num; $i++)
            {
            $row=mysqli_fetch_array($que);
                  $data[]=array($index=$i+1,$id=$row['id'],
                  $name=$row['user_name'],$img=$row['user_image'],$stat=$row['status'],$mail=$row['email'],
                  $phone=$row['phone'],$address=$row['address'],$pass=$row['password'],$date=$row['date']);
                  
  
                  ?>
    <div class="card-body card-sm-3">
      <img src=<?php echo "images/".$img;?> alt=""class="rounded-circle" width="50">
      
      <h4><?php echo $name;?></h4>
      <div class="row">
        <div class="col-5 col-sm-3">
          <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
           
            <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Profile</a>
            
            <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-checkout" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Checkouts</a>
            
          </div>
        </div>
        <div class="col-7 col-sm-9">
          <div class="tab-content" id="vert-tabs-tabContent">
            
            <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
              <div class="container">
                <div class="main-body">
           
                   
                      <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                          <div class="card">
                            <div class="card-body">
                              <div class="d-flex flex-column align-items-center text-center">
                     
                                <img src=<?php echo "images/".$img;?> alt="Photo" class="rounded-circle" width="150">
                                <div class="mt-3">     
                                  
                                  <h4><?php echo $name;?></h4>
                                  <button type="button" class="btn btn-default bg-purple" data-toggle="modal" data-target="#modal-sm">Upload Photo</button>
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                        <div class="col-md-8">
                          <div class="card mb-3">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Full name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $name ;?>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $mail ;?>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $phone ;?>
                                </div>
                              </div>
                              <hr>
                              
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $address ;?>
                                </div>
                              </div>
                              <?php
          }
        }
                              ?>
                              <hr>
                              <div class="row">
                                <div class="col-md-5">
                                  <button type="button" class="btn btn-default bg-purple" data-toggle="modal" data-target="#modal-lg">
                                           Edit
                                   </button>
                                </div>
                              </div>
                            </div>
                          </div>
            
                         
            
            
            
                        </div>
                      </div>
            
                    </div>
                </div>

                <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Upload photo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="../assets/cart/check.php" role="form" enctype="multipart/form-data" method="Post">
                        <div class="form-group pb-2">
                          <input class="form-control" type="file" name="pic" id="pic" placeholder="input photo" accept="image/png, image/gif, image/jpeg,image/jpg" required>
                        </div>
                        <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="submit"  class="btn btn-primary bg-purple">Save changes</button>
            </div>
      </form>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      


                <div class="modal fade" id="modal-lg">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Edit Profile</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                
                      
                           
                              <!-- left column -->
                              <div class="col-md-12">
                                <!-- jquery validation -->
                                <div class="card card-primary">
                                 
                                  <!-- form start -->
                                  <form id="contactForm" name="contact" Action="saveContact.php"role="form" method="post">
                                    <div class="card-body">
                                      <div class="form-group">
                                        <label for="exampleInputFullname">Full Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" value=<?php echo $name;?> required>
                                      </div>
                                      
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" value=<?php echo $mail;?> required>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputphone">Phone</label>
                                        <input type="number" name="phone" class="form-control" id="exampleInputEmail1" value=<?php echo $phone;?> required>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputAdress">Address</label>
                                        <input type="text" name="address" class="form-control" id="exampleInputEmail1" value=<?php echo $address;?> required>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" value=<?php echo $pass;?> required>
                                      </div>
                                     
                                    </div>
                                    <!-- /.card-body -->
                                   
                                </div>
                                <!-- /.card -->
                                </div>
                             <div class="col-md-6"></div>
                          
                          
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                      </div>
                      
                    </form>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
            </div>
            
            <div class="tab-pane fade" id="vert-tabs-checkout" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
            <table class="table table-hover">
  <thead>
    <tr>
     
                     <th scope="col">Item ID</th>
                     <th scope="col">STORE ID</th>
                     <th scope="col">DATE</th>
                     <th scope="col">QUANTITY</th>
                     <th scope="col">TOTAL </th>
                     <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>hello</td>
      <td>Mutuku</td>
    </tr>
  
    </tr>
  </tbody>
</table>
            </div>
          </div>
        </div>
                
        </div>
     

  


  <footer class="navbar fixed-bottom navbar-light bg-purple">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="">AQT</a>.</strong> All rights reserved.
  </footer>

  
</div>
      </div>
      <div id="loading"></div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../assets/cart/nav.js"></script>
<script src="../assets/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<script>

</script>

</body>
</html>
