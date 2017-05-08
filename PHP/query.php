<?php
$data=array();
$con = mysql_connect("localhost","root","");
mysql_select_db("museum");
// Check connection
 
$data = mysql_query("SELECT artistLname FROM  museumitem") 
 or die(mysql_error()); 
foreach($conn->query($sql) as $row)
{
    array_push($row['artistLname'];
	}
	echo json_encode($data);
?>