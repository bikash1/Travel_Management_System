<?php
session_start();
include("../../database/functions.php");
if(!isset($_SESSION['admin']))
{
redirect("../../pages/login.php");
}
else
{
include("../../database/connect.php");
$id=$_GET['id'];
$qry="DELETE FROM `tbl_car_info` WHERE `id`='$id'";
$res=mysql_query($qry);
redirect("admin_car_info.php?msg=delete_car");
}
?>