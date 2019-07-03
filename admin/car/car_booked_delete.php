<?php
session_start();
include("../../database/functions.php");
if(!isset($_SESSION['admin']))
{
redirect("../../pages/login.php");
}
else
{
$id=$_GET['id'];
$qry="DELETE FROM `tbl_car_booked` WHERE `id`='$id'";
$res=mysql_query($qry);
redirect("../admin.php");
}
?>