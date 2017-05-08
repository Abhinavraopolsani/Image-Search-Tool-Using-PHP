<html>
<head>
<title>Delete a Record from MySQL Database</title>
</head>
<body>
<?php
if(isset($_POST['delete']))
{
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('museum');
$photonumber = $_POST['photonumber'];
$data = mysql_query("select count(photoNumber) as photoNumber from museumitem  where photoNumber= $photonumber") or die(mysql_error()); 
  while($info = mysql_fetch_array($data)) 
 {
  
if($info['photoNumber']==1)
{
$sql ="DELETE from museumitem 
       WHERE photoNumber = $photonumber" ; 
$sql1 ="DELETE from itemplayer 
       WHERE photoNumber = $photonumber" ; 
$sql1 ="DELETE from iteminstrument 
       WHERE photoNumber = $photonumber" ; 
	   

echo "Deleted data successfully\n";
$retval = mysql_query( $sql, $conn );
echo "<a href=review.php>Back</a>";
}
else
{
echo "No such record found\n <br><br>";
echo "<a href=review.php>Back</a>";
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
<input name="delete" type="submit" id="delete" value="Delete">
</td>
</tr>
</table>
</form>
<?php
}
?>
</body>
</html>