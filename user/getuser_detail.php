<?php
require("../database/conn.php");

if(isset($_POST['qrvalue'])){
    $val=mysqli_real_escape_string($conn,$_POST['qrvalue']);
    $sql="SELECT shop_name from shop where qr_code='$val'";
    
    $query = mysqli_query($conn,$sql);
  
    $row = mysqli_num_rows($query);
    if($row>0)
    {
  echo "<script>alert('super available')
  </script>";
    }
 else
    
   {
     echo '<script>alert("please scan for the store available")
     document.getElementById("qrvalue").value="";
     document.getElementById("qrvalue").innerHTML="";
     
     document.getElementById("msg").innerHTML="Not registered store scan again";
     </script>';
     
 }
$conn->close();
}
?>