<?php
session_start();
include("../../database/connect.php");
include("../../database/functions.php");
if(!isset($_SESSION['admin']))
{
redirect("../../pages/login.php");
}
else
{
$from_id=$_GET['from_id'];
$to_id=$_GET['to_id'];
if(isset($_GET['from_id']))
{

 $qry="update  `tbl_transport_available_location` set `from`='' WHERE `id`='$from_id'";
 mysql_query($qry);
 
redirect("transport_avail_location.php?123=delete");
 
 }
if(isset($_GET['to_id']))
{ 
  $qr="update  `tbl_transport_available_location` set `to`='' WHERE `id`='$to_id'"; 
 mysql_query($qr);
 
 
$res=mysql_query($qr);
redirect("transport_avail_location.php?123=delete");
}
}

?>