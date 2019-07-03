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
$query="SELECT * FROM tbl_adminlogin WHERE id='$id'";
$res=mysql_query($query);
$row=mysql_fetch_object($res);
?>
<br /><center><div><br /><h2>Edit Customer Details</h2></div>
<form method="post"  action="admin_edited.php" >
	<table border="0" cellpadding="5" cellspacing="5">
	<tr><td>username</td><td><input type="text" name="username" value="<?php echo $row->username;?>" /></td></tr>
			<tr><td>password</td><td><input type="text" name="password1" value="<?php echo $row->password;?>" /></td></tr>
			<tr><td>Confirm password</td><td><input type="text" name="password2" value="<?php echo $row->password;?>" /></td></tr>
			<tr><td><input type="hidden" name="id" value="<?php echo $id;?>" /></td></tr>
			<tr><td><input type="submit" name="submit" value="Edit" /></td></tr>
			</form>
			

</table>
</form>
</center>
<?php }?>