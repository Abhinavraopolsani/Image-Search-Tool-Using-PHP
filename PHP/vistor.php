<html>
<head>
<title>Vistor record insertion</title>
</head>
<body>
<?php
if(isset($_GET['']))
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


mysql_close($conn);
}
?>

