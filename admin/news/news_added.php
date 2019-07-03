<?php
session_start();
include("../../database/functions.php");
if(!isset($_SESSION['admin']))
{
redirect("../../pages/login.php");
}
else
{
 
if(isset($_POST['submit']))
   {
   include("../../database/connect.php");
     $title=$_POST['title'];
	 $message=$_POST['message'];
	 
	 if(empty($title)|| empty($message))
	 { 
	   redirect("news_add.php?msg=blank");
	  }
	  else
	  {
	 $qry="INSERT INTO news SET
	        `newsName`='$title',
			`newsDescription`='$message'"; 
	    $res=mysql_query($qry);
		redirect("news.php?msg=add_success");
	  }		
	 }
	
	 }
	 ?>
	   