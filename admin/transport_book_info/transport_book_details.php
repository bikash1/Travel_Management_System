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

 <?php

		
$qry="SELECT * FROM transport_book_view where status='1'";
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
		
		
		
		
		 </tr>
	   
	
	<?php //echo $rows->username;
	 $i++;  }}?>

	 </table>