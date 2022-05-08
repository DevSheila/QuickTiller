<?php
require('connect.php');

$strSQL= "SELECT * from students ";
$query = mysqli_query($conn,$strSQL);
$num=mysqli_num_rows($query);
if($num==0)
{
$data[]='';
}
else{
for($i=0; $i<$num; $i++)
{
$row=mysqli_fetch_array($query);
$data[]=array($index=$i+1,$fname=$row['name'],$reg=$row['regno'],$mail=$row['email'],$stage=$row['stageid'],$course=$row['course_name']);


?>
