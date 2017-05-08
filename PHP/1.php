
<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
      <style type="text/css">
<!--
body {
	background-color: #CCCCFF;
}
-->
</style>

<script>


function dropdownlistgenerator()
{
if(cust.genre.value=="Drinkware")
{
	cust.Drinkware.style.display='inline';
	cust.ArtWork.style.display='none';
	cust.Figurine.style.display='none';
	cust.other.style.display='none';
}
else if(cust.genre.value =="Art Work")
{
	cust.ArtWork.style.display='inline';
	cust.Drinkware.style.display='none';
	cust.Figurine.style.display='none';
	cust.other.style.display='none';
}
else if(cust.genre.value =="Figurine")
{
	cust.Figurine.style.display='inline';
	cust.Drinkware.style.display='none';
	cust.ArtWork.style.display='none';
	cust.other.style.display='none';

}
else if(cust.genre.value == "Other")
{
	cust.other.style.display='inline';
	cust.Figurine.style.display='none';
	cust.Drinkware.style.display='none';
	cust.ArtWork.style.display='none';
}
else
{
	cust.Figurine.style.display='none';
	cust.Drinkware.style.display='none';
	cust.ArtWork.style.display='none';
	cust.other.style.display='none';
}

}
</script>





<div class="brand"><a href="adminoptions.php"><img align="left"  src="home.jpg" height="50" width="50"></a></div>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Visitor Search Page </title>
        <h4 align ="right">  R.Winston Morris Tuba Collection </h4>
        <h1 align ="center">Admin Search Page</h1>
         
    </head>
<body> 
  <form name="cust" action="adminsearchresults.php" method="get">
<!--<form name="cust" method="post"  action="">-->
<div align="center">
          
             <table width="800" height="465"  border ="0">
			 <tr>
		   	 <td>Photo Number:  </td>
			 <td width = "655"><input name="photonumber" type="text"></td>
			 </tr>
			 <tr>
			 <td >Inventory Number:  </td>
			 <td width = "655"><input name="inventory" type="text"></td>
			 </tr>
          <tr>
            <td width ="100">Category:</td>
            <td width="363"><select name="genre" onchange="dropdownlistgenerator()" tabindex = "7">
              <option value="None">None</option>
              <?php
	
            mysql_connect("localhost","root","");
            mysql_select_db("museum");
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
			
         <select name="ArtWork" hidden="true" >
            <option value="a_None">None</option>
     			<?php
			
            mysql_connect("localhost","root","");
            mysql_select_db("museum");
			$str="Art";
            $list=mysql_query("SELECT * FROM subcategory WHERE categoryName='Art Work'");
			
            while($row_list=mysql_fetch_assoc($list)){
		
            ?>
            <option value="<?php echo $row_list['subcategoryName']; ?>">
                <?php  echo $row_list['subcategoryName']; ?>
            </option>
			
            <?php
			
            }
            ?>
             </select>
             
            <select name="Figurine" hidden="true">
            <option value="f_None">None</option>
              <?php
			
            mysql_connect("localhost","root","");
            mysql_select_db("museum");
			$str="Art";
            $list=mysql_query("SELECT * FROM subcategory WHERE categoryName='Figurine'");
			
            while($row_list=mysql_fetch_assoc($list)){
		
            ?>
            <option value="<?php echo $row_list['subcategoryName']; ?>">
                <?php  echo $row_list['subcategoryName']; ?>
            </option>
			
            <?php
			
            }
            ?>
            </select>
             
            <select name="Drinkware" hidden="true" >
            <option value="d_None">None</option>
     				<?php
			
            mysql_connect("localhost","root","");
            mysql_select_db("museum");
			$str="Art";
            $list=mysql_query("SELECT * FROM subcategory WHERE categoryName='Drinkware'");
			
            while($row_list=mysql_fetch_assoc($list)){
		
            ?>
            <option value="<?php echo $row_list['subcategoryName']; ?>">
                <?php  echo $row_list['subcategoryName']; ?>
            </option>
			
            <?php
			
            }
            ?>
             </select>
             
             <input type="text" name="other" hidden="true" />             </td>
			 </tr>
		 <tr>
              <td> Player:
     
	   <td><div style="height:60px;width:60pxpx;border:1px solid #ccc;overflow:auto;">
                <input type="checkbox" name="player[]" value="Angel">Angel &nbsp;
                <input type="checkbox" name="player[]" value="Ant"> Ant
                <input type="checkbox" name="player[]" value="Bandsman">Bandsman
                <input type="checkbox" name="player[]" value="Bear">Bear
                <input type="checkbox" name="player[]" value="Boy">Boy
                <input type="checkbox" name="player[]" value="Cat">Cat
                <input type="checkbox" name="player[]" value="Clown">Clown
                <input type="checkbox" name="player[]" value="Dog">Dog
                <input type="checkbox" name="player[]" value="Elf">Elf
                <input type="checkbox" name="player[]" value="Elephant">Elephant&nbsp;&nbsp;
                <input type="checkbox" name="player[]" value="Frog">Frog
                <input type="checkbox" name="player[]" value="Grasshopper"> Grasshopper
                <input type="checkbox" name="player[]" value="Man"> Man
                <input type="checkbox" name="player[]" value="Monk">  Monk
                <input type="checkbox" name="player[]" value="Penguin"> Penguin
                <input type="checkbox" name="player[]" value="Pig"> Pig
                <input type="checkbox" name="player[]" value="Rabbit"> Rabbit
                <input type="checkbox" name="player[]" value="Santa"> Santa
                <input type="checkbox" name="player[]" value="Snowman"> Snowman
                <input type="checkbox" name="player[]" value="Soldier">Soldier
			</div></td>
			  
            </tr>
           <tr>
            
            <td> Instrument:</td>
            <td><div style="height:60px;width:680px;border:1px solid #ccc;overflow:auto;">

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
            <td height="68">Material:</td>
            
            <td><div style="height:60px;width:480px;border:1px solid #ccc;overflow:auto;">
			  <?php 
    //Create the query
    $sql = "SELECT `materialName` FROM material";

    //Run the query
    $query_resource = mysql_query($sql);
	?>
	<table>
	<tr>
	<?php

    //Iterate over the results that you've gotten from the database (hopefully MySQL)
	$matcount=0;
    while( $mat = mysql_fetch_assoc($query_resource) ):
	$matcount++;
	if($matcount/2 == 4){
	?>
	</tr>
	<tr>
	<?php }
	else {
	
	
	if($mat['materialName']=='Metal'){
	
?>
<input type="checkbox" name="material[]" value="<?php echo $mat['materialName']; ?> "/>
	 <span><?php echo $mat['materialName']; ?>(<input type="checkbox" name="submaterial[]" value="Nails"/> Nails <input type="checkbox" name="submaterial[]" value="Nuts/Bolts"/> Nuts/Bolts <input type="checkbox" name="submaterial[]" value="Wire Metal"/> Wire Metal)</span>
	 <?php
	 }
	 else{
	 ?>

  
    <input type="checkbox" name="material[]" value="<?php echo $mat['materialName']; ?> "/>
	 <span><?php echo $mat['materialName']; ?></span> 
     
<?php } }endwhile; 
?>
</tr>
              <input type="checkbox" name ="material_other"  value="Other"  onchange="material_checkbox_other()" tabindex = "53" />
              Other
  <input type="text" name="material_other_text_box" hidden="true" /><br /></div>            </td>
          </tr>
		  </table>
            <tr>
              <td> Country of Origin: </td>
              <td width = "655"><select name="country" id="country1">
                <option value="None" selected="selected">None</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Canada">Canada</option>
                <option value="China">China</option>
                <option value="Republic">Czech Republic</option>
                <option value="France">France</option>
                <option value="Germany">Germany</option>
                <option value="Greece">Greece</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Japan">Japan</option>
                <option value="Mexico">Mexico</option>
                <option value="Taiwan">Taiwan</option>
                <option value="UnitedKingdom">United Kingdom</option>
                <option value="UnitedStates">United States</option>
               </select></td>
            </tr>
            <tr>
              <td> Title: </td>
              <td width = "655"><input name="title" type="text"></td>
            </tr>
            <tr>
              <td> Artist Last Name: </td>
              <td width = "655"><input name="lname" type="text"></td>
            </tr>
              <td> Artist First Name: </td>
              <td width = "655"><input name="fname" type="text"></td>
            </tr>
			<tr> <td></td><td><input  type="hidden" name="rpp" id="rpp" value=2></input></td></tr>
			<tr> <td></td><td><input  type="hidden" name="currpage" id="currpage" value=1></input></td></tr>
			
          </table>
		 
		  <input type="submit" name ="submit" value="Search">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <?php
		  echo "<a href='adminoptions.php'><button type=button>Cancel</button>";
		  ?>
		  </form>
		  <!--<a href=searchresults.php><input type="button" align="center" value="Search"></a>-->
        </div>
        
</html>
