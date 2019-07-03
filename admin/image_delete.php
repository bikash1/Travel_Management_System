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
$id=$_GET['id'];
$qry="DELETE FROM `img` WHERE `id`='$id'";
$res=mysql_query($qry);
redirect("delete_image.php?msg=delete_image");
}
?>