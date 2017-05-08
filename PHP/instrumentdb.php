<?php
$con=mysqli_connect("localhost","root","","museum");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$inst = mysqli_real_escape_string($con, $_POST['instrument']);

$sql="INSERT INTO instrument(instrumentName) VALUES('$inst')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "<h2> 1 record added successfully</h2>";


mysqli_close($con);


?>
<html>
<body>


<h2><a href="instrument.php">Enter another Instrument</a> &nbsp;
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