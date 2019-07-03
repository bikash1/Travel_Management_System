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
<center> <font color="#FF0000" size="+4"><br />Car Book Information </font></center>

 <?php
	  
		
		 if(isset($_GET['upd'])&& $_GET['upd']=="bked")
	   {
	     $sql='update tbl_car_info set status="booked" where id='.$_GET["id"];
		 mysql_query($sql);
		 
		}
		 if(isset($_GET['upd']) && $_GET['upd']==="free")
	   {
	     $sql='update tbl_car_info set status="" where id='.$_GET["id"];
		 mysql_query($sql);
	echo	 $qre='DELETE FROM tbl_car_booked WHERE `id`='.$_GET["id"];
		 mysql_query($qre);
		 
		}
		
$qry="SELECT * FROM tbl_car_info where status='booking' or status='booked' ";
$res=mysql_query($qry);

		?>
<table border="1" cellpadding="5" cellspacing="5" align="center">
<tr>


    <th>id </th>
	<th>car_model </th>
	<th>available_location </th>
	<th>pick_up_date </th>	
	<th>pick_up_time </th>
	<th>number_of_people </th>	
	<th>pick_up_address </th>
	<th>	drop_down_address </th>	
	<th>fare </th>
	<th>status</th>
	<th></th>
	<th>customer info</th>
</tr>	
 <?php
while($rows=mysql_fetch_object($res))
    {
	 
	    $query='SELECT * FROM tbl_car_booked where id='.$rows->id;
		
		
        $result=mysql_query($query); 
		$row=mysql_fetch_object($result);
		
		?> 
	  <tr>
	     <td><?php echo $rows->id; ?></td>
		
		<td><?php echo $rows->car_model; ?></td>
		<td><?php echo $rows->available_location; ?></td>
		<td><?php echo $row->pick_up_date; ?></td>
		<td><?php echo $row->pick_up_time;?></td>
		<td><?php echo $row->number_of_people;?></td>
		<td><?php echo $row->pick_up_address;?></td>
		<td><?php echo $row->drop_down_address;?></td>
		 
		
		  <td><?php echo $rows->fare; ?></td>
		  <td><?php echo $rows->status;?></td>
		   
		 <td><a href="admin_car.php?upd=bked&id=<?php echo $rows->id;?>">approve</a>|<a href="admin_car.php?upd=free&id=<?php echo $row->id;?>">Reject</a></td>
		 <td><a href="car_book_customer_detail.php?id=<?php echo $row->user_id;?>">User Detail</a></td>
		 </tr>
	   
	
	<?php //echo $rows->username;
	  }}?>

	 </table>