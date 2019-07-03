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


	   if(isset($_POST['submit']))
	      {
		  $id=$_POST['id'];
		  $from=$_POST['from'];
		  $to=$_POST['to'];
		  $date=$_POST['date'];
		  $time=$_POST['time'];
		  $total_seat=$_POST['total_seat'];
		  $rem=$_POST['remaining_seat'];
		  $fare=$_POST['fare_per_ticket']; 
		  
		    $errors=array();
			
			 if(empty($from))
		   {
		   $errors[]='Mode name  cannot be blank';
		   }
		   
		      
         if (count($errors) > 0) {  redirect("transport_mode.php");
		 
		 
		 /*
				echo '<p><strong style="color:#FF000;"> ' . 
					'.</strong></p>';
				echo '<p>Please fix the following:</p>';
				echo '<ul>';
				foreach ($errors as $error) {
					echo '<li>' . $error . '</li>';
				}
				echo '</ul>';*/
				
			}
			else
			{ 
			    if($password1==$password2)
				{
			  $qry="UPDATE `tbl_transport_route` SET
			         `from`='$from',
					 `to`='$to',
					 `date`='$date',
					 `time`='$time',
					 `total_seat`='$total_seat',
					 `remaining_seat`='$rem',
					 `fare_per_ticket`='$fare'
					
					WHERE id='$id'"; 
				$res=mysql_query($qry);
				redirect("transport_route.php?msg=edit");
					}
			}
		}
	
		?>
<?php			
$id=$_GET['id']; 
$query="SELECT * FROM tbl_transport_route WHERE id='$id'";
$res=mysql_query($query);
$row=mysql_fetch_object($res);
?>
<br /><center><div><br /><h2>Edit Mode Details</h2></div>
<form method="post" action="">
	<table border="0" cellpadding="5" cellspacing="5">
	<tr><td>From</td><td><input type="text" name="from" value="<?php echo $row->from;?>" /></td></tr>
	<tr><td>To</td><td><input type="text" name="to" value="<?php echo $row->to;?>" /></td></tr>
	<tr><td>Date</td><td><input type="date" name="date" value="<?php echo $row->date;?>" /></td></tr>
	<tr><td>Time</td><td><input type="time" name="time" value="<?php echo $row->time;?>" /></td></tr>
	<tr><td>Total Seat</td><td><input type="text" name="total_seat" value="<?php echo $row->total_seat;?>" /></td></tr>
	<tr><td>Remaining Seat</td><td><input type="text" name="remaining_seat" value="<?php echo $row->remaining_seat;?>" /></td></tr>
	<tr><td>Fare Per Ticket</td><td><input type="text" name="fare_per_ticket" value="<?php echo $row->fare_per_ticket;?>" /></td></tr>
			<tr><td><input type="hidden" name="id" value="<?php echo $id;?>" /></td></tr>
			<tr><td><input type="submit" name="submit" value="Edit" /></td></tr>
			</form>
			

</table>
</form>
</center>
<?php
}
?>