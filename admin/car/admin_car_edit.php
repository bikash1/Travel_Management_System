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
$query="SELECT * FROM tbl_car_info WHERE id='$id'";
$res=mysql_query($query);
$row=mysql_fetch_object($res);
?>
<div><center><br /><br /><font size="+2">Edit Customer Details</font></center></div>
<form method="post" action="admin_car_edited.php">
	<table border="0" cellpadding="5" cellspacing="5" align="center">
	<tr><td>car Model</td><td><input type="text" name="car_model" value="<?php echo $row->car_model;?>" /></td></tr>
			<tr><td>available_location</td><td><input type="text" name="available_location" value="<?php echo $row->available_location;?>" /></td></tr>
			<tr><td>Fares</td><td><input type="text" name="fare" value="<?php echo $row->fare;?>" /></td></tr>
			<tr><td>Status</td><td><input type="text" name="status" value="<?php echo $row->status;?>" /></td></tr>
			<tr><td><input type="hidden" name="id" value="<?php echo $id;?>" /></td></tr>
			<tr><td><input type="submit" name="submit" value="Edit" /></td></tr>
			</form>
			

</table>
</form>
<?php }?>