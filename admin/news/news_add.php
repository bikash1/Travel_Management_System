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
if(isset($_SESSION['admin']))
  {
  ?>
<form method="post" action="news_added.php">
<font size="+3"><center><br /><br />Add News && Events</center></font>
       <?php
	   if(isset($_GET['msg'])&& $_GET['msg']="blank")
	   {
	     ?> 
		 <font color="#CC0000">
	     <br><br><center>You must fill title and message</font></center>
		  </font>
		  <?php
		}
		?>
		<table border="0" cellpadding="5" cellspacing="5" align="center">
		<tr>
		   <td>News Title</td><td><input type="text" name="title"></td>
		</tr>
		<tr>
		  <td>Message</td><td><textarea name="message" cols="25" rows="16"></textarea></td>
		 </tr>
		 <tr>
			<td><input type="submit" name="submit" value="Add" ></td>
		  </tr>	
		  </table>
  </form>
  <?php
  }
  else
  {
    redirect("../admin.php");
   }
   ?>	
   <?php
   }
   ?>