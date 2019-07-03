<?php 
session_start();
if(isset($_POST['submit']))
{
include("../../database/functions.php");

include("../../database/connect.php");
 $mode_id=$_POST['mode_id']; 
$from=$_POST['from'];
$to=$_POST['to'];
$date=$_POST['date'];
$time=$_POST['time'];
$fare=$_POST['fare'];
$seat=$_POST['seat'];

 $query="INSERT INTO tbl_transport_route set 
     `mode_id`='$mode_id',
	  `from`='$from',
	  `to`='$to',
	  `date`='$date',
	  `time`='$time',
	  `fare_per_ticket`='$fare',
	  `total_seat`='$seat',
	  `remaining_seat`='$seat' "; 
	$res=mysql_query($query);  


$qery="select * from tbl_transport_available_location where `from`='$from' AND `to`='$to'";
$result=mysql_query($qery);
$num=mysql_num_rows($result);
if($num==0)
{ 
$qry="INSERT INTO tbl_transport_available_location SET
      `from`='$from',
	  `to`='$to'"; 
	mysql_query($qry);
	redirect("transport_mode.php?msg=success");
}
else
{
redirect("transport_mode.php?msg=success");
}

}
else
{
redirect("transport_mode.php");
}

?>