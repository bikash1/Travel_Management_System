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
$ids=$_GET['ids'];
$_SESSION['ids']=$ids;

 $qry="DELETE FROM `tbl_cms_image` WHERE `id`='$id'"; 
$res=mysql_query($qry);

redirect("../description.php?msg=delete_image");
}
?>