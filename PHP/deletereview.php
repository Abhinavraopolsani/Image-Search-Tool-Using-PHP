<html>
<head>
<title>Delete a Record from MySQL Database</title>
</head>
<body>
<?php
if(isset($_POST['submit']))
{
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$photonumber = $_POST['photonumber'];
$sql = "select * from museumitem 
       WHERE photoNumber = $photonumber" ;
mysql_select_db('museum');
$retval = mysql_query( $sql, $conn );
if(! $retval)
{
  die('Could not review data: ' . mysql_error());
}
else
{
if("select count(photoNumber) as photoNumber where photoNumber = $photonumber" < 1)
{
echo "No such record found";
}
else{
header('Location: adminindex.html');
}
}
mysql_close($conn);
}
else
{
?>
<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">
<tr>
<td width="100">Enter Photo Number</td>
<td><input name="photonumber" type="text" id="photonumber"></td>
</tr>
<tr>
<td width="100"> </td>
<td> </td>
</tr>
<tr>
<td width="100"> </td>
<td>
<input name="submit" type="submit" id="submit" value="submit">
</td>
</tr>
</table>
</form>
<?php
}
?>
</body>
</html>

