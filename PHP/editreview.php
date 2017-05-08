<?php
if(!isset($_COOKIE['authenticate']))
{
header('Location:login.php');
}
?>
<?xml version="1.0" encoding="UTF-8"?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Museum Database</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
function validate()
{
 
 	
 	if(show.photonumber.value=="")
 	{
  		alert("Photo Number should not be Empty!");
  		return false;
 	}
}


function dropdownlistgenerator()

{

var j;
var cat=document.getElementById("genre").value;
//alert(cat);
var i=document.getElementById("i").value;
for(j=1;j<=i;j++){

if(document.getElementById("select".concat(j)).value==cat){
if(cat=="Other"){

}
else{
//alert(document.getElementById("select".concat(j)).value);
document.getElementById("select".concat(j)).style.display='inline';
show.other1.style.display='none';
}
}


else{
document.getElementById("select".concat(j)).style.display='none';
}
if(show.genre.value == "Other")
{
	show.other1.style.display='inline';
	
}
}
}



var isDisplayed = false;

function player_checkbox_other()

{
	isDisplayed = false;

  if(show.player_other.value == "Other")

  {

    if(isDisplayed)

    {

      show.player_other_text_box.style.display = 'none';

      isDisplayed = false;	

    }

    else

    {  

      show.player_other_text_box.style.display = 'inline';

  	  isDisplayed = true;

    }

  }

}

function material_checkbox_other()

{

  if(show.material_other.value == "Other")

  {
	isDisplayed = false;

    if(isDisplayed)

    {

      show.material_other_text_box.style.display = 'none';

      isDisplayed = false;	

    }

    else

    {  

      show.material_other_text_box.style.display = 'inline';

  	  isDisplayed = true;

    }

  }

}


</script>



<script>

function reset_form()

{

 if(reset.value=="Reset")

  { 
  
	isDisplayed = false;

	show.player_other_text_box.style.display = 'none';
	
	show.material_other_text_box.style.display = 'none';

	show.Figurine.style.display='none';

	show.Drinkware.style.display='none';

	show.ArtWork.style.display='none';

	show.other.style.display='none';

   }

}
</script>


</head>
<body bgcolor="#E6E6FA">
     
	 <?php
	$photoNumber=$_COOKIE['photo'];
	
		$con= mysql_connect("localhost","root","");
            mysql_select_db("museum");
			$i=0;
			$data1 = mysql_query("SELECT * FROM  museumitem where photoNumber='".$photoNumber."'") ;
			while($row=mysql_fetch_array($data1))
{
$i++;
}
if($i==0)
{
?>
<script language="javascript">
alert("Item with PhotoNumber <?php echo $photoNumber;?> doesnot exist. Please try another item.");

</script>
<h2><a href="edititem.php">Edit another Item</a> &nbsp;	
<?php
		$adminType=$_COOKIE['adminType'];
		if($adminType==0){
		$targ="useroptions.php";
		}
		else{
		$targ="adminoptions.php";
		}
		?>
					<td> <a href="<?php echo $targ;?>">Go To Main Menu </a></td>		 


</h2>
<?php
}
else{?>
        <form name="show" enctype="multipart/form-data"  action="dataupdate.php" method="POST"  > 
		<h3 align="right">R.Winston Morris Tuba Collection</h3>
		
        <h1 align="center">Data Edit Form</h1>
		
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
<h4 align= "left">(* fields are mandatory)
</h4>
<table align="center" border = "0">
<tr>
  <td  ><fieldset style="width:1200px">
  
	
    <table>
     
      <tr>
        
        <td >
          <fieldset style ="width:550px" align="center">
            <legend><b>Display</b></legend>
			<?php if($displayName=="RWM")
			{?>
            <input type="radio" name ="display"  value="RWM" checked tabindex = "1" />
            RWM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php } else{?>
			<input type="radio" name ="display"  value="RWM"  tabindex = "1" />
            RWM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php }?>
			
			<?php if($displayName=="TTTE")
			{?>
            <input type="radio" name ="display"  value="TTTE" checked tabindex = "1" />
            TTTE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php } else{?>
			<input type="radio" name ="display"  value="TTTE"  tabindex = "1" />
            TTTE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php }?>
			
			<?php if($displayName=="Collection")
			{?>
            <input type="radio" name ="display"  value="Collection" checked tabindex = "1" />
            Collection 
			<?php } else{?>
			<input type="radio" name ="display"  value="Collection"  tabindex = "1" />
            Collection 
			<?php }?>
          </fieldset>
        </div></td>
        
        <td  align ="center">
          <table width="315">
            <tr>
              <td>Inventory Number</td>
              <td><input type="text" name ="inventory" tabindex = "4" value="<?php echo $inventoryNumber;?>"/></td>
              </tr>
            <tr>
              <td> Genre Number </td>
              <td><input type="text" name ="genrenumber"  tabindex = "5" value="<?php echo $categoryNumber;?>"/></td>
              </tr>
            <tr>
              <td> Photo Number * </td>
              <td><input type="text" name ="photonumber" tabindex = "6" value="<?php echo $photoNumber;?>" disabled=true/></td>
              </tr>
          </table>
        </div></td>
      </tr>
      <tr>
      
        <td><table border ="0">
          <tr>
            <td width ="100">Category:</td>
            <td width="363"><select name="genre" id="genre" onchange="dropdownlistgenerator()" tabindex = "7">
              <option value="<?php echo $catName ;?>"><?php echo $catName ;?></option>
              <?php
			$i=0;
           
            $list=mysql_query("SELECT * FROM category");
			
            while($row_list=mysql_fetch_assoc($list)){
		
            ?>
            <option value="<?php echo $row_list['categoryName']; ?>">
                <?php  echo $row_list['categoryName']; ?>
            </option>
			
            <?php
			
            }
            ?>
              </select>
			

            
           <?php 
			 $clist=mysql_query("SELECT * FROM category");
			
            while($crow_list=mysql_fetch_assoc($clist)){
			$i++;
		
           ?>
		   
         <select id="select<?php echo $i;?>" name="<?php echo $crow_list['categoryName']."1"?>" <?php if($crow_list['categoryName']==$catName){}else{ echo "hidden=true";}?> >
		 
         <option value="<?php echo $subcatname;?>"><?php echo $subcatname;?></option>
     			<?php
			
           
            $slist=mysql_query("SELECT * FROM subcategory WHERE categoryName='".$crow_list['categoryName']."'");
			
            while($srow_list=mysql_fetch_assoc($slist)){
		
            ?>
            <option value="<?php echo $srow_list['subcategoryName']; ?>">
                <?php  echo $srow_list['subcategoryName']; ?>
            </option>
			
            <?php
			}
            
            ?>
             </select>
			 
			 <?php }
            ?>
             
           
             <input type="hidden" id="i" value="<?php echo $i;?>">
             
             <input type="text" name="other1" hidden="true" />             </td>
          <tr>
            <td height="90">Player:</td>
            <td><div style="height:60px;width:400px;border:1px solid #ccc;overflow:auto;">
			<?php if($playername=="Angel"){?>
              <input type="checkbox" name ="player[]" value="Angel" checked tabindex = "8" />
			   Angel
			   &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
			  <?php
			  }
			  else { ?>
			  <input type="checkbox" name ="player[]" value="Angel" tabindex = "8" />
              Angel
              &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
			  <?php } ?>
			  
			  <?php if($playername=="Ant"){?>
              <input type="checkbox" name ="player[]" value="Ant" checked tabindex = "9" />
              Ant <br/>
			  <?php
			  }
			  else{?>
			  <input type="checkbox" name ="player[]" value="Ant" checked tabindex = "9" />
              Ant <br/>
			  <?php } ?>
			  
			  
			  
              <input type="checkbox" name ="player[]" value="Bandsman" tabindex = "10" />
              Bandsman
              &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
              <input type="checkbox" name ="player[]" value="Bear" tabindex = "11" />
              Bear <br />
              <input type="checkbox" name ="player[]"  value="Boy" tabindex = "12" />
              Boy
              &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                <input type="checkbox" name ="player[]"  value="Cat" tabindex = "13" />
              Cat <br/>
  <input type="checkbox" name ="player[]"  value="Clown" tabindex = "14" />
              Clown 
              &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                <input type="checkbox" name ="player[]"  value="Dog" tabindex = "15" />
              Dog <br/>
  <input type="checkbox" name ="player[]"  value="Elf" tabindex = "16" />
              Elf
              &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                <input type="checkbox" name ="player[]"  value="Elephant" tabindex = "17" />
              Elephant <br/>
  <input type="checkbox" name ="player[]"  value="Frog" tabindex = "18" />
              Frog 
              &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                <input type="checkbox" name ="player[]"  value="Girl" tabindex = "19" />
              Girl <br/>
  <input type="checkbox" name ="player[]"  value="Grasshopper" tabindex = "20" />
              Grasshopper 
              &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                <input type="checkbox" name ="player[]"  value="Man" tabindex = "21" />
              Man <br/>
  <input type="checkbox" name ="player[]"  value="Monk" tabindex = "22" />
              Monk 
              &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                <input type="checkbox" name ="player[]"  value="Penguin"  tabindex = "23" />
              Penguin <br/>
  <input type="checkbox" name ="player[]"  value="Pig" tabindex = "24" />
              Pig 
              &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="checkbox" name ="player[]"  value="Rabbit" tabindex = "25" />
              Rabbit <br/>
  <input type="checkbox" name ="player[]"  value="Santa" tabindex = "26" />
              Santa 
              &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name ="player[]"  value="Snowman" tabindex = "27"/>
              Snowman <br/>
  <input type="checkbox" name ="player[]" value="Soldier" tabindex = "28" />
              Soldier 
              &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                <input type="checkbox" name ="player[]"  value="Woman" tabindex = "29" />
              Woman <br/>
  <input type="checkbox" name ="player_other"  value="Other"  onchange="player_checkbox_other()" />
              Other
  <input type="text" name="player_other_text_box" hidden="true" />
            </div></td>
          <tr>
            <td height="68">Material:</td>
            
            <td><div style="height:60px;width:400px;border:1px solid #ccc;overflow:auto;">
			  <?php 
    //Create the query
    $sql = "SELECT `materialName` FROM material";

    //Run the query
    $query_resource = mysql_query($sql);

    //Iterate over the results that you've gotten from the database (hopefully MySQL)
    while( $mat = mysql_fetch_assoc($query_resource) ):
?>

   
    <input type="checkbox" name="material[]" value="<?php echo $mat['materialName']; ?> "/>
	 <span><?php echo $mat['materialName']; ?></span>

<?php endwhile; ?>
              <input type="checkbox" name ="material_other"  value="Other"  onchange="material_checkbox_other()" tabindex = "53" />
              Other
  <input type="text" name="material_other_text_box" hidden="true" /><br /></div>            </td>
          </tr>
          <tr>
            <td>Title:</td>
            <td><textarea name="title" tabindex = "54" cols="2" rows="1"  style="height:50px;width:350px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:none;"><?php echo $title;?></textarea>

    </br></td>
          </tr>
          <tr>
            <td>Manufacturer:</td>
             <td><input type="text" name="manufacturer" value="<?php echo $manufacturer;?>" tabindex = "60"/></td>
            <!--<td>Date Received</td>
                            <td> <input type="text" id="txtdate"/>-->
          </tr>
          <tr>
            <td>Purchase Price:</td>
            <td>   $ 
              <input type="text" tabindex = "64" value="<?php echo $purchasePrice;?>" name="price1"/></td>
          </tr>
          <tr>
            <td>Description:</td>
            <td><textarea name="description" tabindex = "66"   cols="6" rows="2" style="height:130px;width:550px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;"><?php echo $desc;?> </textarea>
              </br></td>
          </tr>
          
        </table></td>
        
        <td><table border="0" ><tr><td><table border="0" >
          <tr></tr>
          <tr></tr>
          <tr>
            
            <td> Instrument:</td>
            <td><div style="height:95px;width:380px;border:1px solid #ccc;overflow:auto;">

                <?php 
    //Create the query
    $sql = "SELECT `instrumentName` FROM instrument";

    //Run the query
    $query_resource = mysql_query($sql);

    //Iterate over the results that you've gotten from the database (hopefully MySQL)
    while( $inst = mysql_fetch_assoc($query_resource) ):
?>

   
    <input type="checkbox" name="instrument[]" value="<?php echo $inst['instrumentName']; ?> "/>
	 <span><?php echo $inst['instrumentName']; ?></span>

<?php endwhile; ?>
          </tr>
          <tr>
            
            <td>Artist First Name:</td>
            <td><input type="text" tabindex = "55" name="fname"  value="<?php echo $fName;?>"/></td>
          </tr>
          <tr>
            
            <td>Artist Middle Name:</td>
            <td><input type="text" tabindex = "56" name="mname" value="<?php echo $mName;?>"/></td>
          </tr>
          <tr>
            
            <td>Artist Last Name:</td>
            <td><input type="text" tabindex = "57" name="lname" value="<?php echo $lName;?>"/></td>
          </tr>
          <tr>
            
            <td>Dimensions:</td>
            <td>Width:
              <input type="text" tabindex = "58" name="dimension_width" value="<?php echo $width;?>"/></td>
          </tr>
          <tr>
            
            <td></td>
            <td>Height:
              <input type="text" tabindex = "59" name="dimension_height" value="<?php echo $length;?>"/></td>
          </tr>
          <tr>
            
            <td>Country of origin:</td>
            <td><select name="country" tabindex = "61">
                <option value="<?php echo $countryoforigin;?>" selected="selected"><?php echo $countryoforigin;?></option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Cannada">Canada</option>
                <option value="China">China</option>
                <option value="Republic">Czech Republic</option>
                <option value="France">France</option>
                <option value="Germany">Germany</option>
                <option value="Greece">Greece</option>
				<option value="India">India</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Japan">Japan</option>
                <option value="Mexico">Mexico</option>
				<option value="Spain">Spain</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Unitedkingdom">United Kingdom</option>
                <option value="UnitedStates">United States</option>
                
            </select></td>
          </tr>
		  <tr>
            
            <td>Date Received: </td>
            <td><select name="month" id="month" tabindex = "62">
				<option value="none">None</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
              </select>
                <select name="year" id="year" tabindex = "63">
				<option value="none">None</option>
                  <option value="1975">1975</option>
                  <option value="1976">1976</option>
                  <option value="1977">1977</option>
                  <option value="1978">1978</option>
                  <option value="1979">1979</option>
                  <option value="1980">1980</option>
                  <option value="1981">1981</option>
                  <option value="1982">1982</option>
                  <option value="1983">1983</option>
                  <option value="1984">1984</option>
                  <option value="1985">1985</option>
                  <option value="1986">1986</option>
                  <option value="1987">1987</option>
                  <option value="1988">1988</option>
                  <option value="1989">1989</option>
                  <option value="1990">1990</option>
                  <option value="1991">1991</option>
                  <option value="1992">1992</option>
                  <option value="1993">1993</option>
                  <option value="1994">1994</option>
                  <option value="1995">1995</option>
                  <option value="1996">1996</option>
                  <option value="1997">1997</option>
                  <option value="1998">1998</option>
                  <option value="1999">1999</option>
                  <option value="2000">2000</option>
                  <option value="2001">2001</option>
                  <option value="2002">2002</option>
                  <option value="2003">2003</option>
                  <option value="2004">2004</option>
                  <option value="2005">2005</option>
                  <option value="2006">2006</option>
                  <option value="2007">2007</option>
                  <option value="2008">2008</option>
                  <option value="2009">2009</option>
                  <option value="2010">2010</option>
                  <option value="2011">2011</option>
                  <option value="2012">2012</option>
                  <option value="2013">2013</option>
                  <option value="2014">2014</option>
                  <option value="2015">2015</option>
                  <option value="2016">2016</option>
                </select>            </td>
            
          </tr>
          <tr>
            
            <td>Gift/from whom</td>
            <td><input type="text" tabindex = "65" name="gift" value="<?php echo $giftFrom;?>"/ ></td>
          </tr>
          <tr>
            
            <td>Display Location:</td>
			
            <td>Case:
              <input type="text" tabindex = "67" name="case" value="<?php echo $case;?>"/></td>
          </tr>
          <tr>
            
            <td></td>
            <td>Shelf:
              <input type="text" name="shelf" tabindex = "68" value="<?php echo $shelf;?>"/ ></td>
          </tr>
          
		  <tr>
		  <td>
		  Upload : 
		  </td>
		  <td>
		  <input name="userfile" type="file" tabindex = "69" accept="image/* " />
		  </td>
		  </tr>
		  
        </table></td>
            </tr>
        </table>
        
        </td>
       
      </tr>
      
    </table>
  </fieldset></td>
</tr>
</table>
<br/>
<br/>


<table align="center">
	<tr>
		<td><input type="submit" tabindex = "70" name="sub" value="Update" onclick="return validate()"/></td>
		
		<td><button type="button" tabindex = "72" onClick="window.print()" ><b>Print</b></button></td>
		<?php
		$adminType=$_COOKIE['adminType'];
		if($adminType==0){
		$targ="usoptions.php";
		}
		else{
		$targ="options.php";
		}
		?>
					<td> <a href="<?php echo $targ;?>"><input type = "button"  name = "s" value = "Cancel"> </a></td>

		
	<?php
	}
	?>
		
		
		


		

<script>
$(document).ready(function()
    {
        $('#userfile').on('change',function ()
        {
            var filePath = $(this).val();
            $('#FilePath').val(filePath);
        });
    });

// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=200,width=400,center=50,center=50,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes');
}
</script>
</tr>
</table>

<br/>
    </form>
    </body>
</html>