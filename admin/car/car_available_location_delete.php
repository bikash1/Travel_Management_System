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
 $qry="DELETE FROM `car_available_location` WHERE `id`='$id'";
$res=mysql_query($qry);
redirect("car_available_location.php?123=delete");
}
?>