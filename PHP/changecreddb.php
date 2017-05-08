<?php
session_start();

require_once('connect.php');
$con=mysql_connect("localhost","root","");
mysql_select_db("museum");
if(!isset($_COOKIE['username']))
{
header('Location:login.html');
}

$uname=$_COOKIE['username'];
$pwd=$_COOKIE['password'];
$admintype=$_COOKIE['adminType'];
if($admintype==0)
header('Location:login.html');
else
$un=$_GET['username'];
$currpassword=$_GET['currpassword'];
$newpassword=$_GET['newpassword'];
$sql="SELECT * FROM adminlogin WHERE userID='$un'";
while($row=mysql_fetch_array($sql)){
$pw=$row['password'];

}
if($currpassword!=$pw){
echo "The password you entered for user  is incorrect. Please try again.";
}
else{
$sql2="UPDATE adminlogin SET password='$newpassword' WHERE userID='$un'";
mysqli_query($con,$sql2);
echo " Password for user  has been changed successfully.";

mysql_close($con);

}

?>



