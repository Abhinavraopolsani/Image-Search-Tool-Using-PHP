
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete Item</title>
</head>
<center>
<body>
<div>
<br></br>
<h3 align="left"><a  id="submit"  href="options.php"><< Back </a></h3>
<h3 align="right"><a  id="submit"  href="logout.php">Logout </a></h3><br>

<br></br>
<br></br>
<?php
session_start();

require_once('connect.php');
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"museum");
if(!isset($_COOKIE['username']))
{
header('Location:login.php');
}

$uname=$_COOKIE['username'];
$pwd=$_COOKIE['password'];
$admintype=$_COOKIE['adminType'];
$photoNumber=$_POST['photonumber'];
$pid=$_GET['pid'];
if($admintype==0)
header('Location:login.php');
else

$sql=mysqli_query($con,"SELECT * FROM museumitem WHERE photoNumber='".$pid."'");

$i=0;
while($row=mysqli_fetch_array($sql))
{
$i++;
}
if($i>=1)
{

?>

<?php


$sqld1="DELETE FROM museumitem WHERE photoNumber='".$pid."'";
	$sqld2="DELETE FROM itemPlayer WHERE photoNumber='".$pid."'";
	$sqld3="DELETE FROM itemsubmaterial WHERE photoNumber='".$pid."'";
	$sqld4="DELETE FROM iteminstrument WHERE photoNumber='".$pid."'";
	$sqld5="DELETE FROM test_image WHERE photoNumber='".$pid."'";
mysqli_query($con,$sqld1);
mysqli_query($con,$sqld2);
mysqli_query($con,$sqld3);
mysqli_query($con,$sqld4);
mysqli_query($con,$sqld5);
  
?>
<script language="javascript">
alert("Item with Photo Number <?php echo $pid;?> deleted Successfully.");
</script>


</script>

 <h2><a href="deleteitem.php">Delete another Item</a> &nbsp;			 
<a href="adminoptions.php">Go to Main Menu</a>

</h2>

<?php
}
else


{?>
 <script language="javascript">

alert("Item with Photo Number <?php echo $pid;?> does not exist. Please try another item.");

</script>

<h2><a href="deleteitem.php">Delete another Item</a> &nbsp;			 
<a href="adminoptions.php">Go to Main Menu</a>

</h2>



<?php


mysqli_close($con);

}


?>


					 
</center>
</body>
</center>
</html>


