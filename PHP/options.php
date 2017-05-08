<?php
if(!isset($_COOKIE['authenticate']))
{
header('Location:login.php');
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="brand"><a href="adminoptions.php"><img align="left"  src="home.jpg" height="50" width="50"></a></div>
<title>Search Results</title>
</head>
<div align ="right"><h4>Charles A. McAdams Tuba Collection </h4></div> 
<title>ADMIN OPTIONS</title>
</head>
<center>
<body>
<div>
<br/><br/>
<h3 align="left"><a  id="submit"  href="adminoptions.php">Return to Menu </a></h3>
<h3 align="right"><a  id="submit"  href="logout.php">Logout </a></h3><br>

<br/><br/><br/>
<table style="width:1000px">

<tr><td align="center"><h2><a href="category.php">Enter Category</a></h2></td><td align="center"><h2><a href="edititem.php">Edit Item</a></h2></td><td align="center"><h2><a href="viewcred.php">View Credentials</a></h2></td></tr>
<tr><td align="center"><h2><a href="subcategory.php">Enter Sub Category</a></h2></td><td align="center"><h2><a href="deleteitem.php">Delete Item</a></h2></td><td align="center"><h2><a href="changecred.php">Change Credentials</a></h2></td></tr>
<tr><td align="center"><h2><a href="instrument.php">Enter Instrument</a></h2></td><td align="center"><h2><a href="adminsearch.php">Search the Collection</a></h2></td><td></td><td></td></tr>
<tr><td align="center"><h2><a href="material.php">Enter Material</a></h2></td><td align="center"><h2><a href="index1.php">Export the data</a></h2></td><td></td><td></td></tr>
<tr><td align="center"></td><td></td><td></td></tr>
<tr><td align="center"></td><td></td><td></td></tr>
<tr></td><td></td><td></td></tr>
</table>
</div>
</body>
</center>
</html>
