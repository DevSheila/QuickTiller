<?php
require_once("connect.php");
if(!empty($_POST["regno"])){
    $regno = $_POST['regno'];
    if(!preg_match("/^[A-Z]+\/[0-9]+\/[0-9]{3}/",$regno))
    {
        echo"<span style ='color:red'>invalid Regno </span>";

    }
    else
    {
   $sql="SELECT reg from students where reg = '$regno'";
   $query = mysqli_query($conn,$sql);
   $row = mysqli_num_rows($query);
   $data=mysqli_fetch_array($query);
   if($data>0)
   {
       echo"<span style ='color:red'>Registration already exists.</span>";
       echo"<script>$('#submit').prop('disabled',true );</script>";
   }
else
  {
    echo"<span style ='color:blue'>OK</span>";
    echo"<script>$('#submit').prop('disabled',false );</script>";
   // echo"<script>$('#mail').prop('disabled',false );</script>";
}

    }
}
if(!empty($_POST["phone"])){
    $phon = $_POST['phone'];
    if(!preg_match('/^[0-9]{10}/',$phon))
    {
        echo "error : You did not enter a valid phone";
    }
    else
    {
   $sql="SELECT phone from students where phone = '$phon'";
   $query = mysqli_query($conn,$sql);
   $row = mysqli_num_rows($query);
   $data=mysqli_fetch_array($query);
   if($data>0)
   {
       echo"<span style ='color:red'>phone number already exists.</span>";
       echo"<script>$('#submit').prop('disabled',true );</script>";
   }
else

  {
    echo"<span style ='color:blue'>OK</span>";
    echo"<script>$('#submit').prop('disabled',false );</script>";

}

    }
}
if(!empty($_POST["pass"] && $POST["user"])){
  if($_POST["pass"]=='admin' && $POST["user"]=='admin'){
    header('location:index.php');
  }
  else {
    echo'wrong';
  }
}
if(!empty($_POST["feepaid"])){
    $fee = $_POST['feepaid'];
    if($fee<10000)
    {
        echo"<span style ='color:red'>Your amount is less to be eligible to book a hostel</span>";

    }else{

        echo"<span style ='color:blue'>OK</span>";

    }
}


if(!empty($_POST["mail"])){
    $mail = $_POST['mail'];
    if(!preg_match("/^[a-z0-9]+@[a-z0-9]+\.[a-z]{2,5}$/",$mail))
    {
        echo"<span style ='color:red'>invalid email </span>";

    }
    else
    {
   $sql="SELECT mail from students where mail = '$mail'";
   $query = mysqli_query($conn,$sql);
   $row = mysqli_num_rows($query);
   $data=mysqli_fetch_array($query);
   if($data>0)
   {
       echo"<span style ='color:red'>Email already exists.</span>";
       echo"<script>$('#submit').prop('disabled',true );</script>";
   }
else

  {
    echo"<span style ='color:blue'>ok</span>";
    echo"<script>$('#submit').prop('disabled',false );</script>";

}

    }
}

if(!empty($_POST["nid"])){
    $nid = $_POST['nid'];
    if(!preg_match("/^37+[0-9]{6}$/",$nid))
    {
        echo"<span style ='color:red'>Invaid  Identity .</span>";
    }
    else
    {
   $sql="SELECT id from students where id='$nid'";
   $query = mysqli_query($conn,$sql);
   $row = mysqli_num_rows($query);
   $data=mysqli_fetch_array($query);
   if($data>0)
   {
       echo"<span style ='color:red'>Identity already exists.</span>";
       echo"<script>$('#submit').prop('disabled',true );</script>";
   }
else
  {
    echo"<span style ='color:blue'>OK</span>";
    // echo"<script>$('#submit').prop('disabled',false );</script>";
}

    }
}

if(!empty($_POST["host"])){
    $host = $_POST['host'];
    if($host == "null")
    {
        echo"<option>``NO``</option>";
        echo"<script>$('#submit').prop('disabled',true );</script>";
    }
    else
    {
        $sql = "SELECT $host FROM hostels";
        $query = mysqli_query($conn,$sql);
        if($query){
            while($row = mysqli_fetch_array($query)){
                $course = $row["$host"];
                echo "
                <option value='$course'>$course</option>
                ";
            }
        }

    }
}


if(!empty($_POST["faculty"])){
    $faculty = $_POST['faculty'];
    if($faculty == "null")
    {
        echo"<option>``NO SCHOOL SELECTED``</option>";
        echo"<script>$('#submit').prop('disabled',true );</script>";
    }
    else
    {
        $sql = "SELECT $faculty FROM falculties";
        $query = mysqli_query($conn,$sql);
        if($query){
            while($row = mysqli_fetch_array($query)){
                $course = $row["$faculty"];
                echo "
                <option value='$course'>$course</option>
                ";
            }
        }

    }
}

?>
