<?php
//connect to the database
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('museum');

if(isset($_POST["photonumber"])){

//$today = getdate();
//replace $_POST["year"] with $today["year"]
$sql=sprintf("select photoNumber from museumitem where photoNumber='%s'",
	mysql_real_escape_string($_POST["photonumber"]));
	
	
	//execute query
	$query=mysql_query($sql);
	if($query==false)
	die("could not query the database");
	
	if(mysql_num_rows($query)==0)
	die("no such photonumber present");
	
	if(mysql_num_rows($query)>0)
	{
	echo "found record";
	}
		
	$result=mysql_fetch_assoc($query);


if(isset( $_POST['fname']))
{
$fname =mysql_real_escape_string($_POST['fname']);

$query1=sprintf("update museumitem set artistFname='%s' where photoNumber='%s'",mysql_real_escape_string($_POST["fname"]),$_POST["photonumber"]);
echo "updated";

if(($result1=mysql_query($query1))===false)
	die("couldnot query database");
	
	
	
//echo "<br>".$query1."</br>";
/**if(mysql_affected_rows()==0)
{
	echo "<b>the above query doesnt affect any rows</b>";
	}**/
	}
	
if(isset( $_POST['inventory']))
{
$inventory =mysql_real_escape_string($_POST['inventory']);

$query2=sprintf("update museumitem set inventoryNumber=%d where photoNumber='%s'",mysql_real_escape_string($_POST["inventory"]),$_POST["photonumber"]);
echo "updated";

if(($result1=mysql_query($query2))===false)
	die("couldnot query database");
	//echo "<br>".$query1."</br>";
/**if(mysql_affected_rows()==0){
	echo "<b>the above query doesnt affect any rows</b>";
	}**/
	}
	/**
	$detain=sprintf("insert into museumitem(inventoryNumber,photoNumber) values(%d,'%s')", mysql_real_escape_string($_POST["photonumber"]),$result["photonumber"]);
if(($detained_result=mysql_query($detain))==false)
die("could not detain from databse");
}
**/
exit;	
}
?>

<html>
<body bgcolor="#a7c520">
<form action="dataentry.php" method="post">
<table border="1" align="center" style="color:red;">
<tr>
	<td>phonumber</td>
	<td><input type="text" name="photonumber"></td>
</tr>

<tr><TD align="center" colspan="2"><INPUT TYPE="submit" id="go" VALUE ="submit"></TD>
<TD align="center" colspan="2"><INPUT TYPE="button" id="go" VALUE ="submit"></TD>
</tr></table>
</form>

<br />
<br />


</body>
</html>
