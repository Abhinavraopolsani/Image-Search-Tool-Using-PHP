<?php
session_start();

require_once('connect.php');

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
<title>Change Credentials</title>


</head>
<center>
<body>
<div align ="right"><h4>Charles A. McAdams Tuba Collection</h4></div> 
<p id="demo"></p>
<br></br>
<h3 align="left"><a  id="submit"  href="options.php"><< Back </a></h3>
<h3 align="right"><a  id="submit"  href="logout.php">Logout </a></h3><br>

<br></br>
<br></br>
<script>

function check()
{


var username=document.getElementById("username").value;
var currentpassword=document.getElementById("currpass").value;
var newpassword1=document.getElementById("newpass1").value;
var newpassword2=document.getElementById("newpass2").value;

if(username=="" || currentpassword=="" || newpassword1=="" ||newpassword2=="")
{
alert("Please fill all details.");

}
else if( newpassword1 != newpassword2){
alert("Passwords does not match. Please try again.");
}

else{

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById(response).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","http://localhost/MuseumDatabaseProject/checkcred.php",true);
xmlhttp.send();

}
}
</script>
<form name="form1"  method="get" action="updatecred.php">
<table >

					 <br><br>
					 <tr>
					 <td><b><font size="4">Select User &nbsp; &nbsp;<select name="username"></b>
            <option value="">--- Select ---</option>
            <?php
			
            $con=mysql_connect("localhost","root","");
            mysql_select_db("museum");
            $list=mysql_query("SELECT * FROM adminlogin WHERE adminType=0");
			
            while($row_list=mysql_fetch_assoc($list)){
		
            ?>
            <option value="<?php echo $row_list['userID']; ?>">
                <?php  echo $row_list['userID']; ?>
            </option>
			
            <?php
			
            }
            ?>
        </select>
		</td>
					</tr>
					<tr>
						<td><b><font size="4" >Enter current Password</b> </td>
						<td><input type="password"  name="currpassword" id="currpass"></td>
					 </tr>
					<tr>
						<td><b><font size="4">Enter new Password </b></td>
						<td>
						<input type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="newpassword1" id="newpass1"></td>		
					 <td><font color ="red">must contain uppercase and lowercase letters, a number and a special character</td>
					 </tr>
					 <tr>
						<td><b><font size="4">Reenter new Password </b></td>
						<td>
						<input type="password" name="newpassword2" id="newpass2"></td><td>
					 </tr>
					 </table> 
					 <br/>
					 <table>
					 <tr align="center">
					  
					 <td colspan="2"><input type="submit" name="submit" value="Submit">
		
					 <a href="options.php"><input type = "button"  name = "s" value = "Cancel"> </a>
</td></tr>
					 </table>
					 </form>
					 <p id="response">
					 </p>

</center>
</body>
</html>


