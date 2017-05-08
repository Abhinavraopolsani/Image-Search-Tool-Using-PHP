
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
cust.other1.style.display='none';
}
}


else{
document.getElementById("select".concat(j)).style.display='none';
}
if(cust.genre.value == "Other")
{
	cust.other1.style.display='inline';
	
}
}

}
</script>
<script src="index.js" type="text/javascript"></script>


</head>

<div class="brand"><a href="index.php"><img align="left"  src="home.jpg" height="50" width="50"></a></div>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Visitor Search Page </title>
        <h4 align ="right">  Charles A. McAdams Tuba Collection  </h4>
        <h1 align ="center">Visitor Search Page</h1>
    
<body> 

   <form name="cust" action="searchresults.php" method="get">
      <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
   
  
  
<!--<form name="cust" method="post"  action="">-->
<div align="center">
          
             <table width="787" height="465"  border ="0">
          <tr>
            <td width ="100">Category:</td>
            <td width="363"><select id="genre" name="genre" onchange="dropdownlistgenerator()" tabindex = "7">
              <option value="None">None</option>
              <?php
			$i=0;
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
			
        <?php 
			 $clist=mysql_query("SELECT * FROM category");
			
            while($crow_list=mysql_fetch_assoc($clist)){
			$i++;
		
           ?>
         <select id="select<?php echo $i;?>" name="<?php echo urlencode($crow_list['categoryName'])."1"?>" hidden="true" >
         <option value="<?php echo $crow_list['categoryName'];?>">None</option>
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
			 </tr>
		 
		 <tr>
              <td> Player:</td>
     
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
                <input type="checkbox" name="player[]" value="Elephant">Elephant
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
		  </td>
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
	 <span><?php echo $mat['materialName']; ?> (<input type="checkbox" name="submaterial[]" value="Nails"/> Nails <input type="checkbox" name="submaterial[]" value="Nuts/Bolts"/> Nuts/Bolts <input type="checkbox" name="submaterial[]" value="Wire Metal"/> Wire Metal)</span>
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
		 
		  <input type="submit" name ="submit" value="Search">
		  </form>
		  <!--<a href="searchresults.php"><input type="button" align="center" value="Search"></a>-->
        </div>
        
</html>
