
<html>
<body><?php
session_start();

require_once('connect.php');
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"museum");
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
$newpassword1=$_GET['newpassword1'];
$newpassword2=$_GET['newpassword2'];
if($un=="" || $currpassword=="" || $newpassword1=="" || $newpassword2==""){
?>
<script language="javascript">
alert("Fill all details");

</script>
<br>
<br>
<h3><a href="changecred.php">Back</a></h3>
<?php 


}
else if($newpassword1!=$newpassword2)
{?>
<br>
<br>
<script language="javascript">
alert("Passwords does not match. Please try again.");
</script>
<h2><a href="changecred.php">Back</a></h2>
<?php


}
else{
$result=mysql_query("SELECT * FROM adminlogin WHERE userID='$un'");
while($row=mysql_fetch_array($result))
{

$pw=$row['password'];
$email=$row['emailId'];
$fname=$row['firstName'];
$lname=$row['lastName'];


}
if($currpassword==$pw){
$sqli="UPDATE adminlogin SET password='$newpassword1' WHERE userID='$un'";
mysqli_query($con,$sqli);
?>
<h3><a href="changecred.php"><<Back</a>
&nbsp; <a href="options.php">Back to Menu</a></h3>
<?php 

echo " <h3>Password for user ".$un." has been changed successfully.</h3>";



mysql_close($con);


}
else{
?>
<h3><a href="changecred.php"><<Back</a>
&nbsp; <a href="options.php">Back to Menu</a></h3>
<?php 
echo "<h3>The password you entered for user ".$un." is incorrect. Please try again.</h3>";
}
}?>
</body>
</html>




