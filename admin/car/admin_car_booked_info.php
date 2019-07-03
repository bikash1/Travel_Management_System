<?php
session_start();
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


$qry="SELECT * FROM tbl_car_booked";
$res=mysql_query($qry);
?>
<center> <font color="#FF0000" size="+4">Car booked Information Page</font></center>
 
<table border="1" cellpadding="5" cellspacing="5" align="center">
<tr>
    <th>id </th>
	 <th>	username</th>
	 <th> 	password </th>
	 <th>	available_location</th>
	  <th>	car_model </th>
	 <th>	fares</th>
	 <th> 	pick_up_date</th>
	 <th> 	pick_up_time </th>
	 <th>	number_of_people</th>
	 <th> 	pick_up_address </th>
	 <th>	drop_down_address </th>
	
</tr>	
 <?php
while($row=mysql_fetch_object($res))
    {
	  ?>
	  <tr>
	     <td><?php echo $row->id; ?></td>
		 <td><?php echo $row->username; ?></td>
		 <td><?php echo $row->password; ?></td>
		 <td><?php echo $row->available_location; ?></td>
		 <td><?php echo $row->car_model; ?></td>
		  <td><?php echo $row->fare; ?></td>
		 <td><?php echo $row->pick_up_date; ?></td>
		 <td><?php echo $row->pick_up_time; ?></td>
		 <td><?php echo $row->number_of_people; ?></td>
		 <td><?php echo $row->pick_up_address; ?></td>
		 <td><?php echo $row->drop_down_address; ?></td>
		 
		   <td><?php echo $row->status; ?></td>
		 <td><a href="admin_car_edit.php?id=<?php echo $row->id;?>">Edit</a>|<a href="admin_car_delete.php?id=<?php echo $row->id;?>">Delete</a></td>
	  </tr>	  
	
	<?php }?>
	</table>
	