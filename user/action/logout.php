<?php


   include("../../admin/action/config.php");
   session_start();
  session_destroy();

  header("Location: ./sign-in.php");

?>