<html>
<body>
<?php
require_once('connect.php');
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"museum");
$un=$_GET['username'];
$randnumber=$_GET['rand'];
$result=mysql_query("SELECT * FROM adminlogin WHERE userID='$un'");
while($row=mysql_fetch_array($result))
{
$randval=$row['randomValue'];
}
if($randval==$randnumber){
?>
<center>
<form method='post' action="passchange.php">
					 
					 <table>
					 <br><br>
					 

					 <tr>
						<td><h3>Enter new Password </h3></td>
						<td align="center"><h3><input type="text" name="pass1"></h3></td>
					 </tr>
					  <tr>
						<td><h3>ReEnter new Password </h3></td>
						<td align="center"><h3><input type="text" name="pass2"></h3></td>
					 </tr>
					 <tr align="center">
					 <td colspan="2"><input type = "submit"  name = "s" value = "Submit"> 
					 <?php
}
else{

echo "<h3>Sorry the details you provided does not match our records.</h3>";

}
?>
</body>
</html>
