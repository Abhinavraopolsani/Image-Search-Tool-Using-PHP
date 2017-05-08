<?php
if(($con=mysql_connect("localhost","root",""))===false)
die("could not connect to the database");
error_reporting(0);
if(mysql_select_db("museum",$con)===false)
die("could not select the database");
?>

