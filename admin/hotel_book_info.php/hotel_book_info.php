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
<center> <font color="#FF0000" size="+4"><br />Hotel Book Information </font></center>

 <?php
	  
		
		 if(isset($_GET['upd'])&& $_GET['upd']=="bked")
	   {
	     $sql='update tbl_hotel_booked set status="booked" where id='.$_GET["id"];
		 mysql_query($sql);
		 
		}
		 if(isset($_GET['upd']) && $_GET['upd']==="free")
	   {
	  
	     $sql='delete from tbl_hotel_booked  where id='.$_GET["id"];
		 mysql_query($sql);
		 
		}
		
$qry="SELECT * FROM tbl_hotel_booked where status='booking' or status='booked'";
$res=mysql_query($qry);

		?>
<table border="1" cellpadding="5" cellspacing="5" align="center">
<tr>

    <th>id </th>
		<th>Number of room</th>
		<th> Room Type</th>
		<th>no of adult</th>
		<th>no of child</th>
		<th>date</th>	
		<th> time of comming 	</th>
		<th>hotel_name</th>
		<th>	hotel_address	</th>
		<th>Hotel Email</th>
		<th>phone no.</th>
		<th>type</th>
		
		<th>status</th>
		<th></th>
		
		<th>User info</th>
	
</tr>
 <?php $num=mysql_num_rows($res);
  if($num==0)
  {?>
  <tr><td>No Booking Request</td></tr>
 <?php }

while($rows=mysql_fetch_object($res))
    {
	 
	    $query='SELECT * FROM tbl_hotels where id='.$rows->hotel_id;
		
		
        $result=mysql_query($query); 
		$row=mysql_fetch_object($result)
		
									
		?> 
	  <tr>
	     <td><?php echo $i; ?></td>
		
		<td><?php echo $rows->no_of_room; ?></td>
		<td><?php echo $rows->room_type; ?></td>
		<td><?php echo $rows->adult; ?></td>
		<td><?php echo $rows->child;?></td>
		<td><?php echo $rows->date;?></td>
		<td><?php echo $rows->time;?></td>
		<td><?php echo $row->name;?></td>
		<td><?php echo $row->location;?></td>
		<td><?php echo $row->email;?></td>
		<td><?php echo $row->phone;?></td>
		<td><?php echo $row->type;?></td>
		
	
		
		
		 
		
		  <td><?php echo $rows->status;?></td>
		   
		 <td><a href="hotel_book_info.php?upd=bked&id=<?php echo $rows->id;?>">approve</a>|<a href="hotel_book_info.php?upd=free&id=<?php echo $rows->id;?>">Reject</a></td>
		 <td><a href="hotel_book_user_details.php?id=<?php echo $rows->user_id;?>">User Detail</a></td>
		 </tr>
	   
	
	<?php //echo $rows->username;
	 $i++; }}?>

	 </table>