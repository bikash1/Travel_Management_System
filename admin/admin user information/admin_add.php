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




</script>
<br><br>
<div><center><font color="#FF0000" size="+3">Add New Admin Details</font></div>
<form method="post" action="admin_added.php" onsubmit="return validateform();">
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
				<td>User Name</td><td><input type="text" name="username" id="username" /></td>
			</tr>
			<tr>
				<td>password</td><td><input type="password" name="password1"  id="password1"/></td>
			</tr>
			<tr>
				<td>Confirm password</td><td><input type="password" name="password2"  id="password2"/></td>
			</tr>
		<tr>	 
				<td><input type="submit" name="submit" value="Add" /></td>
			</tr>
	</table>
</form>	
<?php
}
?>
