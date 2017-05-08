

<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Search Results</title>
</head>
<div align ="right"><h4>Charles A. McAdams Tuba Collection </h4></div> 
<?php

if(!isset($_COOKIE['username']))
{
header('Location:login.php');
}

$uname=$_COOKIE['username'];
$pwd=$_COOKIE['password'];


$con = mysqli_connect("localhost", "root", "");
if(!$con )
{
  die('Could not connect: ' . mysql_error());
}
mysqli_select_db($con,"museum");
$result = mysqli_query($con,"SELECT * FROM adminlogin WHERE userID='$uname'");

while($row = mysqli_fetch_array($result))
 {
 $admintype=$row['adminType'];
 }
 
 if($admintype==0){
 header('Location:useroptions.php');
 }
 else{
 
 
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMIN OPTIONS</title>
</head>
<center>
<body>
<script>
window.onunload=function(){null};
</script>
<div>
<br></br>
<h3 align="right"><a  id="submit"  href="logout.php">Logout </a></h3><br>

<br></br>
<br></br>

<h2><a href="dataentry.php">ENTER ITEM</a></h2>
<h2><a href="options.php">ADMIN OPTIONS</a></h2>
</div>
</body>
</center>
</html>
<?php
}
?>


