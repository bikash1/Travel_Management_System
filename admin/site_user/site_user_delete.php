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
$qry="DELETE FROM `tbl_registerUser` WHERE `id`='$id'";
$res=mysql_query($qry);
$sql="DELETE  FROM `tbl_userlogin` WHERE `id`='$id'";
$result=mysql_query($sql);

redirect("site_user.php");
}
?>