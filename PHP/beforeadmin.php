<?php


$uname=$_POST['user'];
$passwd=$_POST['pwd'];


setcookie("username",$uname,0);
setcookie("password",$passwd,0);

session_start();

require_once('connect.php');


$result=mysql_query("SELECT * FROM adminlogin WHERE userID='$uname'");
while($row=mysql_fetch_array($result))
{
$cpw=$row['password'];
$admintype=$row['adminType'];
}

if($passwd!=$cpw)
{
print "<script type=text/javascript> 
alert('The username or password you entered is incorrect'); 
window.location.href ='login.php';
</script>";  

}

else
{
setcookie('authenticate',"TRUE",0);
setcookie("adminType",$admintype,0);
if($admintype==0)
header('Location:useroptions.php');
else
header('Location:adminoptions.php');

}
?>