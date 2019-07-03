<?php
session_start();
include("../../../database/functions.php");
if(!isset($_SESSION['admin']))
{
redirect("../../pages/login.php");
}
else
{
include("../../admin.php");
?>
<script type="text/javascript" >
function validateForm(){
var errMsg="";
	if(document.getElementById("name").value==""){
		errMsg="Please enter type of image .";}
	if(document.getElementById("img").value=="" ){
		errMsg=errMsg+"\nPlease select image.";}
	
	if(errMsg!=""){
		alert(errMsg);
		return false;
	}
	
	//txtTime
	}

</script>


<center><h1>Upload Images of Home Page</h1></center>
<body>
<form name="f1" method="post" action="process.php" enctype="multipart/form-data"  onsubmit="return validateForm();">
<table border="0">
<tr><td>Type:</td><td><input type="text"  name="category" id="name" >(like religious..)</td><td></td></tr>
<tr><td>file:</td><td><input type="file" name="myfile"    id="img"  /></td></tr>
<tr><td>Description</td><td><input type="text" name="description" ></td></tr>
<tr><td><input type="submit" name="upload" /></td><td></td></tr>
</form>

<?php }
?>