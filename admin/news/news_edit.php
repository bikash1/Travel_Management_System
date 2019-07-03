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
include("../../database/connect.php");
  ?>
<form method="post" action="news_edited.php">
<font size="+3"><center><br /><br />Edit News && Event</center></font>
       <?php
	   if(isset($_GET['msg'])&& $_GET['msg']="blank")
	   {
	     ?> 
		 <font color="#CC0000">
	     <br><br><center>You must fill title and message</font></center>
		  </font>
		  <?php
		}
		$id=$_GET['id'];
		$qry="SELECT * FROM news WHERE `id`='$id'";
		$res=mysql_query($qry);
		$row=mysql_fetch_object($res);
		?>
		<table border="0" cellpadding="5" cellspacing="5" align="center">
		<tr>
		   <td>News Title</td><td><input type="text" name="title" value="<?php echo $row->newsName;?>"></td>
		</tr>
		<tr>
		  <td>Message</td><td><textarea name="message" cols="25" rows="16" ><?php echo $row->newsDescription;?></textarea></td>
		 </tr>
		 <tr>
		 <td><input type="hidden" name="id" value="<?php echo $id;?>" /></td></tr>
		 <tr>
			<td><input type="submit" name="submit" value="Edit" ></td>
		  </tr>	
		  </table>
  </form>
  <?php
  }
  
  

   ?>	