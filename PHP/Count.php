<?php
$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 mysqli_select_db($con,"museum");
 $sql = "SELECT COUNT(photoNumber) FROM museumitem"; 
 if($sql==false)
					die("could not query the databse");
					$n=mysql_num_rows($sql);

echo "count";
?> 