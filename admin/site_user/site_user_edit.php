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
$id=$_GET['id'];
$query="SELECT * FROM tbl_registerUser WHERE id='$id'";
$res=mysql_query($query);
$row=mysql_fetch_object($res);
?>
<center><div><br /><br />Edit Customer Details</div>
<form method="post" action="site_user_edited.php" >
	<table border="0" cellpadding="5" cellspacing="5">
      	<tr><td>First Name</td><td><input type="text" name="fname" value="<?php echo $row->fname;?>" /></td></tr>
		<tr><td>Last Name</td><td><input type="text" name="lname" value="<?php echo $row->lname;?>" /></td></tr>
			 <tr><td>Address</td><td><input type="text" name="address" value="<?php echo $row->address;?>" /></td></tr>
			<tr><td>username</td><td><input type="text" name="username" value="<?php echo $row->username;?>" /></td></tr>
			<tr><td>Password</td><td><input type="password" name="password" value="<?php echo $row->password;?>" /></td></tr>
			<tr><td>Email</td><td><input type="text" name="email" value="<?php echo $row->email;?>" /></td></tr>
			<tr><td>Gender</td><td><input type="text" name="gender" value="<?php echo $row->gender;?>" /></td></tr>
			<tr><td>Phone number</td><td><input type="text" name="phone" value="<?php echo $row->phone;?>" /></td></tr>
			<tr><td>Country</td><td><input type="text" name="country" value="<?php echo $row->country;?>" /></td></tr>
			<tr><td><input type="hidden" name="id" value="<?php echo $id;?>" /></td></tr>
			<tr><td><input type="submit" name="submit" value="Edit" /></td></tr>
			</form>
			

</table>
</form>
</center>
<?php
}
?>