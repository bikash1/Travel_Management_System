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

$qrys="SELECT * FROM  tbl_registeruser WHERE `id`='$id'"; 
$ress=mysql_query($qrys);
$rows=mysql_fetch_object($ress);
$num=mysql_num_rows($ress);

if($num>0){
?>
<h1><center><br /><br />Customer Information</center></h1>
<table border="1" cellpadding="5" cellspacing="5" align="center">
<tr>
     
     <th>username</th>

    <th>password</th>
	<th>first name </th>
	<th>last name </th>
	<th>	address  </th>
	<th>	email 	</th>
	<th>gender</th> 	
	<th>phone </th>
	<th>country </th>
	</tr>
	<tr>
	 
	  <td><?php echo $rows->username;?></td>
	  <td><?php echo $rows->password;?></td>
	  <td><?php echo $rows->fname;?></td>
	  <td><?php echo $rows->lname;?></td>
	  <td><?php echo $rows->address;?></td>
	  <td><?php echo $rows->email;?></td>
	  <td><?php echo $rows->gender;?></td>
	  <td><?php echo $rows->phone;?></td>
	  <td><?php echo $rows->country;?></td>
	  </tr>
	  
	</table>
	<?php
	}
}
	?>
	