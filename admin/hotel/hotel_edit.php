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

	   if(isset($_POST['submit']))
	      {
		  $id=$_POST['id'];
		  $hotel_name=$_POST['name'];
		   $loc=$_POST['loc'];
		   echo $name=$_FILES['img']['name'];
		   $description=$_POST['description'];
		   $phone=$_POST['phone'];
		   $email=$_POST['email'];
		   $type=$_POST['type'];
		   $tmp_name=$_FILES['img']['tmp_name'];
		  $location="../../images/hotel_image/$name";
		   move_uploaded_file($tmp_name,$location);
		  
		
			  $qry="UPDATE `tbl_hotels` SET
			         `name`='$hotel_name',
					`location`='$loc',
					`image`='$name',
					`description`='$description',
					`email`='$email',
					`phone`='$phone',
					`type`='$type'
					
					WHERE id='$id'"; 
				$res=mysql_query($qry);
				redirect("hotel_info.php?edit=edit");
					}
			
	
		?>	






		<?php
			
				$id=$_GET['id'];
				$query="SELECT * FROM tbl_hotels WHERE id='$id'";
				$res=mysql_query($query);
				$row=mysql_fetch_object($res);
				?>
				<div><center><br /><br /><font size="+2">Edit Hotel Details</font></center></div>
				<form method="post" action="" enctype="multipart/form-data">
					<table border="0" cellpadding="5" cellspacing="5" align="center">
					<tr><td>Name</td><td><input type="text" name="name" value="<?php echo $row->name;?>" /></td></tr>
							<tr><td>Location</td><td><input type="text" name="loc" value="<?php echo $row->location;?>" /></td></tr>
							<tr><td ><img src="../../images/hotel_image/<?php echo $row->image;?>" width="250" height="250" ></td></tr>
							<tr><td>Image</td><td><input type="file" name="img"></td></tr>
							<tr><td>Description</td><td><textarea  name="description" rows="10" cols="30" /><?php echo $row->description;?></textarea></td></tr>                          <tr><td>Email</td><td><input type="email" name="email" value="<?php echo $row->email;?>" /></td></tr>
							<tr><td>phone number</td><td><input type="text" name="phone" value="<?php echo $row->phone;?>" /></td></tr>
							<tr><td>Type</td><td><input type="text" name="type" value="<?php echo $row->type;?>" /></td></tr>
							<tr><td><input type="hidden" name="id" value="<?php echo $id;?>" /></td></tr>
							<tr><td><input type="submit" name="submit" value="Edit" /></td></tr>
							</form>
							
				
				</table>
				</form>
				<?php }?>