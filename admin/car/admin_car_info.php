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
  
	


?>
<center> <font color="#FF0000" size="+4"><br />Car Information Page</font></center>

<center><a href="admin_car_add.php"><font size="6">Add a new car</font></a></center>
<center><a href="car_available_location.php"><font size="6">car available location </font></a></center>
 <?php
	  
		
$qry="SELECT * FROM tbl_car_info";
$res=mysql_query($qry);
$i=1;
		?>
		<table border="0" cellpadding="5" cellspacing="5" align="center">
		<?php if(isset($_GET['msgs'])&& $_GET['msgs']=="add_success")
	   {
	    ?><tr><td><font color="#EE0000" size="+2">you have Add a car</font></td></tr>
		<?php
		}?>
		<?php if(isset($_GET['msg'])&& $_GET['msg']=="delete_car")
	   {
	    ?><tr><td><font color="#EE0000" size="+2">you have delete a car</font></td></tr>
		<?php
		}?>
</table>
<table border="1" cellpadding="5" cellspacing="5" align="center">
<tr>
    <th>id </th>
	<th>car_model </th>
	<th>available_location </th>
	<th>fare </th>
	<th>status</th>
</tr>	
 <?php
while($row=mysql_fetch_object($res))
    {
	  ?>
	  <tr>
	     <td><?php echo $i; ?></td> 
		 <td><?php echo $row->car_model; ?></td>
		 <td><?php echo $row->available_location; ?></td>
		  <td><?php echo $row->fare; ?></td>
		   <td><?php echo $row->status; ?></td>
		 <td><a href="admin_car_edit.php?id=<?php echo $row->id;?>">edit</a>|<a href="admin_car_delete.php?id=<?php echo $row->id;?>" onclick="return confirm('Are you sure you want to delete this car');">Delete</a></td>
	  </tr>	  
	
	<?php $i++; }
	}
	?>
	</table>
	