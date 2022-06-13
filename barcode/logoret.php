<?php 
    include("../admin/action/config.php");
    $query="SELECT logo from shop where qr_code='https://qrstud.io/qrmnky' ";
    $er=mysqli_query($conn,$query);
     print_r($query);





?>