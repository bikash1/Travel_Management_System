<?php
session_start();
include("../database/functions.php");
if(!isset($_SESSION['admin']))
{
redirect("../pages/login.php");
}
else
{
 include_once("../database/connect.php");
 if(isset($_POST['submit']))
 {
  $id=$_POST['id'];
 $page_name=$_POST['page_name'];
 $description=addslashes($_POST['description']);
  
  $sql="UPDATE `tbl_cms` SET
   `page_name`='$page_name',
   `description`='$description'
   WHERE `id`='$id'"; 
   $result=mysql_query($sql);
   redirect("description.php?12=12");
   }
   else
   {
   redirect("description.php");
   }
   }
   ?>