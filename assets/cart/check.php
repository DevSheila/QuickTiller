<?php
// Include the database configuration file
include '../../database/conn.php';
$statusMsg = '';

// File upload path
$targetDir = "../../user/images/";
$fileName = basename($_FILES["pic"]["name"]);
echo $fileName;
$targetFilePath = $targetDir . $fileName;
echo "<br>".$targetFilePath."<br>";
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
echo $_POST['submit'];

if(isset($_POST["submit"]) && !empty($_FILES["pic"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["pic"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert ="UPDATE `user` SET `user_image`='$fileName'  WHERE `id`=3 ";
            $que=mysqli_query($conn,$insert)or die(mysqli_error($conn));
            if($que){
                $statusMsg = "The file ".$fileName. "<script> has been uploaded successfully.</script>";
            }else{
                $statusMsg = "<script>File upload failed, please try again.</script>";
            } 
        }else{
            $statusMsg = "<script>Sorry, there was an error uploading your file.</script>";
        }
    }else{
        $statusMsg = '<script>Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.</script>';
    }
}else{
    $statusMsg = '<script>Please select a file to upload.</script>';
}

// Display status message
echo  $statusMsg;
header('location:../../user/user-dashboard.php');
?>