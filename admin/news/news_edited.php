<?php
if(isset($_POST['submit']))
{
include("../../database/connect.php");
include("../../database/functions.php");
$title=$_POST['title'];
$msg=$_POST['message'];
$id=$_POST['id'];
$qry="UPDATE news SET
      `newsName`='$title',
	  `newsDescription`='$msg'
	  WHERE `id`='$id'";
$res=mysql_query($qry);
redirect("news.php?edit=edit");
}
else
{
redirect("news.php");
}
?>	  