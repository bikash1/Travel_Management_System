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

$qry="SELECT * FROM testimonial";
$res=mysql_query($qry);
$i=1;
?>
<center> <font color="#FF0000" size="+4"><br />Testimonialt</font></center>



	<?php
	   if(isset($_GET['123'])&& $_GET['123']="delete_success")
	   {
	   echo "<font color='red' size='5'>";
	     echo "You have delete one testimonial !!!!";
		 echo "</font>";
		}
		?>	
<table border="1" cellpadding="5" cellspacing="5" align="center">
<tr>
    <th>id</th>
	<th>Name of Giver</th>
	<th>Testimonial</th>
	<th></th>
</tr>	
 <?php
while($row=mysql_fetch_object($res))
    {
	  ?>
	  <tr>
	     <td><?php echo $i; ?></td>
		 <td><?php echo $row->name; ?></td>
		 <td><?php echo $row->testimonial; ?></td>
		 <td><a href="testimonial_delete.php?id=<?php echo $row->id;?>" onclick="return confirm('Are you sure you want to delete this testimonial??');">Delete</a></td>
	  </tr>	  
	
	<?php $i++; }?>
	</table>
	<?php }?>