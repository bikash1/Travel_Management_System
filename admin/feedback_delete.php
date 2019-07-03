<?php
session_start();
include("../database/functions.php");
if(!isset($_SESSION['admin']))
{
redirect("../pages/login.php");
}
else
{
include("../database/connect.php");
$fname=$_GET['fname'];
$sql="DELETE  FROM `tbl_feedback` WHERE `fname`='$fname'";
$result=mysql_query($sql);
redirect("feedback.php");
}
?>