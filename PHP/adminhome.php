<?php

session_start();

require_once('connect.php');
if(isset( $_POST['user']) && isset($_POST['pwd']))
{
$user =mysql_real_escape_string($_POST['user']);
$pwd =mysql_real_escape_string($_POST['pwd']);



#$sql = "SELECT userId,password FROM 'adminlogin' WHERE userID='".$user."'";

$sql="SELECT userID,password FROM `adminlogin` WHERE `userID`='".$user."'";
$result=mysql_query($sql);
//echo $result;
if(mysql_num_rows($result)==1)
{
$row = mysql_fetch_array($result);

	if($user==$row['userID']  && $pwd==$row['password'])
	{
	
		$_SESSION["authenticated"]="true";
		
 header
('Location:adminoptions.html');
exit;

}
	else if($user==$row['userID'] && $pwd!=$row['password'])
	{
	header('Location:login.html');
	echo "Username and password do not match";
		
	
    
}
}
else
{
$_SESSION["authenticated"]="false";
		
	header('Location:login.html');
	echo "You are not authenticated";
	} 

}


?>




