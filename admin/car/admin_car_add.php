<?php
session_start();
include("../../database/functions.php");
if(!isset($_SESSION['admin']))
{
redirect("../../pages/login.php");
}
else
{
include("../admin.php");

 
echo"<br><br><font size=\"+3\"><center>Add a new car</center></font>";
      
	   if(isset($_GET['msg'])&& $_GET['msg']="blank")
	   {
	     ?> 
		 <font color="#CC0000">
	     <br><br><center>You must fill title and message</font></center>
		  </font>
		  <?php
		}
		?>
	

		<form method="post" action="admin_car_added.php"  >
		<table border="0" cellpadding="5" cellspacing="5" align="center">
		<tr>
		   <td>Car Model</td><td><input type="text" name="car_model"></td>
		</tr>
		<tr>
		  <td>Available Location</td><td><textarea name="available_location" cols="15" rows="5"></textarea></td>
		 </tr>
		 <tr>
		  <td>Fare </td><td><input type="text" name="fare" /></td>
		  </tr>
		  <tr>
		  <td>Status</td><td><input type="text" name="status"/></td>
		  </tr>
		 <tr>
			<td><input type="submit" name="submit" value="Add"  ></td>
		  </tr>	
		  </table>
  </form>
  <?php
  }
  ?>
  