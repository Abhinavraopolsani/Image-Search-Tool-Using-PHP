<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="brand"><a href="adminoptions.php"><img align="left"  src="home.jpg" height="50" width="50"></a></div>
<title>Search Results</title>
</head>
<div align ="right"><h4>R.Winston Morris Tuba Collection </h4></div> 
<script type="text/javascript">
function menu()
{
var e = document.getElementById("dropdown");
 if(e.options[e.selectedIndex].value=="list")
 {
 document.getElementById("display").innerHTML="list";
 }
 else
 {
 //<?php $menutype="nonlist"?>
 }
 }
</script>
</head>
<body>
<p id="display"></p>
</br>
<table border ="0" cellpadding="10" align="center">

<?php 


$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"museum");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }



  $genre=$_GET['genre'];
  $i=1;
  $s=urlencode($genre).$i;
  
  
  
  if(isset($_GET['subcat'])){
  $subcat=$_GET['subcat'];
  }
  else if(isset($_GET[$s])){
  $subcat=$_GET[$s];
  }
  else{
  $subcat="";
  }
  
  
 if(isset($_GET['other1'])){
  $other=$_GET['other1'];
  }
  else {
  $other="";
  }
  
  $country=$_GET['country'];
  
  $title=$_GET['title'];
  $lname=$_GET['lname'];
  $fname=$_GET['fname'];
  $rpp=$_GET['rpp'];
  if(isset($_GET['viewtype'])){
$viewtype=$_GET['viewtype'];
  }
  else{
  $viewtype="normal";
  }
  $currpage=$_GET['currpage'];
  
 $_SESSION['genre']=$genre;
 $_SESSION['subcat']=$subcat;
 $_SESSION['other']=$other;
 $_SESSION['country']=$country;
 $_SESSION['title']=$title;
 $_SESSION['lname']=$lname;
 $_SESSION['fname']=$fname;
 
  
 $searchinventory="";
 $searchphotonumber="";
  // Queries Start here
  if(isset($_GET['photonumber'])){
  
  
  if(!($_GET['photonumber']==""))
  {
  $searchphotonumber=$_GET['photonumber'];
  $main  = "SELECT * from museumitem mi, itemplayer ip, itemsubmaterial ism, iteminstrument ii where mi.photoNumber = ip.photoNumber and mi.photoNumber = ism.photoNumber and mi.photoNumber = ii.photoNumber and mi.photoNumber='".$_GET['photonumber']."'";
  }
  else 
  {
  $main  = "SELECT * from museumitem mi, itemplayer ip, itemsubmaterial ism, iteminstrument ii where mi.photoNumber = ip.photoNumber and mi.photoNumber = ism.photoNumber and mi.photoNumber = ii.photoNumber";
  }
  }
  else{
  $main  = "SELECT * from museumitem mi, itemplayer ip, itemsubmaterial ism, iteminstrument ii where mi.photoNumber = ip.photoNumber and mi.photoNumber = ism.photoNumber and mi.photoNumber = ii.photoNumber";
  }
 if(isset($_GET['inventory'])){
 
  if(!($_GET['inventory']==""))
 {
 $searchinventory=$_GET['inventory'];
  $main  = $main." and mi.inventoryNumber='".$_GET['inventory']."'";
 }
  else 
  {
  }
  }
 
   //code for genre
  $sql_genre = "";
  $sql_subcat = "";
 
  if ($genre != "None")
  {
    $sql_genre = " and ( categoryName = '".$genre."'";
	//code for artwork
  if ($subcat != $genre && $subcat!="")
  {
    
    $sql_genre= $sql_genre . " and subcategoryname = '".$subcat ."'";
  }  
  if($other!="")
  {
  $sql_genre= $sql_genre . " and subcategoryname = '".$other ."'";
  }
  
   $sql_genre = $sql_genre . " ) ";
  }
  
   //code for player
   $sql_player = "";
   if (isset($_GET['player'])) 
   {
 
  $player=$_GET['player'];
	$_SESSION['player']=$player;
    $sql_player = " and ( ";
	$flag = 1;
	
	foreach ($player as $key => $value) 
	{
	  if ($flag == 1)
	  {
	  $flag = 2;
	  $sql_player = $sql_player . " ip.player_name like '%" . $value . "%'";
	  }
	  else
	  {
	  $sql_player = $sql_player . " or ip.player_name like '%" . $value . "%'";
	  }
  	}
	 $sql_player = $sql_player . " ) ";
   }
   else
   {
   if(isset($_SESSION['player']))
   {
    $player=$_SESSION['player'];
	
    $sql_player = " and ( ";
	$flag = 1;
	
	
    foreach ($player as $key => $value) 
	{
	  if ($flag == 1)
	  {
	  $flag = 2;
	  $sql_player = $sql_player . " ip.player_name like '%" . $value . "%'";
	  }
	  else
	  {
	  $sql_player = $sql_player . " or ip.player_name like '%" . $value . "%'";
	  }
  	}
	 $sql_player = $sql_player . " ) ";
   }
   else
   {
   
   }
 }
   
//code for material
   $sql_material = "";
   if (isset($_GET['material'])) 
   {
 
  $material=$_GET['material'];
	$_SESSION['material']=$material;
    $sql_material = " and ( ";
	$flag = 1;
	
	foreach ($material as $key => $value) 
	{
	  if ($flag == 1)
	  {
	  $flag = 2;
	  $sql_material = $sql_material . " ism.materialName like '%" . $value . "%'";
	  }
	  else
	  {
	  $sql_material = $sql_material . " or ism.materialName like '%" . $value . "%'";
	  }
  	}
	 $sql_material = $sql_material . " ) ";
   }
   else{
   if(isset($_SESSION['material']))
   {
    $material=$_SESSION['material'];
	
    $sql_material = " and ( ";
	$flag = 1;
	
	
    foreach ($material as $key => $value) 
	{
	  if ($flag == 1)
	  {
	  $flag = 2;
	  $sql_material = $sql_material . " ism.materialName like '%" . $value . "%'";
	  }
	  else
	  {
	  $sql_material = $sql_material . " or ism.materialName like '%" . $value . "%'";
	  }
  	}
	 $sql_material = $sql_material . " ) ";
   }
   else{
   }
   }
   
   




   

   
   //code for instrument
   $sql_instrument = "";
   if (isset($_GET['instrument'])) 
   {
   $instrument=$_GET['instrument'];
	$_SESSION['instrument']=$instrument;
    $sql_instrument = " and ( ";
	$flag = 1;
	
    foreach ($instrument as $key => $value) 
	{
	  if ($flag == 1)
	  {
	  $flag = 2;
	  $sql_instrument = $sql_instrument . " ii.instrumentName like '%" . $value . "%'";
	  }
	  else
	  {
	  $sql_instrument = $sql_instrument . " or ii.instrumentName like '%" . $value . "%'";
	  }
  	}
	
	 $sql_instrument = $sql_instrument . " ) ";
   }
   else{
   if(isset($_SESSION['instrument'])){
   $instrument=$_SESSION['instrument'];
  
    $sql_instrument = " and ( ";
	$flag = 1;
	
	
    foreach ($instrument as $key => $value) 
	{
	  if ($flag == 1)
	  {
	  $flag = 2;
	  $sql_instrument = $sql_instrument . " ii.instrumentName like '%" . $value . "%'";
	  }
	  else
	  {
	  $sql_instrument = $sql_instrument . " or ii.instrumentName like '%" . $value . "%'";
	  }
  	}
	 $sql_instrument = $sql_instrument . " ) ";
   }
   else
   {
   }
  }
   
    
   
 //code for submaterial  
   
   $sql_submaterial = "";
   if (isset($_GET['submaterial'])) 
   {
   $submaterial=$_GET['submaterial'];
   $SESSION['submaterial']=$submaterial;
    $sql_submaterial = " and ( ";
	$flag = 1;
	
    foreach ($submaterial as $key => $value) 
	{ 
	  if ($flag == 1)
	  {
	  $flag = 2;
	  $sql_submaterial = $sql_submaterial . " ism.submaterialName like '%" . $value . "%'";
	  }
	  else
	  {
	  $sql_submaterial = $sql_submaterial . " or ism.submaterialName like '%" . $value . "%'";
	  }
  	 }
	 
	$sql_submaterial = $sql_submaterial . " ) ";
   }
   else{
    if(isset($_SESSION['submaterial'])){
	$material=$_SESSION['submaterial'];

    $sql_submaterial = " and ( ";
	$flag = 1;
	
    foreach ($submaterial as $key => $value) 
	{ 
	  if ($flag == 1)
	  {
	  $flag = 2;
	  $sql_submaterial = $sql_submaterial . " ism.submaterialName like '%" . $value . "%'";
	  }
	  else
	  {
	  $sql_submaterial = $sql_submaterial . " or ism.submaterialName like '%" . $value . "%'";
	  }
  	 }
	 
	$sql_submaterial = $sql_submaterial . " ) ";
	}
	else{
	}
  }
   
   
   
 //code for countryoforigin
  $sql_country = "";
  if ($country != "None")
  {
    $sql_country = " and countryoforigin = '" . $country . "'";
  }
   
//code for photoNumber  
$sql_photo="";
//echo $photonum;
     
//if (!empty($photonum))
 // {
    
	//$sql_photo  = "and photoNumber='".$photonum."'";
  //}
  
  
  
  
  $fir_las_tit = "  ";
   
  if ($lname != "" and $fname!="" and $title!="" )
	{
	 $fir_las_tit =  $fir_las_tit . " and (artistLname='" . $lname . "' or artistFname='" . $fname . "' or title='" . $title . "') " ;
	}	
	else if($lname == "" and $fname!="" and $title!="" )
	{
	 $fir_las_tit =  $fir_las_tit . " and(title='".$title."' or artistFname='".$fname."' ) " ;
	}
	else if($lname != "" and $fname=="" and $title!="" )
	{
	 $fir_las_tit =  $fir_las_tit . " and(artistLname='".$lname."' or title='".$title."' ) " ;
	}
	else if($lname != "" and $fname != "" and $title=="" )
	{
	 $fir_las_tit =  $fir_las_tit . "  and (artistLname='".$lname."' or artistFname='".$fname."' ) " ;
	}
    else if($lname == "" and $fname!="" and $title=="" )
    {
	 $fir_las_tit =  $fir_las_tit ."  and artistFname='" . $fname . "'";
    }
	else if($lname != "" and $fname=="" and $title=="")
	{
	  $fir_las_tit =  $fir_las_tit . " and artistLname='" . $lname . "'";
	}
    else if($lname == "" and $fname=="" and $title!="")
	{
	$fir_las_tit =  $fir_las_tit ." and title='".$title . "'" ;
	}
	else //if($lname == "" and $fname=="" and $title=="")
    {
    $fir_las_tit =  $fir_las_tit ;
    }
	
  
   
   
   $final_query  =   $main . $sql_genre . $sql_player . $sql_instrument . $sql_material .$sql_submaterial. $sql_country . $fir_las_tit;
   
   
   print "<br>";
   
   $result=mysqli_query($con, $final_query);	
	
  if($viewtype=="list")
  {
  ?><tr><th>Photo Number</th><th>Inventory Number</th><th>Category Name</th><th>Player Name</th><th>Instrument Name</th><th>Material Name</th><th>Title</th><th>Artist Name</th><th>Country of Origin</th><th>View Description</th></tr><?php 
  }
   $count1=0;
 
  while($inf = mysqli_fetch_array($result)) 
   { 
$va=$inf['photoNumber']."r";
$_SESSION[$va]=$inf['datereceived'];
   $search[$count1]=$inf['photoNumber'];
   $count1++;
   }
   if($count1==0)
   {
   print"<h3> No Results Found.</h3>";
   print"<h3><a href=adminsearch.php>Back to Search</a></h3>";
   }
   
   
   else{
   
   ?>
   
   
   <h3><div align="right" width="300px">
   <?php  if($viewtype=="normal"){
   ?>
   <a href="adminsearchresults.php?genre=<?php echo $genre;?>&subcat=<?php echo $subcat;?>&other=<?php echo $other;?>&country=<?php echo $country;?>&title=<?php echo $title;?>&lname=<?php echo $lname;?>&fname=<?php echo $fname;?>&rpp=<?php echo $rpp;?>&currpage=1&viewtype=list&inventory=<?php echo $searchinventory;?>&photonumber=<?php echo $searchphotonumber;?>">List View</a> &nbsp; &nbsp; <a href="adminsearchresults.php?genre=<?php echo $genre;?>&subcat=<?php echo $subcat;?>&other=<?php echo $other;?>&country=<?php echo $country;?>&title=<?php echo $title;?>&lname=<?php echo $lname;?>&fname=<?php echo $fname;?>&rpp=<?php echo $rpp;?>&currpage=1&viewtype=normal&inventory=<?php echo $searchinventory;?>&photonumber=<?php echo $searchphotonumber;?>"  disabled>Normal View</a> <?php
   }
   else
   {
   ?>
   <a href="adminsearchresults.php?genre=<?php echo $genre;?>&subcat=<?php echo $subcat;?>&other=<?php echo $other;?>&country=<?php echo $country;?>&title=<?php echo $title;?>&lname=<?php echo $lname;?>&fname=<?php echo $fname;?>&rpp=<?php echo $rpp;?>&currpage=1&viewtype=list&inventory=<?php echo $searchinventory;?>&photonumber=<?php echo $searchphotonumber;?>" disabled>List View</a> &nbsp; &nbsp; <a href="adminsearchresults.php?genre=<?php echo $genre;?>&ArtWork=<?php echo $artwork;?>&subcat=<?php echo $subcat;?>&other=<?php echo $other;?>&country=<?php echo $country;?>&title=<?php echo $title;?>&lname=<?php echo $lname;?>&fname=<?php echo $fname;?>&rpp=<?php echo $rpp;?>&currpage=1&viewtype=normal&inventory=<?php echo $searchinventory;?>&photonumber=<?php echo $searchphotonumber;?>"  >Normal View</a>
   <?php
   }
   ?>
   </h3></div>
   
   
   <?php
   printf("<h3><div align=right><a href=adminsearch.php>Main Search Page</a></h3></div>");
    if($count1==1)
	printf("<center><h2>%d Item found </center></h2>", $result->num_rows);
	else
	printf("<center><h2>%d Items found </center></h2>", $result->num_rows);

	
	

	
  $rem=$count1%$rpp;
   if($rem>0)
   $numofpages=floor($count1/$rpp) +1;
   else
   $numofpages=$count1/$rpp;
   $init=($currpage-1)*$rpp;
  
   
   if($numofpages==$currpage && $rem>0){
   for($i=$init;$i<$init+$rem;$i++){
   
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"museum");
   $pn=$search[$i];
    $sql=mysqli_query($con,"SELECT * from museumitem mi, itemplayer ip, itemsubmaterial ism, iteminstrument ii where mi.photoNumber = ip.photoNumber and mi.photoNumber = ism.photoNumber and mi.photoNumber = ii.photoNumber and mi.photoNumber='$pn'");
   
  
while($info=mysqli_fetch_array($sql))
{



   if($viewtype=="normal"){
   Print "<tr><td><img src='".$info['image']."' width=200px height=200px></img></td><td align='center'><br><br>";
   
	if($info['title']!="")
   {
   print "<b>Title:</b> ".$info['title'] . " <br><br>";
   }
   	print "<b>Photo Number: </b> ".$info['photoNumber'] . " <br><br>";
	if($info['inventoryNumber']!="")
	{
	print "<b>Inventory Number: </b> ".$info['inventoryNumber'] . " <br><br>&nbsp";
	}
	if($info['displayName']!="NULL")
	{
	print "<b>Display:</b> ".$info['displayName'] . " <br><br>";
	}
	if($info['categoryName']!="None")
	{
	print "<b>Category:</b> ".$info['categoryName'] . "<br><br>";
	}
	if($info['datereceived']!="none none")
	{
	print "<b>Date Received:</b> ".$info['datereceived'] . "<br><br>";
    }

print "<a href=admindisplay.php?photoNumber=".$info['photoNumber']."&index=".$i."&currpage=".$currpage."&rpp=".$rpp."&viewtype=".$viewtype."&searchinventory=".$searchinventory." &searchphotonumber=".$searchphotonumber."> <button type=button><b>View Description</b></button></a><br><br><br><br></td></tr>";
	

print"   <tr><td></td><td><hr></td></tr>";


}
else
{
?>
<tr><td align="center"><?php echo $info['photoNumber']; ?></td><td align="center"><?php echo $info['inventoryNumber'];?></td><td align="center"><?php echo $info['categoryName']?></td><td align="center"><?php echo $info['player_name']; ?></td><td align="center"><?php echo $info['instrumentName']; ?></td><td align="center"><?php echo $info['materialName']; ?></td><td align="center"><?php echo $info['title']; ?><td align="center"><?php echo $info['artistFname']; ?>&nbsp;<?php echo $info['artistMname']; ?><?php echo $info['artistLname']; ?><td align="center"><?php echo $info['countryoforigin']; ?></td></td></td><td><?php  print "<a href=admindisplay.php?photoNumber=".$info['photoNumber']."&index=".$i."&currpage=".$currpage."&rpp=".$rpp."&viewtype=".$viewtype. "&searchinventory=".$searchinventory." &searchphotonumber=".$searchphotonumber."> <button type=button><b>View Description</b></button></a>";?></td></tr>
<?php
 }
   }
  }
  if($viewtype=="list")
 {?><center>
 <div style="position:fixed;right:50pt;"><br/><br/><br/><br/><br/><br/><br/>
 <a href="export1.php?genre=<?php echo $genre;?>&subcat=<?php echo $subcat;?>&other=<?php echo $other;?>&country=<?php echo $country;?>&title=<?php echo $title;?>&lname=<?php echo $lname;?>&fname=<?php echo $fname;?>&rpp=<?php echo $rpp;?>&currpage=<?php echo $currpage;?>&viewtype=list&inventory=<?php echo $searchinventory;?>&photonumber=<?php echo $searchphotonumber;?>"><button type="button">Export to Excel sheet</button></a>
 </div>
 </center>
 <?php }
 

   }
   
   else{
   
   for($i=$init;$i<$init+$rpp;$i++)
   {
   
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"museum");
   $pn=$search[$i];
   $sql=mysqli_query($con,"SELECT * from museumitem mi, itemplayer ip, itemsubmaterial ism, iteminstrument ii where mi.photoNumber = ip.photoNumber and mi.photoNumber = ism.photoNumber and mi.photoNumber = ii.photoNumber and mi.photoNumber='$pn'");
   
 
while($info=mysqli_fetch_array($sql))
{
if($viewtype=="normal"){
   Print "<tr><td><img src='".$info['image']."' width=200px height=200px></img></td><td align='center'> <br><br>";
	if($info['title']!="")
   {
   print "<b>Title:</b> ".$info['title'] . " <br><br>";
   }
   	print "<b>Photo Number: </b> ".$info['photoNumber'] . " <br><br>";
	if($info['inventoryNumber']!="")
	{
	print "<b>Inventory Number: </b> ".$info['inventoryNumber'] . " <br><br>&nbsp";
	}
	if($info['displayName']!="NULL")
	{
	print "<b>Display:</b> ".$info['displayName'] . " <br><br>";
	}
	if($info['categoryName']!="None")
	{
	print "<b>Category:</b> ".$info['categoryName'] . "<br><br>";
	}
	if($info['datereceived']!="none none")
	{
	print "<b>Date Received:</b> ".$info['datereceived'] . "<br><br>";
	}

	print "<a href=admindisplay.php?photoNumber=".$info['photoNumber']."&index=".$i."&currpage=".$currpage."&rpp=".$rpp."&viewtype=".$viewtype."&searchinventory=".$searchinventory." &searchphotonumber=".$searchphotonumber."> <button type=button><b>View Description</b></button></a><br><br><br><br></td></tr>";
	
	
print"   <tr><td></td><td><hr></td></tr>";
}
else
{
?>
<tr><td align="center"><?php echo $info['photoNumber']; ?></td><td align="center"><?php echo $info['inventoryNumber'];?></td><td align="center"><?php echo $info['categoryName']?></td><td align="center"><?php echo $info['player_name']; ?></td><td align="center"><?php echo $info['instrumentName']; ?></td><td align="center"><?php echo $info['materialName']; ?></td><td align="center"><?php echo $info['title']; ?><td align="center"><?php echo $info['artistFname']; ?>&nbsp;<?php echo $info['artistMname']; ?>&nbsp;<?php echo $info['artistLname']; ?><td align="center"><?php echo $info['countryoforigin']; ?></td></td></td><td><?php  print "<a href=admindisplay.php?photoNumber=".$info['photoNumber']."&index=".$i."&currpage=".$currpage."&rpp=".$rpp."&viewtype=".$viewtype. "&searchinventory=".$searchinventory." &searchphotonumber=".$searchphotonumber."> <button type=button><b>View Description</b></button></a>";?></td></tr>
<?php  

 }
 }
 }
 }
	
   
   print "</table>";
   print"<hr>";
   
   $_SESSION['adminsearchresults']=$search;
   
   ?>
   <table align="left"></table>
   <?php 
   if($count1<=$rpp)
   {
   ?><tr><td><h3><?php echo $currpage;?></h3></td></tr><?php
   }
   else{
    $rem=$count1%$rpp;
   if($rem>0)
   $numofpages=floor($count1/$rpp)+1;
   else
   $numofpages=$count1/$rpp;
   $sum=0;
   ?>
   <tr><h3>
   <?php
   if($currpage>3){?>
   <td><a href="adminsearchresults.php?genre=<?php echo $genre;?>&photoNumber=<?php echo $photonum;?>&subcat=<?php echo $subcat;?>&other=<?php echo $other;?>&country=<?php echo $country;?>&title=<?php echo $title;?>&lname=<?php echo $lname;?>&fname=<?php echo $fname;?>&rpp=<?php echo $rpp;?>&currpage=1&viewtype=<?php echo $viewtype;?>&inventory=<?php echo $searchinventory;?>&photonumber=<?php echo $searchphotonumber;?>">1 </a>&nbsp; ..</td>
   <?php
   }
   $from=$currpage-2;
   $upto=$currpage+2;
   if($from<=0){
   $from=1;
   }
   if($upto>$numofpages){
   $upto=$numofpages;
   }
   for($i=$from;$i<$numofpages;$i++){
  if($sum>=5){
  break;
  }
  
   if($i==$currpage)
   {
   ?>
   <td><?php echo $currpage;?></td><?php
   }
   else{?>
    <td><a href="adminsearchresults.php?genre=<?php echo $genre;?>&photoNumber=<?php echo $info['photoNumber'];?>&subcat=<?php echo $subcat;?>&other=<?php echo $other;?>&country=<?php echo $country;?>&title=<?php echo $title;?>&lname=<?php echo $lname;?>&fname=<?php echo $fname;?>&rpp=<?php echo $rpp;?>&currpage=<?php echo $i;?>&viewtype=<?php echo $viewtype;?>&inventory=<?php echo $searchinventory;?>&photonumber=<?php echo $searchphotonumber;?>"><?php echo $i;?></a></td>
   <?php
   }
   $sum++;
   }
   
 ?>
   <td>&nbsp; .. &nbsp;<a href="adminsearchresults.php?genre=<?php echo $genre;?>&photoNumber=<?php echo $info['photoNumber'];?>&subcat=<?php echo $subcat;?>&other=<?php echo $other;?>&country=<?php echo $country;?>&title=<?php echo $title;?>&lname=<?php echo $lname;?>&fname=<?php echo $fname;?>&rpp=<?php echo $rpp;?>&currpage=<?php echo $numofpages;?>&viewtype=<?php echo $viewtype;?>&inventory=<?php echo $searchinventory;?>&photonumber=<?php echo $searchphotonumber;?>"> <?php echo $numofpages;?> </a></td>
   
   <?php
  ?>
   &nbsp; &nbsp; 
   <td><a href="adminsearch.php"> Main Search Page</a></td>&nbsp;&nbsp;<br/><br/>
  <?php 
  if($viewtype=="list")
 {?>
 <a href="export1.php?genre=<?php echo $genre;?>&subcat=<?php echo $subcat;?>&other=<?php echo $other;?>&country=<?php echo $country;?>&title=<?php echo $title;?>&lname=<?php echo $lname;?>&fname=<?php echo $fname;?>&rpp=<?php echo $rpp;?>&currpage=<?php echo $currpage;?>&viewtype=list&inventory=<?php echo $searchinventory;?>&photonumber=<?php echo $searchphotonumber;?>&photonumber=<?php echo $searchphotonumber;?>"><button type="button">Export to Excel sheet</button></a>
 <?php 
 }
 }
  ?>
   <div align="right">
   <?php
   if($rpp==2){?>
  <td align="right"><b>Results per page: &nbsp; &nbsp; </b><b>2</b> &nbsp; &nbsp; <a href="adminsearchresults.php?genre=<?php echo $genre;?>&photoNumber=<?php echo $photonum;?>&subcat=<?php echo $subcat;?>&other=<?php echo $other;?>&country=<?php echo $country;?>&title=<?php echo $title;?>&lname=<?php echo $lname;?>&fname=<?php echo $fname;?>&rpp=4&currpage=1&viewtype=<?php echo $viewtype;?>&inventory=<?php echo $searchinventory;?>&photonumber=<?php echo $searchphotonumber;?>"><b>4</b></a> &nbsp; &nbsp; <a href="adminsearchresults.php?genre=<?php echo $genre;?>&subcat=<?php echo $subcat;?>&other=<?php echo $other;?>&country=<?php echo $country;?>&title=<?php echo $title;?>&lname=<?php echo $lname;?>&fname=<?php echo $fname;?>&rpp=6&currpage=1&viewtype=<?php echo $viewtype;?>&inventory=<?php echo $searchinventory;?>&photonumber=<?php echo $searchphotonumber;?>"><b>6</b></a></td>
   
   <?php
   }
   else if($rpp==4){
   ?>
  
  <td align="right"><b>Results per page: &nbsp; &nbsp;</b> <a href="adminsearchresults.php?genre=<?php echo $genre;?>&photoNumber=<?php echo $photonum;?>&subcat=<?php echo $subcat;?>&other=<?php echo $other;?>&country=<?php echo $country;?>&title=<?php echo $title;?>&lname=<?php echo $lname;?>&fname=<?php echo $fname;?>&rpp=2&currpage=1&viewtype=<?php echo $viewtype;?>&inventory=<?php echo $searchinventory;?>&photonumber=<?php echo $searchphotonumber;?>">2</a> &nbsp; &nbsp; <b>4</b> &nbsp; &nbsp; <a href="adminsearchresults.php?genre=<?php echo $genre;?>&subcat=<?php echo $subcat;?>&other=<?php echo $other;?>&country=<?php echo $country;?>&title=<?php echo $title;?>&lname=<?php echo $lname;?>&fname=<?php echo $fname;?>&rpp=6&currpage=1&viewtype=<?php echo $viewtype;?>&inventory=<?php echo $searchinventory;?>&photonumber=<?php echo $searchphotonumber;?>"><b>6</b></a></td>
   <?php
   }
   else{?>
  
  <td align="right"><b>Results per page: &nbsp; &nbsp;</b> <a href="adminsearchresults.php?genre=<?php echo $genre;?>&photoNumber=<?php echo $photonum;?>&subcat=<?php echo $subcat;?>&other=<?php echo $other;?>&country=<?php echo $country;?>&title=<?php echo $title;?>&lname=<?php echo $lname;?>&fname=<?php echo $fname;?>&rpp=2&currpage=1&viewtype=<?php echo $viewtype;?>&inventory=<?php echo $searchinventory;?>&photonumber=<?php echo $searchphotonumber;?>">2</a> &nbsp; &nbsp; <a href="adminsearchresults.php?genre=<?php echo $genre;?>&subcat=<?php echo $subcat;?>&other=<?php echo $other;?>&country=<?php echo $country;?>&title=<?php echo $title;?>&lname=<?php echo $lname;?>&fname=<?php echo $fname;?>&rpp=4&currpage=1&viewtype=<?php echo $viewtype;?>&inventory=<?php echo $searchinventory;?>&photonumber=<?php echo $searchphotonumber;?>">4</a> &nbsp; &nbsp; <b>6</b></td>
 
 </div></h3></tr> </table>

   <?php
   
  
   }
   }
 mysqli_close($con);
 
 ?>
 <br>
 <br>
</body>
</html>
