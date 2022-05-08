<?php


session_start();
$user=$_SESSION['user'];

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" src="logo.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index3.html" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="logo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Harrison Mutuku</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item has-treeview">
                 <a href="index.php" class="nav-link">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                     Dashboard
                     <i class="right fas fa-angle-left"></i>
                   </p>
                 </a>
                 <ul class="nav nav-treeview">
                   <li class="nav-item">
                     <a href="index.php" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                       <p>Dashboard v1</p>
                     </a>
                   </li>
</ul>
               <li class="nav-item has-treeview menu-open">
                 <a href="#" class="nav-link active">
                   <i class="nav-icon fas fa-table"></i>
                   <p>

                     Tables
                     <i class="fas fa-angle-left right"></i>
                   </p>
                 </a>
                 <ul class="nav nav-treeview">
               <li class="nav-item">
                     <a href="data.php" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                       <p>All students</p>
                     </a>
                   </li>
                    <li class="nav-item">
                     <a href="examcard.php" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                       <p>Exams register</p>
                     </a>
                   </li>

                  <li class="nav-item">
                     <a href="transc.php" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                       <p>Generalised transcript</p>
                     </a>
                   </li>
                 </ul>
      <!-- /.sidebar-menu -->

  </nav>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Welcome <?php echo"$user";?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
                <li class="breadcrumb-item active">Users </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- /.card -->

            <div class="card">
              <div class="card-header"><div class="row">
                       <div class="col-md-10"></div>
                       <div class="col-md-2">
                        <button type='button' class='btn btn-success dropdown-toggle' data-toggle='dropdown'>Action</button>

                    <ul class='dropdown-menu'>
                      <li class='dropdown-item'><button type='button' class='btn btn-secondary' data-toggle='modal' data-target="#ADD">
                      ADD USER
                        </button></li>

                    </ul></div>
                      </div>
                <h2 class="card-title">Students Table</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>

                    <th>USERNAME</th>
                    <th>HOST</th>
                    <th>ACTION</th>
                                    </tr>
                  </thead>
                  <tbody>
                  <?php

$connem= mysqli_connect('localhost','root','','mysql') or die('Unable to Connect to Database');
$strSQLc= "SELECT * FROM user";
     $query = mysqli_query($connem,$strSQLc);
     if(mysqli_num_rows($query) > 0){
while ($row=mysqli_fetch_array($query))
{
$hostme=$row['Host'];
$name=$row['User'];


echo "
<tr>
<td>$name</td>
<td>$hostme</td>
<td> <button type='button' class='btn btn-success dropdown-toggle' data-toggle='dropdown'>Action</button>
<ul class='dropdown-menu'>
<li class='dropdown-item delete_movie'><a href='delete.php?id=$name&sec=$hostme'><button type='button' class='btn btn-default'>Delete</button></a></li>
</ul>
 </div></td>
</tr>";

}




                   }
                 ?>
                  </tbody>
                  <tfoot>
                  <tr>

                    <th>USERNAME</th>
                    <th>HOST</th>

                    <th>ACTION</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

      <div class="modal fade" id="ADD">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">ADD USER</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="delete.php" method="post"
      oninput='cpass.setCustomValidity(cpass.value != password.value ? "Passwords do not match." : "")'>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="username" placeholder="username">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>

                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="host" placeholder="host">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>

                    <div class="input-group mb-3">
                      <input type="password" class="form-control" name="password" placeholder="set password">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>

                    <div class="input-group mb-3">
                      <input type="password" class="form-control" name="cpass" placeholder="confirm password">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>

<!-- create user peter@localhost identified by 'jtp12345'; -->
<div class="custom-control custom-checkbox">
  <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="insert">
  <label for="customCheckbox1" class="custom-control-label">insert only</label>
</div>
<div class="custom-control custom-checkbox">
  <input class="custom-control-input" type="checkbox" id="customCheckbox2" name="delete">
  <label for="customCheckbox1" class="custom-control-label">delete only</label>
</div>
<div class="custom-control custom-checkbox">
  <input class="custom-control-input" type="checkbox" id="customCheckbox3" checked>
  <label for="customCheckbox2" class="custom-control-label">All privileges</label>
</div>
</div>

                <div class="row">
                  <div class="col-8">
                <a href="users.php">  <button type="submit" class="btn btn-primary btn-block"> Back </button></a>
                  </div>
                  <!-- /.col -->
                  <div class="col-4">

                    <button type="submit" class="btn btn-primary btn-block">ADD USER</button>

                  </div>
                  <!-- /.col -->
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <!-- <button type='button' class='btn btn-default' data-toggle='modal' data-target='#un' >
                 Next
               </button> -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      </div>

      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2022-2030 <a href="#">Harrison Mutuku.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>


</script>
</body>
</html>
