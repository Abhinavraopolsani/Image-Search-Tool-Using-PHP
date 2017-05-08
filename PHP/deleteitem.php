


<?php
session_start();

$link = mysql_connect('localhost','root','');  
 mysql_select_db('museum',$link) or die("Unable to connect") ; 
 

if(!isset($_COOKIE['username']))
{
header('Location:login.php');
}

$uname=$_COOKIE['username'];
$pwd=$_COOKIE['password'];
$admintype=$_COOKIE['adminType'];
if($admintype==0)
header('Location:login.php');
else


?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div align ="right"><h4>Charles A. McAdams Tuba Collection</h4></div> 
<title>Delete Item</title>
<script language="javascript">
function del()
{
if (confirm("Are you sure you want to delete?"))
 {
   document.location.href='deleteitemdb.php?pid='+ document.getElementById('photo').value;
   return true;
  }
  else
  {
  return false;
  }
}
function validate()
{
  	if(document.getElementById('photo').value=="")
 	{
  		alert("Photo Number should not be Empty!");
  		return false;
		
 	}
	del();
}
</script>
		
</head>
<center>
<body>
<div>
<br></br>
<h3 align="left"><a  id="submit"  href="options.php"><< Back </a></h3>
<h3 align="right"><a  id="submit"  href="logout.php">Logout </a></h3><br>

<br></br>
<br></br>
<table>
					 <br><br>
					 <table>
				 

					 <tr>
						<td><h3>Enter Photo Number</h3></td>
						<td align="center"><h3><input type="text" name="photonumber" id="photo" ></h3></td>
						
					 </tr>
					 <tr align="center">
					 <td colspan="2" align="center"><input type="button" name="Submit" class="delete" value="Delete" onclick="validate();" />
					 <a href="options.php"><input type = "button" value = "Cancel"/> </a></td>
</td></tr>
					 </table>

</center>
</body>
</center>
</html>


