
<?php
$con = mysqli_connect("localhost","root","");
$photoNumber=$_COOKIE['photoNumber'];
$image=$_COOKIE['image'];
$str="";
$str1="";
$str2="";
$category="";
$subcat="";
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 mysqli_select_db($con,"museum");
if(isset($_POST['player']))
{
$checkArray=$_POST['player'];
//echo $checkArray;
$i=0;
foreach($checkArray as $key => $value)
{
$i++;
$str.=" ".$value;
 }
  }
if(isset($_POST['material']))
{
$checkArray=$_POST['material'];
//echo $checkArray;
$j=0;
foreach($checkArray as $key => $value)
{
$j++;
$str1.=" ".$value;
 }
 }
  
 if(isset($_POST['instrument']))
{
$checkArray=$_POST['instrument'];
//echo $checkArray;
$k=0;
foreach($checkArray as $key => $value)
{
$k++;
$str2.=" ".$value;
 }
 }
$category=$_POST['genre'];
  $i=1;
  $s=$category.$i;
  
  
  
  if(isset($_POST[$s])){
  $subcat=$_POST[$s];
  }
  else{
  $subcat="";
  }
 
  if($_POST['inventory']=='')
  {
    $_POST['inventory']='NULL';
	}
	 if($_POST['price1']=='')
  {
    $_POST['price1']='NULL';
	}
	 if($_POST['dimension_width']=='')
  {
    $_POST['dimension_width']='NULL';
	}
	 if($_POST['dimension_height']=='')
  {
    $_POST['dimension_height']='NULL';
	}
	if(empty($_POST['display']))
	{
	$_POST['display']='NULL';
	}
	
	 if($_POST['genrenumber']=='')
  {
    $_POST['genrenumber']='NULL';
	}
	if(empty($_POST['shelf']))
	{
	$_POST['shelf']='NULL';
	}
	if(empty($_POST['case']))
	{
	$_POST['case']='NULL';
	}
	if(empty($_POST['month']))
	{
	$_POST['month']='NULL';
	}
	if(empty($_POST['year']))
	{
	$_POST['year']='NULL';
	}
	$dateReceived=$_POST['month'].' '.$_POST['year'];
	$month=$_POST['month'];
	$year=$_POST['year'];
	
	$sqld1="DELETE FROM museumitem WHERE photoNumber='".$photoNumber."'";
	$sqld2="DELETE FROM itemPlayer WHERE photoNumber='".$photoNumber."'";
	$sqld3="DELETE FROM itemsubmaterial WHERE photoNumber='".$photoNumber."'";
	$sqld4="DELETE FROM iteminstrument WHERE photoNumber='".$photoNumber."'";
	$sqld5="DELETE FROM test_image WHERE photoNumber='".$photoNumber."'";
mysqli_query($con,$sqld1);
mysqli_query($con,$sqld2);
mysqli_query($con,$sqld3);
mysqli_query($con,$sqld4);
mysqli_query($con,$sqld5);
	if (empty($_FILES['userfile']['name'])) {
	
    
}
else{
$image="images/".$_FILES['userfile']['name'];
}
	
 $sql="INSERT INTO museumitem(artistFname,artistLname,artistMname,categoryNumber,categoryName,subcategoryname,inventoryNumber,photoNumber,purchasePrice,giftFrom,title,description,width,length,manufacturer,countryoforigin,datereceived,displayName,shelf,itemcase,image,monthsss,yearsss)
   VALUES('$_POST[fname]','$_POST[lname]','$_POST[mname]',$_POST[genrenumber],'".$category."','".$subcat."',$_POST[inventory],'".$photoNumber."',$_POST[price1],'$_POST[gift]','$_POST[title]','$_POST[description]',$_POST[dimension_width],$_POST[dimension_height],'$_POST[manufacturer]','$_POST[country]','$dateReceived','$_POST[display]','$_POST[shelf]','$_POST[case]','".$image."','".$month."','".$year."'); ";
 $sql.="INSERT INTO itemplayer(photoNumber,player_name) VALUES('".$photoNumber."','".$str."'); ";
 $sql.="INSERT INTO itemsubmaterial(photoNumber,materialName) VALUES('".$photoNumber."','".$str1."'); ";
 $sql.="INSERT INTO iteminstrument(photoNumber,instrumentName) VALUES('".$photoNumber."','".$str2."'); ";
 $sql.="INSERT INTO test_image(photoNumber,name,image)VALUES('".$photoNumber."',' ','".$image."');";
 

 if (!mysqli_multi_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  header('Location: http://localhost/MuseumDatabaseProject/dataentry.php?message=');
	//header( 'Location: http://localhost/Mrudula/dataentry.php?message=Error adding the record' ) ;
  }
  else
  {
 
	?>
	<script language="javascript">
alert("Item with Photo Number <?php echo $photoNumber;?> updated successfully");
	
	</script>
	<br>
	<br>
	<h2><a href="edititem.php">Edit another Item</a> &nbsp;
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
<?php
	}
	
	

mysqli_close($con);
?>
