<?php
$con=mysqli_connect("localhost","root","","museum");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$cat = mysqli_real_escape_string($con, $_POST['category']);
$scat = mysqli_real_escape_string($con, $_POST['subcategory']);

$sql="INSERT INTO subcategory(subcategoryName,categoryName) VALUES('$scat','$cat')";

if (!mysqli_query($con,$sql)) {
  die('Error: SubCategory of Type '.$_POST['subcategory']. ' already exists. Please Add a Separate SubCategory.');
}
echo "<h2> 1 record added successfully</h2>";


mysqli_close($con);


?>
<html>
<body>


<h2><a href="subcategory.php">Enter another subCategory</a> &nbsp;
<?php
		$adminType=$_COOKIE['adminType'];
		if($adminType==0){
		$targ="usoptions.php";
		}
		else{
		$targ="options.php";
		}
		?>
					 
<a href="<?php echo $targ;?>">Go to Main Menu</a></h2>

</body>
</html>