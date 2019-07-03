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
$i=1;

?>
<center> <font color="#FF0000" size="+4"><br />Transport  Book Information </font></center>
<center><a href="transport_book_details.php">View Previous All Bookings</a> </center>

 <?php
	  
		
		 if(isset($_GET['upd'])&& $_GET['upd']=="bked")
	   {
	     $sql='update tbl_transport_book set status="booked" where id='.$_GET["id"];
		 mysql_query($sql);
		 $sql='update transport_book_view set status="1" where book_id='.$_GET["id"];
		 mysql_query($sql);
		 
		}
		 if(isset($_GET['upd']) && $_GET['upd']==="free")
	   {
	   $route_id=$_GET['route_id'];
	   $qr="SELECT * FROM tbl_transport_route where `id`='$route_id'";
	   
$result=mysql_query($qr);
$row=mysql_fetch_object($result);
$rem_seat=$row->remaining_seat;
	   $ticket=$_GET['ticket'];
	   
	   $now_rem=$rem_seat+$ticket;
	   
	   $q="update `tbl_transport_route` set 
	         `remaining_seat`='$now_rem'
			 where `id`='$route_id'";
			mysql_query($q); 
	  
	     $sql='delete from tbl_transport_book  where id='.$_GET["id"];
		 mysql_query($sql);
		 
		 
		}
		
$qry="SELECT * FROM tbl_transport_book where status='booking' or status='booked'";
$res=mysql_query($qry);
$num=mysql_num_rows($res);

		?>
<table border="1" cellpadding="5" cellspacing="5" align="center">
<tr>


    <th>id </th>
	<th>Mode_name</th>
	<th>From </th>
	<th>To </th>
	<th>Date </th>	
	<th>Time</th>
	<th>Number of ticket</th>	
	<th>Total fare</th>
	<th>Adderss </th>
	<th>Phone Number</th>	
	<th>Citizenship number</th>
	<th>Status</th>
	
</tr>	
 <?php
   if($num==0)
  {?>
  <tr><td>No Booking Request is comming.</td></tr>
 <?php }
while($rows=mysql_fetch_object($res))
    {
	 
	  
		?> 
	  <tr>
	     <td><?php echo $i; ?></td>	
		 <?php $mode_id=$rows->mode_id;
		       $qre="select * from  tbl_transport where `id`='$mode_id'"; 
			   $ress=mysql_query($qre);
			   $row=mysql_fetch_object($ress);
			   ?>
			 <td>  <?php echo $row->transport_mode_name;?></td>
		<td><?php echo $rows->from; ?></td>
		<td><?php echo $rows->to; ?></td>
		<td><?php echo $rows->date; ?></td>
		<td><?php echo $rows->time;?></td>
		<td><?php echo $rows->number_of_ticket;?></td>
		<td><?php echo $rows->total_fare;?></td>
		<td><?php echo $rows->address;?></td>
		<td><?php echo $rows->phone_no;?></td>
		<td><?php echo $rows->citizenship_no;?></td>
		<td><?php echo $rows->status;?></td>
		
		
		
		   
		 <td><a href="transport_book_info.php?upd=bked&id=<?php echo $rows->id;?>">approve</a>|<a href="transport_book_info.php?upd=free&id=<?php echo $rows->id;?>&ticket=<?php echo $rows->number_of_ticket;?>&route_id=<?php echo $rows->route_id;?> ">Reject</a></td>
		 <td><a href="user_detail.php?id=<?php echo $rows->user_id;?>">User Detail</a></td>
		
		 </tr>
	   
	
	<?php //echo $rows->username;
	 $i++;  }}?>

	 </table>