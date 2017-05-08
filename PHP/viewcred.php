<?php
session_start();

require_once('connect.php');

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


?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>View Credentials</title>
</head>
<center>
<body>
<div>
<div align ="right"><h4>Charles A. McAdams Tuba Collection </h4></div> 
<br></br>
<h3 align="left"><a  id="submit"  href="options.php"><< Back </a></h3>
<h3 align="right"><a  id="submit"  href="logout.php">Logout </a></h3><br>

<br></br>
<br></br>
<h2>Dataentry user credentials.</h2>
<table style="width:300px">
<tr>
<th size="5px">Username</th><th>Password</th>
</tr>
<?php

$result=mysql_query("SELECT * FROM adminlogin WHERE adminType=0");
while($row=mysql_fetch_array($result))
{
$un=$row['userID'];
$passwd=$row['password'];?>
<tr>
<td align="center"><?php echo $un;?></td><td align="center"><?php echo $passwd;?></td>
</tr>

<?php
}
?>
</table>
</div>
</body>
</center>
</html>


