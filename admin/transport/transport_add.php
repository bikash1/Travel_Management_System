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
<script type="text/javascript" >
function validateForm(){
var errMsg="";
	if(document.getElementById("transport_name").value==""){
		errMsg="Please enter Transport Mode Name.";}
		
	if(errMsg!=""){
		alert(errMsg);
		return false;
	}
	
	}


</script>
<?php	
 if(isset($_GET['msgs'])&& $_GET['msgs']="success")
	   {
	     echo "Adding the transport mode success";
		}
?>
<br /><br /><center><font size="+3"> Transport </font></center>
<br /><br /><center><font size="+2">Add a new transport mode</font><br /><br />
<?php 
 if(isset($_GET['msg1'])&& $_GET['msg1']="alreadyexist")
	   {
	   echo "<br><font color='red' size='5'>";
	     echo "Already exixt.... ";
		echo "</font>"; 
		}	
		?>
<form method="post" action="transport_add_process.php" onsubmit="return validateForm();" >
<table border="0" align="center">
<tr>
</tr>
<tr>
<td>Transport Mode Name</td><td><input type="text" id="transport_name" name="transport_mode_name"></td></tr>
<td><input type="submit" name="submit" value="Add"></td>
</table>
</form>
<?php
}
?>