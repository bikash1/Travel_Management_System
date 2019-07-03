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
	if(document.getElementById("fname").value==""){
		errMsg="Please enter first name.";}
	if(document.getElementById("lname").value=="" ){
		errMsg=errMsg+"\nPlease enter last name.";}
	if(document.getElementById("address").value=="" ){
		errMsg=errMsg+"\nPlease enter address.";}	
	if(document.getElementById("username").value=="" ){
		errMsg=errMsg+"\nPlease enter username.";}	
	if(document.getElementById("password1").value=="" ){
		errMsg=errMsg+"\nPlease enter password.";}		
		
	if(document.getElementById("password2").value=="" ){
		errMsg=errMsg+"\nPlease enter confirm password.";}		
	if(document.getElementById("email").value=="" ){
		errMsg=errMsg+"\nPlease enter email address.";}	
	if(document.getElementById("phone").value=="" ){
		errMsg=errMsg+"\nPlease enter phone number.";}		
	if(document.getElementById("country").value=="" ){
		errMsg=errMsg+"\nPlease enter country";}							
		
		
	if(errMsg!=""){
		alert(errMsg);
		return false;
	}
	
	//txtTime
	}

</script>

<br />
<div><center><font color="#FF0000" size="+3"><br />Add New User</font></div>
<br><br>
<table border="0" align="center" cellpadding="10" cellspacing="10">
<?php
	   if(isset($_GET['msg1'])&& $_GET['msg1']="alreadyex")
	   {
	     ?> <tr><td><font color="#CC0000">This username is already used. Please enter another.</font></td></tr>
		 <?php } ?>
		   <?php
	   if(isset($_GET['errmsg'])&& $_GET['errmsg']="error")
	   {
	     ?> <tr><td><font color="#990000" size="+1">Password and Confirm password do not match.</td></tr>
		 <?php } ?>
		   


   
   <form method="post"  action="site_user_added.php" onsubmit="return validateForm();" >

             <tr>  
				<td>First Name</td><td><input type="text" name="fname" id="fname" /></td>
			</tr>
			<tr>	
				<td>Last Name</td><td><input type="text" name="lname" id="lname"/></td>
			</tr>
			<tr>	
				<td> Address</td><td><input type="text" name="address" id="address" /></td>
			</tr>
			<tr>	
				<td>User Name</td><td><input type="text" name="username" id="username" /></td>
			</tr>
			<tr>
				<td>password</td><td><input type="password" name="password1" id="password1"/></td>
			</tr>
			<tr>
				<td>Confirm password</td><td><input type="password" name="password2" id="password2" /></td>
			</tr>
			<tr>
				<td>Email</td><td><input type="text" name="email" id="email"/></td>
			</tr>
			
			<tr>	
				<td>Gender</td><td><input type="radio" name="gender" id="gender" value="male"/>Male &nbsp;
					   <input type="radio" name="gender" id="gender" value="female"/>female</td>
			</tr>
			
			<tr>
				 <td>Phone number</td><td><input type="text" name="phone" id="phone" /></td>
			</tr>
			<tr>
			    <td>Country</td><td><input type="text" name="country" id="country"></td>
			</tr>
			<tr>	 
				<td><input type="submit" name="submit" value="Add" /></td>
			</tr>
	</table>
</form>

<?php
}
?>