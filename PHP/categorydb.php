<?php
$con=mysqli_connect("localhost","root","","museum");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$cat = mysqli_real_escape_string($con, $_POST['category']);

$sql="INSERT INTO category(categoryName) VALUES('$cat')";

if (!mysqli_query($con,$sql)) {
  die('Error: Category of Type '.$_POST['category']. ' already exists. Please Add a new Category.');
}
echo "<h2> 1 record added successfully</h2>";


mysqli_close($con);


?>
<html>
<body>


<h2><a href="category.php">Enter another Category</a> &nbsp;
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