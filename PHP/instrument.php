	
	<?php
if(!isset($_COOKIE['authenticate']))
{
header('Location:login.html');
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
					<html>
					 <head>
					  <title> Instrument</title>
					  <meta name="generator" content="editplus">
					  <meta name="author" content="">
					  <meta name="keywords" content="">
					  <meta name="description" content="">
					 </head>
					  
					 <body>
					 <center>
					 <div align ="right"><h4>Charles A. McAdams Tuba Collection </h4></div> 
					 <form method='post' action="instrumentdb.php">
					 </br>
					 <h3 align="right"><a  id="submit"  href="logout.php">Logout </a></h3><br>
						
					 <table>
					 <br><br>
					 <tr>
						<td><h3>Enter Instrument </h3></td>
						<td align="center"><h3><input type="text" name="instrument"></h3></td>
					 </tr>
					 <tr align="center">
					 <td colspan="2"><input type = "submit" align= "right" name = "s" value = "Submit">
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
					 </center>
					  
					 </body>
					  </form>
					</html>
	
