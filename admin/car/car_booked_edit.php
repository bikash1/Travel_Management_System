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
		  $car_model=$_POST['car_model'];
		   $available_location=$_POST['available_location'];
		   $fare=$_POST['fare'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$pick_up_date=$_POST['pick_up_date'];
			$pick_up_time=$_POST['pick_up_time'];
			$number_of_people=$_POST['number_of_people'];
			$pick_up_address=$_POST['pick_up_address'];
			$drop_down_address=$_POST['drop_down_address'];
		   
		  
			   $qry="UPDATE `tbl_car_booked` SET
			       `id`='$id',
				   	`username`='$username',
					`password`= '$password',
					 `available_location`='$available_location',
					  	`pick_up_date`='$pick_up_date',
						 	`pick_up_time``='$pick_up_time',
								`number_of_people`='number_of_people',
								      `pick_up_address`='$pick_up_address', 	
									  `drop_down_address`='$drop_down_address',
			         `car_model`='$car_model',
					`fare`='$fare'
					WHERE id='$id'";
				$res=mysql_query($qry);
				redirect("admin_car_booked_info.php");
					}
		
			
		?>	







<?php

$id=$_GET['id'];
$query="SELECT * FROM tbl_car_booked WHERE id='$id'";
$res=mysql_query($query);
$row=mysql_fetch_object($res);
?>
<div>Car Booked  Details</div>
<form method="post" action="">
	<table border="0" cellpadding="5" cellspacing="5">
	       <tr><td>id</td><td><input type="text" name="id" value="<?php echo $row->id;?>" /></td></tr>
		   <tr><td>User Name</td><td><input type="text" name="username" value="<?php echo $row->username;?>" /></td></tr>
		   <tr><td>Password</td><td><input type="text" name="password" value="<?php echo $row->password;?>" /></td></tr>
			<tr><td>available_location</td><td><input type="text" name="available_location" value="<?php echo $row->available_location;?>" /></td></tr>
			<tr><td>car Model</td><td><input type="text" name="car_model" value="<?php echo $row->car_model;?>" /></td></tr>
			<tr><td>Fares</td><td><input type="text" name="fare" value="<?php echo $row->fare;?>" /></td></tr>
			<tr><td>Pick up date</td><td><input type="text" name="pick_up_date" value="<?php echo $row->pick_up_date;?>" /></td></tr>
			<tr><td>Pick up time</td><td><input type="text" name="pick_up_time" value="<?php echo $row->pick_up_time;?>" /></td></tr>
			<tr><td>Number of people</td><td><input type="text" name="number_of_people" value="<?php echo $row->number_of_people;?>" /></td></tr>
			<tr><td>pick up address </td><td><input type="text" name="pick_up_address" value="<?php echo $row->pick_up_address;?>" /></td></tr>
		   <tr><td>drop down address </td><td><input type="text" name="drop_down_address" value="<?php echo $row->drop_down_address;?>" /></td></tr>
			<tr><td><input type="hidden" name="id" value="<?php echo $id;?>" /></td></tr>
			<tr><td><input type="submit" name="submit" value="Edit" /></td></tr>
			</form>

</table>
</form>