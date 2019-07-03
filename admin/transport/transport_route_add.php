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
?>
<script language="javascript">
function validateForm()
{
var errMsg="";
	if(document.getElementById("from").value==""){
		errMsg="Please specify from address.";}
	if(document.getElementById("to").value=="" ){
		errMsg=errMsg+"\nPlease specify to address";}
	if(document.getElementById("date").value=="" ){
		errMsg=errMsg+"\nPlease enter Date.";}	
	if(document.getElementById("time").value=="" ){
		errMsg=errMsg+"\nPlease enter Time.";}	
	if(document.getElementById("seat").value=="" ){
		errMsg=errMsg+"\nPlease enter number of seat available.";}	
	if(document.getElementById("fare").value=="" ){
		errMsg=errMsg+"\nPlease enter fare per ticket.";}	
	
	if(errMsg!=""){
		alert(errMsg);
		return false;
	}
	}
	</script>
	<br /><br /><center><font size="+3">Transport</font>
	
<font size="+3"><br /><br /><center>Add a Route for <?php echo $_GET['transport_mode_name'];?></center></font>
<?php
 if(isset($_GET['msg'])&& $_GET['msg']="success")
	   {
	     echo "Adding the transport route  success";
		
		}
	?>	
<form method="post" action="transport_route_process.php" onsubmit="return validateForm();">
<table border="0" align="center">
		<tr>
		    <td>From</td><td><input type="text" name="from"  id="from"/></td>
		</tr>
		<tr>
		    <td>To</td><td><input type="text" name="to"  id="to"/></td>
		</tr>
		<tr>
		    <td>Date</td><td><input type="date" name="date"  id="date" /></td>
		</tr>
		<tr>
		    <td>Time</td><td><input type="time" name="time"   id="time"/></td>
		</tr>
		<tr>
		    <td>Total Seat</td><td><input type="text" name="seat"  id="seat" /></td>
		</tr>
		<tr>
		    <td>Fare per ticket</td><td><input type="text" name="fare"  id="fare" /></td>
		</tr>
		
		  
		<tr><input type="hidden" name="mode_id" value="<?php echo $_GET['id'];?>" />
		    <td><input type="submit" name="submit" value="Add" />
			
		</tr>
</table>	
			

 <?php }?>
