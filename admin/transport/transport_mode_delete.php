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
$id=$_GET['id'];
  $qry="DELETE FROM `tbl_transport` WHERE `id`='$id'"; 
$res=mysql_query($qry);
 $qrey="DELETE FROM `tbl_transport_route` WHERE `mode_id`='$id'";
$result=mysql_query($qrey); 
redirect("transport_mode.php");
}
?>