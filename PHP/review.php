<?php
if(!isset($_COOKIE['authenticate']))
{
header('Location:login.php');
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<center>
<body>
<div>

<br/><br/><br/>
<form method='post' action="adminindex.php">
					 </br>
					 <?php
		$adminType=$_COOKIE['adminType'];
		if($adminType==0)
		{
		$targ="usoptions.php";
		}
		else
		{
		$targ="options.php";
		}
		?>
					 <table>
					 <br><br>
					 

					 <tr>
						<td><h3>Enter Photo Number </h3></td>
						<td align="center"><h3><input type="text" name="pnumber"></h3></td>
					 </tr>
					 <tr align="center">
					 <td colspan="2"><input type = "submit"  name = "s" value = "Submit"> 

					 <?php
		$adminType=$_COOKIE['adminType'];
		if($adminType==0){
		$targ="usoptions.php";
		}
		else{
		$targ="options.php";
		}
		?>
					 <a href="<?php echo $targ;?>"><input type = "button"  name = "s" value = "Cancel"> </a>
</td></tr>
					 </table>
</div>
</body>
</center>
</html>
