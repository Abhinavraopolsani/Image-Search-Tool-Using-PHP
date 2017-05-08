<?php
if(!isset($_COOKIE['authenticate']))
{
header('Location:login.php');
}
?>
<?xml version="1.0" encoding="UTF-8"?>

<!DOCTYPE html>
<html>
    <head>
        <script>
function open_win()
{
	window.open("image.php?imagesrc="+document.new.imagesrc.value+"");
}

// Popup window code
function newPopup()
{
	popupWindow = window.open(
		'delete.html','popUpWindow','height=100,width=400,left=500,top=200,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>

<style type="text/css">

</style><div><a href="index.php"><img align="left"  src="home.jpg" height="50" width="50"></a></div>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
		$photoNumber=$_POST['pnumber'];
		setcookie("photo",$photoNumber,0);
		$con= mysql_connect("localhost","root","");
            mysql_select_db("museum");
			$i=0;
			$data1 = mysql_query("SELECT * FROM  museumitem where photoNumber='".$photoNumber."'") ;
			while($row=mysql_fetch_array($data1))
{
$i++;
}
if($i==0){
?>
<script language="javascript">
alert("Item with PhotoNumber <?php echo $photoNumber;?> doesnot exist.");
window.location='http://localhost/MuseumDatabaseProject/review.php';
</script>


</h2>   
<?php
}
else{?>
	
<table align="right">
  <tr>
    
    <td>
		<script type="text/javascript">
		// Popup window code
		function newPopup() {
			popupWindow = window.open(
				url,'popUpWindow','height=200,width=400,left=500,top=200,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
		}
		</script>
		     
    <td><a  id="submit"  href="logout.php">Logout </a></td>
  </tr>
</table>

		
   <?php
			$data = mysql_query("SELECT * FROM  museumitem where photoNumber='".$photoNumber."'") ;
			while($row=mysql_fetch_array($data))
{
$inventoryNumber=$row['inventoryNumber'];
$categoryNumber=$row['categoryNumber'];
$datereceived=$row['datereceived'];
$purchasePrice=$row['purchasePrice'];
$giftFrom=$row['giftFrom'];
$title=$row['title'];
$lName=$row['artistLname'];
$mName=$row['artistMname'];
$fName=$row['artistFname'];
$width=$row['width'];
$length=$row['length'];
$manufacturer=$row['manufacturer'];
$desc=$row['description'];
$subcatname=$row['subcategoryname'];
$displayName=$row['displayName'];
$catName=$row['categoryName'];
$shelf=$row['shelf'];
$case=$row['itemcase'];
$countryoforigin=$row['countryoforigin'];
$image=$row['image'];


}
$data2 = mysql_query("SELECT * FROM  itemplayer where photoNumber='".$photoNumber."'") ;
			while($row2=mysql_fetch_array($data2))
			{
			$playername=$row2['player_name'];
			}
			setcookie("photoNumber",$photoNumber,0);
			setcookie("image",$image,0);
		?>
  
    <?php 
	$data3 = mysql_fetch_array(mysql_query("SELECT materialName FROM itemsubmaterial where photoNumber='".$photoNumber."'"));	
	$data4 = mysql_fetch_array(mysql_query("SELECT instrumentName FROM iteminstrument where photoNumber='".$photoNumber."'"));
	$data5 = mysql_fetch_array(mysql_query("SELECT player_name FROM itemplayer where photoNumber='".$photoNumber."'")); 
	$data6 = mysql_fetch_array(mysql_query("SELECT image FROM test_image where photoNumber='".$photoNumber."'"));
	
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
if ($displayName != "NULL")
{
Print "<td width =70%><p>&nbsp;</p>
                  <p>  <b>Display:</b>"; 
			Print "&nbsp;". $displayName;
            Print  "<label type=text name=display></label>";
					Print "<br></br>";  
}
else
{
Print "<b>Display:</b>"; 
  Print "<label type=text name=title>";
Print " N/A";
Print "</label> <br></br>";
}
?>
			<?php
//Title code hides if no value is present
if($title!= "")
{
Print "<b>Title:</b>"; 
  Print "<label type=text name=title>";
Print " &nbsp;".$title;
Print "</label> <br></br>";
}
else
{
Print "<b>Title:</b>"; 
  Print "<label type=text name=title>";
Print " N/A";
Print "</label> <br></br>";

}
?>

<?php

//Artist Name(first,last and middle) retrieving
if(($fName !="") or ($mName !="") or ($lName !="") )
{

Print "<b>Artist Name:</b>";
Print "<label type=text name=Fname>";
 Print " &nbsp; &nbsp;". $fName ." ";
Print "<label type =text name =Mname></label>";
Print $mName." ";
Print "<label type =text name =Lname></label>";
Print $lName;
Print "<br>";
}
else
{
Print "<b>Artist Name: </b>"; 
Print "<label type=text name=title>";
Print " N/A";
Print "</label> <br></br>";

}?>

<?php
if($catName!="") 
{
Print "<b>Category Name: </b> <label type =text name =category>";
 Print "". $catName ." ";
 Print "</label></br></br>";
}
else
{
Print "<b>Category Name: </b>"; 
  Print "<label type=text name=title>";
Print " N/A";
Print "</label> <br></br>";

}
?>
<?php
if($inventoryNumber !="")
{
Print "<b>Inventory Number: </b> <label type =text name =category>";
 Print $inventoryNumber;
Print "</label></br></br>";
}
else
{
Print "<b>Inventory Number: </b> <label type =text name =category>";
 Print "N/A";
Print "</label></br></br>";

}
?>


 <?php
// code for description
if($desc!="")
{
 Print "<b>Description: </b> </br>";
 Print "</p>";
 Print "<div style=\"height:120px;width:450px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;\">";
 Print $desc;
 Print "</div>";
 Print "</br></p>";
}
else{
Print "<b>Description:</b>"; 
  Print "<label type=text name=title>";
Print " N/A";
Print "</label> <br></br>";

}
?>
                </td>
         
                <td>
                <td width="30%">
Click on image to Enlarge <br/>
                <div><img id="pic" align="center" width="400" height="300" src="<?php print $data6['image'];?>" onclick ="open_win()"/>
</br>
<form name="new" action="image.html" method="GET" > 
 <input type="hidden" name="imagesrc" value="<?php print $data6['image'];?>">
</form>

<?php

if(($width != "") || ( $length!= ""))
{
//"Width :<label type ="text" name="width"><?php echo $info['width']</label>
//Length :<label type ="text" name="length"><?php echo $info['length']</label>
Print "Dimensions: ";
if($width==null)
{
}
else
{
Print "W ".$width." ''";
}
if($length==null)
{
}
else
{
Print "&nbsp;H ".$length." ''";
}
}
Print "&nbsp;&nbsp;Photo Number :".$photoNumber."";
?>

                </td>
            </tr>
           <tr>
                <td>
 <?php
 if($manufacturer!= "")
 {
 Print "<b>Manufacturer:</b> &nbsp; &nbsp;".$manufacturer."</br></br>";
 }

else{
Print "<b>Manufacturer:</b>"; 
  Print "<label type=text name=title>";
Print " N/A";
Print "</label> <br></br>";

} ?>
 
<?php
 if($purchasePrice!= null)
 {
 Print "<br></br>";
 Print "<b>Purchase price: $</b>&nbsp;".$purchasePrice."</br></br>";
 }

else
{
Print "<b>Purchase price:</b>"; 
  Print "<label type=text name=title>";
Print " N/A";
Print "</label> <br></br>";

} 
 ?>

 <?php
 if($countryoforigin ="country")
 {
Print "<b>Country of Origin:</b>"; 
Print "<label type=text name=title>";
Print " N/A";
Print "</label> <br></br>";
}
else
 {
    Print "<b>Country of Origin:</b>&nbsp;". $countryoforigin."</br></br>";
}
 ?>
 <?php
 if($data3['materialName']!="")
 {
 Print "<b>Material:</b> &nbsp; &nbsp;". $data3['materialName']."</br></br>";
 }
 else
 {
Print "<b>Material:</b>"; 
Print "<label type=text name=title>";
Print " N/A";
Print "</label> <br></br>";
 
 }
 ?> 
 
<?php
 
 if($playername!="")
 {
Print "<b>Player:</b> &nbsp;".$playername."</br></br>";
 }
 else
 {
Print "<b>Player:</b>"; 
Print "<label type=text name=title>";
Print " N/A";
Print "</label> <br></br>";
}
 
 if($data4['instrumentName']!="") 
 {
 Print "<b>Instrument:</b> &nbsp; &nbsp;". $data4['instrumentName']."</br></br>";
 }
 else
 {
 Print "<b>Instrument:</b>"; 
  Print "<label type=text name=title>";
Print " N/A";
Print "</label> <br></br>";

 }
 ?>
	  </tr>	
	
	<table width="252">
    <tr>
    <td width="127">
    <?php
if(($case!= "NULL") || ($shelf!= "NULL") )
{
Print "<table width=\"252\">";
 Print "<tr>";
 Print "<td width=\"127\">";
Print "<b>Display Location: </b> ";
 // <b>Display Location :</b> <label type ="text" name ="case"></label> <label type="text" name ="shelf"></label></td>
 Print "</tr>";
 Print "<tr>";
if( ($case != "NULL" )) 
{
 Print "<td>Case: ";
Print $case."</td>";
}
else
{
Print "<td>Case: ";
Print "N/A </td>";

}
if($shelf!= "NULL")
{
Print "<td width=\"113\">Shelf: ";
Print $shelf."</td>";
Print "</td>";
 Print "</tr>";
 Print "</table>";
 
}
else
{
Print "<td>shelf: ";
Print "N/A</td>";

}
}

 ?>    
 
<br>
<?php
 if($giftFrom != "")
 {
 Print "<b>Gift from:</b> &nbsp; &nbsp;".$giftFrom."</br></br>";
 }

 ?>
 <br>
 <?php 
if($datereceived="none none")
{
 Print "<b>Date Received:</b>&nbsp;N/A</br></br>";
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
</table><br/>
<br/>
	<?php
	}
	?>

    <table align="right">
    <tr>
    <td>
    <div align ="right"><a href="dataentry.php"> <button type="button"><b>Back</b></button></a> </div></td>
    <td><div align ="right"><a href="editreview.php"> <button type="button"><b>Edit</b></button></a> </div></td>
    <td><div align ="right"> <button type="button" onClick="window.print()" ><b>Print</b></button> </div></td>
   <td>


<script>
$(function()
    {
        $('#userfile').on('change',function ()
        {
            var filePath = $(this).val();
            $('#FilePath').val(filePath);
        });
    });

// Popup window code
function newPopup(url) 
{
	popupWindow = window.open(
		url,'popUpWindow','height=200,width=400,center=50,center=50,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
</tr>
</table>

<br/>
    </form>
  
    </body>
</html>
