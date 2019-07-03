<?php
session_start();
include("../../database/functions.php");
if(!isset($_SESSION['admin']))
{
redirect("../../pages/login.php");
}
else
{
 
if(isset($_POST['submit']))
   {
   include("../../database/connect.php");
     $name=$_POST['name'];
	 $description=$_POST['description'];
	 $type=$_POST['type'];
	 
	 if(empty($name)|| empty($description) || empty($type))
	 { 
	   redirect("page_add.php?123=blank");
	  }
	  else
	  {
	 $qry="INSERT INTO tbl_cms SET
	        `page_name`='$name',
			`description`='$description',
			`type`='$type'"; 
	    $res=mysql_query($qry);
		$page_id=mysql_insert_id($con);
		/*$_SESSION['page_id']=$page_id;*/
		redirect("add_image.php?msg=add_success&page_id=".$page_id);
	  }		
	 }
	
	 
	
include("../admin.php");

  ?>
<form method="post" action="">

<font size="+3"><center><br /><br />Add a new page</center></font>

       <?php
	   if(isset($_GET['123'])&& $_GET['123']="blank")
	   {
	     ?> 
		 <font color="#CC0000">
	     <br><br><center>You must fill all the field.</font></center>
		  </font>
		  <?php
		}
		?>
		<table border="0" cellpadding="5" cellspacing="5" align="center">
		<tr>
		   <td>Page name</td><td><input type="text" name="name"></td>
		</tr>
		<tr>
		  <td>description</td><td><textarea name="description" cols="60" rows="20"></textarea></td>
		 </tr>
		 <tr>
		  <td>type</td><td><select name="type"><option>place</option>
		                                       <option>activities</option>
											   </select></td>
		 </tr>
		
		 <tr>
			<td><input type="submit" name="submit" value="Add" ></td>
		  </tr>	
		  </table>
  </form>
  <?php
  }
 
  
   ?>