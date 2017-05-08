<?php
session_start();
require("connect.php");
if(!($_SESSION["authenticated"]=="true"))
die("Sorry ...u r not authenticated");
?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
					<html>
					 <head>
					  <title> Change Password </title>
					  <meta name="generator" content="editplus">
					  <meta name="author" content="">
					  <meta name="keywords" content="">
					  <meta name="description" content="">
					 </head>
					  
					 <body>
					 <form method='post' action="adminchangePass1.php">
						

					 <table>
					 <tr>
						<td>Enter User Name</td>
						<td align="center"><input type="text" name="user" value="admin" readonly></td>
					 </tr>
					 <tr>
						<td>Enter Current Password</td>
						<td align="center"><input type="password" name="cpwd"></td>
					 </tr>
					  <tr>
						<td>Enter New Password</td>
						<td align="center"><input type="password" name="npwd"></td>
					 </tr>
					 <tr>
						<td>Confirm New Password</td>
						<td align="center"><input type="password" name="n1pwd"></td>
					 </tr>
 					 
					 <tr>
					 <td colspan="2"><input type = "submit" align= "right" name = "s" value = "Submit">
				<button align="" onClick="JavaScript:window.close();">Close</button></td>
					 </table>
					  
					 </body>
					  </form>
					</html>
	
