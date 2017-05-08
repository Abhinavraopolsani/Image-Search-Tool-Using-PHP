
<?php
$con = mysqli_connect("localhost","root","");
$str="";
$str1="";
$str2="";
$str3="";
$category="";
$subcat="";
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 mysqli_select_db($con,"museum");
 $category=$_POST['genre'];
  $i=1;
  $s=urlencode($category).$i;
  
  
  
  if(isset($_POST[$s])){
  $subcat=$_POST[$s];
  }
  else{
  $subcat="";
  }
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

if(isset($_POST['player_other_text_box']))
{
$checkArray=$_POST['player_other_text_box'];
//echo $checkArray;
$str.=" ".$checkArray;
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
 
if(isset($_POST['material_other_text_box']))
{
$checkArray=$_POST['player_other_text_box'];
//echo $checkArray;
$str1.=" ".$checkArray;
}

if(isset($_POST['submaterial']))
{
$checkArray=$_POST['submaterial'];
//echo $checkArray;
$j=0;
foreach($checkArray as $key => $value)
{
$j++;
$str3.=" ".$value;
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
	
	if(empty($_POST['country']))
	{
	$_POST['country']='NULL';
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
	$target = "images/"; 
    $target = $target . basename( $_FILES['userfile']['name']); 
	$pic=($_FILES['userfile']['name']); 

   //Writes the photo to the server 
   if(move_uploaded_file($_FILES['userfile']['tmp_name'], $target)) 
   { 
    
   } 
   else 
   { 
    
   } 

 $sql="INSERT INTO museumitem(artistFname,artistLname,artistMname,categoryNumber,categoryName,subcategoryname,inventoryNumber,photoNumber,purchasePrice,giftFrom,title,description,width,length,manufacturer,countryoforigin,datereceived,displayName,shelf,itemcase,image,monthsss,yearsss)
   VALUES('$_POST[fname]','$_POST[lname]','$_POST[mname]','$_POST[genrenumber]','".$category."','".$subcat."',$_POST[inventory],'$_POST[photonumber]',$_POST[price1],'$_POST[gift]','$_POST[title]','$_POST[description]',$_POST[dimension_width],$_POST[dimension_height],'$_POST[manufacturer]','$_POST[country]','$dateReceived','$_POST[display]','$_POST[shelf]','$_POST[case]','$target','$_POST[month]','$_POST[year]'); ";
 $sql.="INSERT INTO itemplayer(photoNumber,player_name) VALUES('$_POST[photonumber]','".$str."'); ";
 $sql.="INSERT INTO itemsubmaterial(photoNumber,materialName,submaterialName) VALUES('$_POST[photonumber]','".$str1."','".$str3."'); ";
 $sql.="INSERT INTO iteminstrument(photoNumber,instrumentName) VALUES('$_POST[photonumber]','".$str2."'); ";
 $sql.="INSERT INTO test_image(photoNumber,name,image)VALUES('$_POST[photonumber]',' ','$target');";
 

 if (!mysqli_multi_query($con,$sql))
  {
?><script language="javascript"> alert("Item with photonumber <?php echo $_POST['photonumber'];?> already exists Please enter another Photonumber or delete the existing one.");
window.location.href= "dataentry.php";
</script><?php 
 
	
  }
  else
  {
 
	?>
	<script language="javascript">
alert("Item added successfully");
	
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
	<a href="dataentry.php">Enter a new Item</a> &nbsp;
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
