
<!DOCTYPE html>
<html>
<head>
	<title> QR Code Scanner</title>
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
<link rel="stylesheet" href="../assets/cart/qr.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>
<body>
  <nav>

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



<span id="cart_count" class="text-warning bg-light">
count
</span>


</h5>
</a>
      
        </ul>
      </div>
    </div>
  </nav>
    <div class="curve bg-purple"  ></div>
</header>
        
        
    </nav>
    
    <div class="container">
      <h4 class="text-center text-dark">AQT</h4>
      <hr>
        <div class="row">
            <div class="col-md-6">
                <video width="50%"  id="preview"></video>
                <i class="fa fa-camera-retro" aria-hidden="true"></i>
            </div>
            <div class="col-md-6">
                    <div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
                        </label>
                    </div>
            </div>
            <div class="col-md-6">
                    <form action="../assets/php/component.php" method="post"> 
                        <label >Qr-Code Value</label>
                        <input type="text" value="" name="qrvalue" id="qrvalue" readonly="" class="form-control">
                        
                            <div id="qr"></div>
                        
                        <div class="pt-4"></div>
                        <div class="col-md-5">
                            <button  type="submit" name ="add" class="btn bg-indigo ">ADD TO CART</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
   


<script type="text/javascript">
    var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
    scanner.addListener('scan',function(content){
     
        // alert(content);
        document.getElementById('qrvalue').value=content;
        document.getElementById('qrvalue').innerHTML=content;
    });
    Instascan.Camera.getCameras().then(function (cameras){
        if(cameras.length>0){
            scanner.start(cameras[0]);
            $('[name="options"]').on('change',function(){
                if($(this).val()==1){
                    if(cameras[0]!=""){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    if(cameras[1]!=""){
                        scanner.start(cameras[1]);
                    }else{
                        alert('No Back camera found!');
                    }
                }
            });
        }else{
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e){
        console.error(e);
        alert(e);
    });
</script>

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

</script>


</body>
</html>