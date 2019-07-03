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



<script type="text/javascript">
function validateform()
{
var errMsg="";
	if(document.getElementById("username").value==""){
		errMsg="Please enter username.";}
	if(document.getElementById("password1").value=="" ){
		errMsg=errMsg+"\nPlease enter password.";}
	if(document.getElementById("password2").value=="" ){
		errMsg=errMsg+"\nPlease enter confirm password.";}	
	if(	document.getElementById("password1").value!=document.getElementById("password2").value)
	{
	errMsg=errMsg+"\npassword and confirm password do not match.";}
	
	
	if(errMsg!=""){
		alert(errMsg);
		return false;
	}
	
	
	}

</script>



<?php
if(isset($_POST['submit']))
{
$hotel_name=$_POST['name'];
$loc=$_POST['loc'];
 $name=$_FILES['img']['name'];
$description=$_POST['description'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$type=$_POST['type'];
$tmp_name=$_FILES['img']['tmp_name'];
 $location="../../images/hotel_image/$name";
move_uploaded_file($tmp_name,$location);
$qry="INSERT INTO tbl_hotels SET
     `name`='$hotel_name',
	 `location`='$loc',
	 `image`='$name',
	 `description`='$description',
	 `email`='$email',
	 `phone`='$phone',
	 `type`='$type'"; 
	 
	mysql_query($qry);
	redirect("hotel_info.php?hh=add");
	 
	 
	 
}
?>









<br><br>
<div><center><font color="#FF0000" size="+3">Add New Hotel</font></div>
<form method="post" action="" onsubmit="return validateform();" enctype="multipart/form-data">
<table border="0" align="center" cellpadding="10" cellspacing="10">
<?php
if(isset($_GET['msg'])&& $_GET['msg']=="blank")
{
?><tr><td colspan="2" style="color:#FF0000">please enter values for  password and username</td></tr><?php
}

if(isset($_GET['msg'])&& $_GET['msg']=="success")
{
?><tr><td colspan="2" style="color:#FF0000">Adding a new admin success</td></tr><?php
}
?>
<tr>	
				<td>Hotel Name</td><td><input type="text" name="name" id="name" /></td>
			</tr>
			<tr>
				<td>Location</td><td><input type="text" name="loc"  id="loc"/></td>
			</tr>
			<tr>
				<td>Image</td><td><input type="file" name="img"  id="img"/></td>
			</tr>
			<tr>
				<td>Description</td><td><textarea name="description"  cols="10" rows="10"id="img"/></textarea></td>
			</tr>
			<tr>
				<td>Email</td><td><input type="email" name="email"  id="email"/></td>
			</tr>
			<tr>
				<td>Phone</td><td><input type="text" name="phone"  id="phone"/></td>
			</tr>
			<tr>
				<td>Type</td><td><select name="type"  id="type"/><option>Normal</option>
																<option>3star</option>
																<option>5star</option>
															</td></tr>	
																
				
				
				
			                                            
			</tr>
			
			<tr>	 
				<td><input type="submit" name="submit" value="Add" /></td>
			</tr>
	</table>
</form>	
<?php
}
?>
