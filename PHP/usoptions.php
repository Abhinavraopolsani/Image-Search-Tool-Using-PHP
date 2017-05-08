<?php
if(!isset($_COOKIE['authenticate']))
{
header('Location:login.html');
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div align ="right"><h4>R.Winston Morris Tuba Collection </h4></div> 
<title>USER OPTIONS</title>
</head>
<center>
<body>
<div>
<br/><br/>
<h3 align="left"><a  id="submit"  href="useroptions.php">Return to Menu </a></h3>
<h3 align="right"><a  id="submit"  href="logout.php">Logout </a></h3><br>

<br/><br/><br/>
<h2><a href="category.php">Enter Category</a></h2>
<h2><a href="subcategory.php">Enter Sub Category</a></h2>
<h2><a href="instrument.php">Enter Instrument</a></h2>
<h2><a href="material.php">Enter Material</a></h2>
<h2><a href="edititem.php">Edit Item</a></h2>
<h2><a href="usersearch.php">Search the Collection</a></h2>
</div>
</body>
</center>
</html>
