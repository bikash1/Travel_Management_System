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
include_once("../../database/connect.php");
?>
<br /><center><div><br /><h1><?php echo $_GET['mod'];?> route information</h1></div>
<table border="1" cellpadding="12" cellspacing="10">
<tr>
<?php
if(isset($_GET['msg'])&& $_GET['msg']=="edit")
{
?><tr><td colspan="2" style="color:#FF0000">You have successfully edit route</td></tr>

<?php }
if(isset($_GET['msg'])&& $_GET['msg']=="delete")
{
?><tr><td colspan="2" style="color:#FF0000">You have deleted a route</td></tr>
<?php
}
?>
<th>id</th>
<th>From</th>
<th>To</th>
<th>Date</th>
<th>Time</th>
<th>Total_seat</th>
<th>Remaining_seat</th>
<th>Fare Per Ticket</th>


               
</tr>



		   
				  <?php
				   
				  $id=$_GET['id']; 
				   $qry="SELECT * FROM tbl_transport_route where mode_id='$id'";
						$res=mysql_query($qry);
						$i=1;
						if($num=mysql_num_rows($res)<0)
						{
						
						echo "no route is available"; }
						else
						{
						while($rows=mysql_fetch_object($res))
						{?>
						<td><?php echo $i;?></td>
						<td><?php echo $rows->from;?></td>
						<td><?php echo $rows->to;?></td>
						<td><?php echo $rows->date;?></td>
						<td><?php echo $rows->time;?></td>
						<td><?php echo $rows->total_seat;?></td>
						<td><?php echo $rows->remaining_seat;?></td>
						<td><?php echo $rows->fare_per_ticket;?></td>
						
							
						
		          
		   <td><a href="transport_route_edit.php?act=edit&id=<?php echo $rows->id;?>">Edit</a>|<a href="transport_route_delete.php?act=delete&id=<?php echo $rows->id;?>"onclick="return confirm('Are you sure want to delete this entry??');" >Delete</a></td>
		  </tr></tr>
		   <?php
		  $i++; }
		    }
			?>
	</table>
	</center>
	
	<?php
	}?>