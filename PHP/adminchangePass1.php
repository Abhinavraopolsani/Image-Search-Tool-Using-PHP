<?php
session_start();
require("connect.php");
if(!($_SESSION["authenticated"]=="true"))
die("Sorry ...u r not authenticated");
//if($_SESSION['user']=="admin")
//{
  if(   !empty($_POST["user"])  &&  !empty($_POST["cpwd"]) && !empty($_POST["npwd"]))
	   {    
	  $sql = "SELECT password FROM adminlogin WHERE userID='".$_POST["user"]."'";
				  $result=mysql_query($sql);
		  if(mysql_num_rows($result)==1)
								  {
								$row = mysql_fetch_array($result);
											if( $_POST["cpwd"]==$row['password'])
										   {
										   if($_POST["npwd"]==$_POST["n1pwd"])
										   {
		$query = "UPDATE adminlogin SET password ='".$_POST["npwd"]."' WHERE userID = 'admin' AND 
		password = '".$_POST["cpwd"]."'";
		}
		else
		{
		echo "PASSWORDS MISMATCH";
		}
							if((	$rss=	mysql_query($query))==false)
								          echo "";
							          else echo "PASSWORD CHANGED SUCCESSFULLY";
	         							   } 
										   else
										   echo "CURRENT PASSWORD DOES NOT MATCH";
				     		  }
							  
				}
						   else
					   echo "FIELDS NOT ENTERED PROPERLY";

	   	//else
//die("you are not authenticated user");
?>
