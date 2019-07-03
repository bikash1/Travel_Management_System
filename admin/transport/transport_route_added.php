<?php
session_start();
include("../../database/functions.php");
if(!isset($_SESSION['admin']))
{
redirect("../../pages/login.php");
}
else
{
 $mode_id=$_GET['id'];
?>
<font size="+3">Add a Route</font>
<form method="post" action="transport_route_process.php" onsubmit="return validateForm();">
<table border="0">
		<tr>
		    <td>From</td><td><input type="text" name="from" /></td>
		</tr>
		<tr>
		    <td>To</td><td><input type="text" name="to"  /></td>
		</tr>
		<tr>
		    <td>Date</td><td><input type="date" name="date"  /></td>
		</tr>
		<tr>
		    <td>Time</td><td><input type="time" name="time"  /></td>
		</tr>
		<tr>
		    <td>Total Seat</td><td><input type="text" name="seat"  /></td>
			
		</tr>
	
		<tr>
		    <td>Fare per ticket</td><td><input type="text" name="fare"  /></td>
		</tr>
		<tr>
		<td>
		<input type="hidden" name="mode_id" value="<?php echo $mode_id;?>"></td>
		</tr>
		<tr>
		    <td><input type="submit" name="submit" value="Add" /></td>
		</tr>
</table>	
			

 <?php }?>
