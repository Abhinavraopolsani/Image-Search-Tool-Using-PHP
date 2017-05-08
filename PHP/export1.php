<?php
session_start();
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"museum");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }



  $genre=$_GET['genre'];
  $i=1;
  $s=$genre.$i;
  
  
  
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
  

 
  
 $searchinventory="";
 $searchphotonumber="";
  // Queries Start here
  if(isset($_GET['photonumber']))
  {
  
  
  if(!($_GET['photonumber']==""))
  {
  $searchphotonumber=$_GET['photonumber'];
  $main  = "SELECT mi.photoNumber,mi.inventoryNumber,ip.player_name,ii.instrumentName,ism.materialName,mi.artistFname,mi.artistMname,mi.artistLname,mi.countryoforigin,mi.datereceived,mi.purchasePrice,mi.giftFrom,mi.manufacturer,mi.description,mi.categoryName,mi.subcategoryname,mi.displayName,mi.width,mi.length,mi.shelf,mi.itemcase,mi.image from museumitem mi, itemplayer ip, itemsubmaterial ism, iteminstrument ii where mi.photoNumber = ip.photoNumber and mi.photoNumber = ism.photoNumber and mi.photoNumber = ii.photoNumber and mi.photoNumber='".$_GET['photonumber']."'";
  }
  else 
  {
    $main  = "SELECT mi.photoNumber,mi.inventoryNumber,ip.player_name,ii.instrumentName,ism.materialName,mi.artistFname,mi.artistMname,mi.artistLname,mi.countryoforigin,mi.datereceived,mi.purchasePrice,mi.giftFrom,mi.manufacturer,mi.description,mi.categoryName,mi.subcategoryname,mi.displayName,mi.width,mi.length,mi.shelf,mi.itemcase,mi.image from museumitem mi, itemplayer ip, itemsubmaterial ism, iteminstrument ii where mi.photoNumber = ip.photoNumber and mi.photoNumber = ism.photoNumber and mi.photoNumber = ii.photoNumber";
  }
  }
  else
  {
   $main  = "SELECT mi.photoNumber,mi.inventoryNumber,ip.player_name,ii.instrumentName,ism.materialName,mi.artistFname,mi.artistMname,mi.artistLname,mi.countryoforigin,mi.datereceived,mi.purchasePrice,mi.giftFrom,mi.manufacturer,mi.description,mi.categoryName,mi.subcategoryname,mi.displayName,mi.width,mi.length,mi.shelf,mi.itemcase,mi.image from museumitem mi, itemplayer ip, itemsubmaterial ism, iteminstrument ii where mi.photoNumber = ip.photoNumber and mi.photoNumber = ism.photoNumber and mi.photoNumber = ii.photoNumber";
  }
 if(isset($_GET['inventory']))
 {
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
  if($other!=""){
  
   $sql_genre= $sql_genre . " and subcategoryname = '".$other ."'";
  }
  
   $sql_genre = $sql_genre . " ) ";
  }
  
   //code for player
   $sql_player = "";
   
   
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
   else{}
   
   
 
   
   //code for instrument
   $sql_instrument = "";
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
   else{
   }
   
   
   
   
   
  //material
   $sql_material = "";
    if(isset($_SESSION['material'])){
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
	else{}
  
   
 //code for submaterial  
   
   $sql_submaterial = "";
   
 if(isset($_SESSION['submaterial'])){
	$submaterial=$_SESSION['submaterial'];

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
	else{}
   
   
   
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
	
  
   
$SQL  =   $main . $sql_genre . $sql_player . $sql_instrument . $sql_material .$sql_submaterial. $sql_country . $fir_las_tit;
   
$header = '';
$result ='';
$exportData = mysqli_query ($con,$SQL ) or die ( "Sql error : " . mysql_error( ) );
 

$fields = mysqli_num_fields ( $exportData );
 
for ( $i = 0; $i < $fields; $i++ )
{
    $header .= mysqli_fetch_field_direct($exportData, $i)->name . "\t";
}
 
while( $row = mysqli_fetch_assoc( $exportData ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $result .= trim( $line ) . "\n";
}
$result = str_replace( "\r" , "" , $result );
 
if ( $result == "" )
{
    $result = "\nNo Record(s) Found!\n";                        
}
 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=export.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$result";
 
?>