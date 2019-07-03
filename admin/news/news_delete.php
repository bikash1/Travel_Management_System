<?php
session_start();
include("../../database/functions.php");
if(!isset($_SESSION['admin']))
{
redirect("../../pages/login.php");
}
else
{
include_once("../../database/connect.php");
$id=$_GET['id'];
$qry="DELETE FROM news WHERE id='$id'";
$res=mysql_query($qry);
redirect("news.php?123=delete_success");
}
?>