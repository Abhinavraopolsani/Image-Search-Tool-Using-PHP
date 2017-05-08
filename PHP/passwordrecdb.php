<html><body><?php
require_once('connect.php');
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"museum");
$un=$_POST['username'];
$result=mysql_query("SELECT * FROM adminlogin WHERE userID='$un'");
while($row=mysql_fetch_array($result))
{
$email=$row['emailId'];
$admintype=$row['adminType'];
}


if($admintype==0)
{

?>
<script language="javascript">
alert("Please contact one of the administrator to recover your password.");
</script>
<h2><a href="login.html">Login</a></h2>
<?php
}
else{
$rand=rand(0,9999);
$to = $email;
$subject = "Password Recovery";
$txt = "Click this link to reset your password http://localhost/MuseumDatabaseProject/passwordreset.php?rand=".$rand."&username=".$un;

mail($to,$subject,$txt);
echo " A mail has been sent to $mail address please check it to reset your password.";
echo $rand;
echo $un;
$sqli="UPDATE adminlogin SET randomValue=$rand WHERE emailId='$email'";
mysqli_query($con,$sqli);

}
 ?>
 </body><html>