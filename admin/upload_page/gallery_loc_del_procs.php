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
 $qry="DELETE FROM `place_image_location` WHERE `id`='$id'";
$res=mysql_query($qry);
redirect("gallery_img_loc_del.php?123=delete");
}
?>