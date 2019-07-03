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
<h1><center><br /><br />Transport</center></h1>
<table border="0" cellpadding="5" cellspacing="5">
<tr>
		<td><a href="transport_mode.php">Transport mode </a></td>
		<td><a href="transport_route.php">Transport Route </a></td>
		<td><a href="transport_route_adds.php">Transport Route add</a></td>
		<td><a href="transport_edit">Transport Edit</a></td>
</tr>		
<?php
}?>