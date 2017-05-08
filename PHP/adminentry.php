<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 mysql_select_db("museum", $con);
 $sql="INSERT INTO adminentry(fname,lname)
VALUES
('$_POST[firstname]','$_POST[lastname]')";
 if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";
 
mysql_close($con)
?>
 
 