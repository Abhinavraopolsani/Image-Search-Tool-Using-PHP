	
<?php
if(!isset($_COOKIE['authenticate']))
{
header('Location:login.html');
}
?>
		
					<html>
					
					  
					 <body>
					 <center>
					 <div align ="right"><h4>Charles A. McAdams Tuba Collection </h4></div> 
					 <form method='post' action="subcategorydb.php">
					 </br>
					 <h3 align="right"><a  id="submit"  href="logout.php">Logout </a></h3><br>
					 <table>
					 <br><br>
					 <tr>
					 <td><h3>Select Category &nbsp; &nbsp;<select name='category'></h3>
            <option value="">--- Select ---</option>
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
		</td>
					</tr>
					<tr>
						<td><h3>Enter SubCategory 
						<input type="text" name="subcategory"></h3></td>
					 </tr>
					 <tr align="center">
					 <td colspan="2"><input type = "submit" align= "right" name = "s" value = "Submit"> 
					 <?php
		$adminType=$_COOKIE['adminType'];
		if($adminType==0){
		$targ="usoptions.php";
		}
		else{
		$targ="options.php";
		}
		?>
					 <a href="<?php echo $targ;?>"><input type = "button"  name = "s" value = "Cancel"> </a>
</td></tr>
					 </table>
					 </center>
					  
					 </body>
					  </form>
					</html>
	
