
<!DOCTYPE html>
<?php session_start(); ?>
<html>
 <head>
<script type="text/css"></script>
<script>
function open_win()
{
window.open("image.php?imagesrc="+document.new.imagesrc.value+"")
}

 function myFunction()
 {
 alert("Are you sure you want to delete?");
 }
 
</script>
<div class="brand"><a href="adminoptions.php"><img align="left" src="home.jpg" height="50" width="50"></a></div>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <title>Item Description</title>
 <div align ="right"><h4>R.Winston Morris Tuba Collection </h4></div> 
 <div align ="center"><h1>Item Description</h1></div><br> <br>
</head>
 <body>
 <!--<table border="0">
 <tr>
 <td><b>Title:</b> <label type="text" name="title"></label><br></br></td>
 <td><div align="right"><img src="C:\Users\s515812\Desktop\project stuff\Boy with Rabbit-Anri 5616.jpg" alt="boy with rabbit" width="304" height="228"></div></td>
 </tr>
 </table>-->
 <?php 
 // Connects to your Database 
 mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("museum") or die(mysql_error()); 
 
if (!isset($_SESSION['adminsearchresults']))
{
    header('Location:adminsearch.php');
}
else{

 $search=$_SESSION['adminsearchresults'];
 
 $count=count($search);
 $index=$_GET['index'];
 $currpage=$_GET['currpage'];
 $rpp=$_GET['rpp'];
 
 $genre=$_SESSION['genre'];
 
 $subcat= $_SESSION['subcat'];

 $other=$_SESSION['other'];
 $viewtype=$_GET['viewtype'];
 $country= $_SESSION['country'];
 $title=$_SESSION['title'];
 $lname=$_SESSION['lname'];
 $fname=$_SESSION['fname'];
 $photoNumber=$_GET['photoNumber'];
 $va=$photoNumber."r";
 $daterecieved=$_SESSION[$va];
 if(isset($_GET['searchinventory'])){

$searchinventory=$_GET['searchinventory'];
}
else{
$searchinventory="";
}
if(isset($_GET['searchphotonumber'])){
$searchphotonumber=$_GET['searchphotonumber'];
}
else{
$searchphotonumber="";
}
 
 $data = mysql_query("SELECT * FROM museumitem where photoNumber='".$_GET['photoNumber']."' ORDER BY photoNumber") 
 or die(mysql_error()); 
 
 while($inf=mysql_fetch_array($data)){
 $categoryname=$inf['categoryName'];
 $pp=$inf['purchasePrice'];
 $gift=$inf['giftFrom'];
 }
 
 
 
 $data = mysql_query("SELECT * FROM museumitem where photoNumber='".$_GET['photoNumber']."' ORDER BY photoNumber") 
 or die(mysql_error()); 
 
 
 $data1 = mysql_fetch_array(mysql_query("SELECT player_name FROM itemplayer where photoNumber='".$_GET['photoNumber']."'")); 
 //or die(mysql_error()); 
 
 $data2 = mysql_fetch_array(mysql_query("SELECT materialName FROM itemsubmaterial where photoNumber='".$_GET['photoNumber']."'"));
 //or die(mysql_error());

 $data3 = mysql_fetch_array(mysql_query("SELECT instrumentName FROM iteminstrument where photoNumber='".$_GET['photoNumber']."'"));
 //or die(mysql_error()); 
 $data4 = mysql_fetch_array(mysql_query("SELECT image FROM test_image where photoNumber='".$_GET['photoNumber']."'"));
 Print "<table border cellpadding=3>"; 
 $info = mysql_fetch_array( $data );
 
 ?>
 
 <?php
 $defaults = array(
'before' => '<p>' . _( 'Pages:' ),
'after' => '</p>',
'link_before' => '',
'link_after' => '',
'next_or_number' => 'number',
'separator' => ' ',
'nextpagelink' => _( 'Next page' ),
'previouspagelink' => _( 'Previous page' ),
'pagelink' => '%',
'echo' => 1
);
 ?>
 
 <table align="center" border = "0">
<tr>
  <td  ><fieldset style="width:1200px">
    <table>
     
      <tr>
       <td >
          <tr>
		 <?php
//Display code hides if no value is present
if (($info['displayName']) != "NULL")
{
Print "<td width =70%><p>&nbsp;</p>
                  <p>  <b>Display:</b>"; 
			Print "&nbsp;". $info['displayName'];
            Print  "<label type=text name=display></label>";
					Print "<br></br>";  
}
else
{
Print "<td width =70%><p>&nbsp;</p>
                  <p>  <b>Display:</b>";
  Print "<label type=text name=title>";
Print " &nbsp;N/A";
Print "</label> <br></br>";
}
?>
			<?php
//Title code hides if no value is present
if(($info['title']) != "")
{
Print "<b>Title:</b>"; 
  Print "<label type=text name=title>";
Print " &nbsp;".$info['title'];
Print "</label> <br></br>";
}
else
{
Print "<b>Title:</b>"; 
  Print "<label type=text name=title>";
Print " &nbsp;N/A";
Print "</label> <br></br>";

}
?>

<?php

//Artist Name(first,last and middle) retrieving
if(($info['artistFname'] !="") or ($info['artistMname'] !="") or ($info['artistLname'] !="") )
{

Print "<b>Artist Name:</b>";
Print "<label type=text name=Fname>";
 Print " &nbsp;". $info['artistFname'] ." ";
Print "<label type =text name =Mname></label>";
Print $info['artistMname'] ." ";
Print "<label type =text name =Lname></label>";
Print $info['artistLname'];
Print "<br><br>";
}
else
{
Print "<b>Artist Name: </b>"; 
Print "<label type=text name=title>";
Print " &nbsp;N/A";
Print "</label> <br></br>";

}?>

<?php
if($categoryname!="") 
{
Print "<b>Category Name: </b> <label type =text name =category>";
 Print "&nbsp;". $categoryname ." ";
 Print "</label></br></br>";
}
else
{
Print "<b>Category Name: </b>"; 
  Print "<label type=text name=title>";
Print "&nbsp; N/A";
Print "</label> <br></br>";

}
?>
<?php
if($info['inventoryNumber'] !="")
{
Print "<b>Inventory Number: </b> <label type =text name =category>";
 Print "&nbsp;".$info['inventoryNumber']."";
Print "</label></br></br>";
}
else
{
Print "<b>Inventory Number: </b> <label type =text name =category>";
 Print "&nbsp;N/A";
Print "</label></br></br>";

}
?>


 <?php
// code for description
if($info['description'] !="")
{
 Print "<b>Description: </b> </br>";
 Print "</p>";
 Print "<div style=\"height:120px;width:450px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;\">";
 Print $info['description'];
 Print "</div>";
 Print "</br></p>";
}
else{
Print "<b>Description:</b>"; 
  Print "<label type=text name=title>";
Print " &nbsp;N/A";
Print "</label> <br></br>";

}
?>
                </td>
         
                <td>
                <td width="30%">
Click on image to Enlarge <br/>
                <div><img id="pic" align="center" width="400" height="300" src="<?php print $data4['image'];?>" onclick ="open_win()"/>
</br>
<form name="new" action="image.html" method="GET" > 
 <input type="hidden" name="imagesrc" value="<?php print $data4['image'];?>">
</form>

<?php

if(($info['width']) != "" || (($info['length']) != ""))
{
//"Width :<label type ="text" name="width"><?php echo $info['width']</label>
//Length :<label type ="text" name="length"><?php echo $info['length']</label>
Print "<b>Dimensions:</b> ";
if($info['width']==null)
{
}
else
{
Print "W ".$info['width']."''";
}
if($info['length']==null)
{
}
else
{
Print "&nbsp;H ".$info['length']."''";
}
}
Print "&nbsp;&nbsp;<b>Photo Number:</b> ".$photoNumber."";
?>

                </td>
            </tr>
           <tr>
                <td>
 <?php
 if($info['manufacturer'] != "")
 {
 Print "<b>Manufacturer:</b> &nbsp; &nbsp;".$info['manufacturer']."";
 }

else{
Print "<b>Manufacturer:</b>"; 
  Print "<label type=text name=title>";
Print " &nbsp;&nbsp;N/A </br></br>";
Print "</label>";

} ?>
 
<?php
 if($pp != null)
 {
 //Print "<br></br>";
 Print "<b>Purchase price: &nbsp;$</b>".$pp."</br></br>";
 }

else{
Print "<b>Purchase price:</b>"; 
  Print "<label type=text name=title>";
Print " &nbsp;N/A";
Print "</label> <br></br>";

} 
 ?>

 <?php
 if($info['countryoforigin'] ="country")
 {
Print "<b>Country of Origin:</b>"; 
Print "<label type=text name=title>";
Print " &nbsp;N/A";
Print "</label> <br></br>";
}
else
 {
    Print "<b>Country of Origin:</b>&nbsp;". $info['countryoforigin']."</br></br>";
}
 ?>
 <?php
 if($data2['materialName'] !="")
 {
 Print "<b>Material:</b> &nbsp; &nbsp;". $data2['materialName']."</br></br>";
 }
 else
 {
Print "<b>Material:</b>"; 
Print "<label type=text name=title>";
Print " &nbsp;&nbsp;N/A";
Print "</label> <br></br>";
 
 }
 ?> 
 
<?php
 
 if($data1['player_name'] !="")
 {
Print "<b>Player:</b> &nbsp;".$data1['player_name']."</br></br>";
 }
 else
 {
Print "<b>Player:</b>"; 
Print "<label type=text name=title>";
Print " &nbsp;N/A";
Print "</label> <br></br>";
}
 
 if($data3['instrumentName'] !="") 
 {
 Print "<b>Instrument:</b> &nbsp; &nbsp;". $data3['instrumentName'] ."</br><br/>";
 }
 else
 {
 Print "<b>Instrument:</b>"; 
  Print "<label type=text name=title>";
Print " &nbsp;&nbsp;N/A</br>";
Print "</label> ";

 }
 ?>
	  </tr>	
	
	<table width="252">
    <tr>
    <td width="127">
    <?php
if( ($info['itemcase'] != "NULL" )) 
{
Print "<td><b>Display Location:</b>";
Print "<b>Case:</b> &nbsp;&nbsp;&nbsp;".$info['itemcase']."";
Print "&nbsp;".$info['itemcase']."";
}
else
{
Print "<b>Display Location:</b> ";
Print "<td><b>Case:</b></td>";
Print "<td>&nbsp;N/A&nbsp;&nbsp;&nbsp;</td>";
}
if($info['shelf'] != "NULL")
{

Print "&nbsp;<td><b>Shelf:</b> &nbsp;".$info['shelf']."</td>";
Print "&nbsp;".$info['shelf']."</td>";
}
else
{
Print "<td><b>Shelf: </td></b>";
Print "<td>&nbsp;N/A</td>";
Print "</tr>";
Print "</table>";
}

 ?>    
 
<br>
<?php
 if($gift != "")
 {
 Print "<b>Gift from:</b> &nbsp; &nbsp;".$gift."<br/>";
 }
 else
 {
 Print "<b>Gift from:</b> &nbsp;&nbsp;N/A <br/>";
 }

 ?>
 <br>
 <?php 
if($daterecieved ="none none")
{
 Print "<b>Date Received:</b>&nbsp;&nbsp;N/A</br></br>";
}
else
{
Print "<b>Date Received:</b> &nbsp; &nbsp;".$daterecieved."</br></br>";
} ?>


	</td>
         
    </table>    
		  
        </table></td>
            </tr>
        
        </td>
       
      </tr>
      
  </fieldset></td>
</tr>
</table>
<br/>
<br/>
 
 <?php
if($index==0 && $index==$count-1)
{
print "<table>";
?> <td><a href="adminsearchresults.php?genre=<?php echo urlencode($genre);?>&subcat=<?php echo urlencode($subcat);?>&other=<?php echo $other;?>&country=<?php echo $country;?>&title=<?php echo $title;?>&lname=<?php echo $lname;?>&fname=<?php echo $fname;?>&currpage=<?php echo $currpage;?>&rpp=<?php echo $rpp;?>&viewtype=<?php echo $viewtype;?>&photonumber=<?php echo $photoNumber;?>&inventory=<?php echo $searchinventory;?>"> <button type="button"><b>Back to Search Results</b></button></a></td><?php 
print "<td><a href=adminsearch.php> <button type=button><b>Main Search Page</b></button></a></td>";

 print "<td><button type=button onClick=window.print()><b>Print</b></button> </td>";
 print" </table>";
}
elseif($index<$count && $index==0){
print "<table>";


$nextindex=$index+1;
?>

<td><a href="adminsearchresults.php?genre=<?php echo urlencode($genre);?>&subcat=<?php echo urlencode($subcat);?>&other=<?php echo $other;?>&country=<?php echo $country;?>&title=<?php echo $title;?>&lname=<?php echo $lname;?>&fname=<?php echo $fname;?>&currpage=<?php echo $currpage;?>&rpp=<?php echo $rpp;?>&viewtype=<?php echo $viewtype;?>&photonumber=<?php echo $searchphotonumber;?>&inventory=<?php echo $searchinventory;?>"><button type=button><b>Back to Search Results</b></button></a> </td><?php 
print "<td><a href=adminsearch.php> <button type=button><b>Main Search Page</b></button></a></td>";
 print "<td> <button type=button onClick=window.print()><b>Print</b></button> </td>";
 print "<td><a href=admindisplay.php?photoNumber=".$search[$nextindex]."&index=".$nextindex."&currpage=".$currpage."&rpp=".$rpp."&viewtype=".$viewtype."&photonumber=".$searchphotonumber."&inventory=".$searchinventory."> <button type=button><b> Next>> </b></button></a></td>";
 print" </table>";
}
elseif($index<$count && $index>0 && $index!=$count-1){
print "<table>";

$previndex=$index-1;
$nextindex=$index+1;

print "<td><a href=admindisplay.php?photoNumber=".$search[$previndex]."&index=".$previndex."&currpage=".$currpage."&rpp=".$rpp."&viewtype=".$viewtype."&photonumber=".$searchphotonumber."&inventory=".$searchinventory."> <button type=button><b><< Prev</b></button></a></td>";
?>

<td><a href="adminsearchresults.php?genre=<?php echo urlencode($genre);?>&subcat=<?php echo urlencode($subcat);?>&other=<?php echo $other;?>&country=<?php echo $country;?>&title=<?php echo $title;?>&lname=<?php echo $lname;?>&fname=<?php echo $fname;?>&currpage=<?php echo $currpage;?>&rpp=<?php echo $rpp;?>&viewtype=<?php echo $viewtype;?>&photonumber=<?php echo $searchphotonumber?>&inventory=<?php echo $searchinventory;?>"> <button type=button><b>Back to Search Results</b></button></a> </td><?php
print "<td><a href=adminsearch.php> <button type=button><b>Main Search Page</b></button></a></td>";
 print "<td> <button type=button onClick=window.print()><b>Print</b></button> </td>";
 print "<td><a href=admindisplay.php?photoNumber=".$search[$nextindex]."&index=".$nextindex."&currpage=".$currpage."&rpp=".$rpp."&viewtype=".$viewtype."&photonumber=".$searchphotonumber."&inventory=".$searchinventory."> <button type=button><b> Next>> </b></button></a></td>";
 print" </table>";
}
elseif($index==$count-1)
{

print "<table>";
$previndex=$index-1;
print "<td><a href=admindisplay.php?photoNumber=".$search[$previndex]."&index=".$previndex."&currpage=".$currpage."&rpp=".$rpp."&viewtype=".$viewtype."&photonumber=".$searchphotonumber."&inventory=".$searchinventory."> <button type=button><b><< Prev</b></button></a></td>";?>

<td><a href="adminsearchresults.php?genre=<?php echo urlencode($genre);?>&subcat=<?php echo urlencode($subcat);?>&other=<?php echo $other;?>&country=<?php echo $country;?>&title=<?php echo $title;?>&lname=<?php echo $lname;?>&fname=<?php echo $fname;?>&currpage=<?php echo $currpage;?>&rpp=<?php echo $rpp;?>&viewtype=<?php echo $viewtype;?>&photonumber=<?php echo $searchphotonumber?>&inventory=<?php echo $searchinventory;?>"> <button type=button><b>Back to Search Results</b></button></a> </td><?php
print "<td><a href=adminsearch.php> <button type=button><b>Main Search Page</b></button></a></td>";
 print "<td> <button type=button onClick=window.print()><b>Print</b></button> </td>";
 
 print" </table>";

}
else
{

}
}
 ?>

</center></br>
<br>
</br>
 </body>
</html>
