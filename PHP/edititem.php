<?php
if(!isset($_COOKIE['authenticate']))
{
header('Location:login.php');
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div align ="right"><h4>Charles A. McAdams Tuba Collection </h4></div> 
<title>Edit Item</title>
<script>
</script>


</head>
<center>
<body>
<div>


<br/><br/><br/>
<form method='post' action="edititemdb.php">
					 </br>
					 <?php
		$adminType=$_COOKIE['adminType'];
		if($adminType==0){
		$targ="usoptions.php";
		}
		else{
		$targ="options.php";
		}
		?>
					 <h3 align="left"><a href="<?php echo $targ;?>"><< Back</a></h3>
						<h3 align="right"><a  id="submit"  href="logout.php">Logout </a></h3><br>
					 <table>
					 <br><br>
					 

					 <tr>
						<td><h3>Enter Photo Number </h3></td>
						<td align="center"><h3><input type="text" id="photo" name="pnumber"></h3></td>
					 </tr>
					 <tr align="center">
					 <td colspan="2"><input type = "submit"  name = "s" value = "Submit" onclick="validate();" > 

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
