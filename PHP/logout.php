<?php 
//enable sessions
session_start();
setcookie("authenticate","",1);
setcookie("username","",1);
setcookie("password","",1);
session_destroy();
header('Location:login.php');
?>
