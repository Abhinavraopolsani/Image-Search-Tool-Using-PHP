
<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Login</title>
<style>
x{
color:red;
}
.t{
left:40%;
top:120px;
position:fixed;
}

.brand{
    background:none repeat-x scroll 0 -66px #EFE9F3;     
    display: block;
    height: 100px;
    padding: 0 10px;
}

</style>
<title>SIMS</title>
<script>
function Trim(str)
{
	return str=str.replace(/^ +/,"").replace(/ +$/,"");
}
function validate()
{

if(Trim(document.login.user.value)=="")
{
alert("Please Enter Your User Name"); 
document.login.user.focus();	
return false;
}

if(Trim(document.login.pwd.value)=="")
{
alert("Please Enter Your Password"); 
document.login.pwd.focus();	
return false;
}

return true;

}
</script>
<div class="brand"><a href="index.php"><img align="right"  src="home.jpg" height="50" width="50"></a></div>
</div>
</head>
<body bgcolor="#F8F8FF">

<div class="brand"><img align="left"  src="images/titlepage.jpg" height="400%" width="30%"></div>
</div>
<span align=center class="t">
<form name="login" method="post" action="beforeadmin.php">
<h1 align="center"><b>Charles A. McAdams Tuba Collection</b></h1>
<TABLE align=center>
<br>
<TR>
	<TD><b>Adminstrator</b></TD>
	<TD><INPUT TYPE="text" NAME="user"></TD>
</TR>
<TR>
	<TD><b>Password</b></TD>
	<TD><INPUT TYPE="password" name="pwd"></TD>
</TR>
<TR>
	<TD align=center colspan=2></TD>
</TR>
<TR>
	<TD align=center colspan=2><INPUT TYPE="submit"  value="login" onclick="return validate()"></TD>
</TR>
<tr>
<td align="center"><a href="passwordrec.php">Forgot Password</a></td></tr>
</TABLE>
</form>
<div id="shadow" class="popup"></div>
</span>

</body>
<html>
<?php

?>