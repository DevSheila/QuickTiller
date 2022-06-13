<?php
require('../database/conn.php');
if(isset($_POST['add'])){
$qr=$_POST['qrvalue'];
echo $qr;

if($qr==""){
    
    header("location:../user/store.php?6");
  }else{
    session_start();
    $_SESSION['qr']=$qr;
header("location:./scan-item.php");

}
}

?>