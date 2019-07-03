<?php
@session_start();

if(isset($_SESSION['login']))
{

$_SESSION['admin']="1";
define("BASEURL","http://localhost:81/cgproject/admin");
define("BASESITEURL","http://localhost:81/cgproject/");
?>
<style type="text/css">
ul{
	list-style: none;
}
ul li{
	display: inline;
	padding-left: 5px;
	padding-right: 5px;
	padding-top: 10px;
	padding-bottom: 10px;
	margin-left: 1px;
	background-color: gray;
}
ul li a{
	text-decoration: none;
	color: black;

}
ul li:hover{
	background-color: #a9d489;
	}
</style>
<div class="header">
<img src="<?php echo BASESITEURL?>images/header.jpg" height="175" width="1349" />
</div>
<link rel="stylesheet" type="text/css" href="../css/dropdown.css">
<center><h1><b>Welcome to admin page</b></h1></center>
<table border="0" align="left" cellpadding="5" cellspacing="5">
   <ul class="admin_menu">
		<li><a href="<?php echo BASEURL?>/site_user/site_user.php">Site user</a></td>
		<li><a href="<?php echo BASEURL?>/admin user information/admin_user.php">Admin User</a></td>
		<li><a href="<?php echo BASEURL?>/news/news.php">News && Events</a></td>
		<li><a href="<?php echo BASEURL?>/testemonial/test.php">Testimonial</a></td>
		<li><a href="<?php echo BASEURL?>/description.php">Description</a></td>
		<li><a href="<?php echo BASEURL?>/feedback.php">Feedback</a></td>
		<li><a href="<?php echo BASEURL?>/car/admin_car_info.php">Car Info.</a></td>
		<li><a href="<?php echo BASEURL?>/car/admin_car.php">Car Book Detail</a></td>
		
		<li><a href="<?php echo BASEURL?>/transport/transport_mode.php">Transport Info</a></td>
		<li><a href="<?php echo BASEURL?>/transport_book_info/transport_book_info.php">Transport Book Info</a></td>
		<li><a href="<?php echo BASEURL?>/hotel/hotel_info.php">Hotel Info</a></td>
		<li><a href="<?php echo BASEURL?>/hotel_book_info.php/hotel_book_info.php">Hotel Book Info</a></td>
		<li><a href="<?php echo BASEURL?>/upload_page/upload_page.php">Upload image</a></td>
		
	</ul>
</table>	
<div style="width:200; top:190; height:50; float:right; position:absolute; left:1100;">
<a href="<?php echo  BASESITEURL?>/pages/logout.php"><font size="+3" color="#FF0000">Log Out</font></a>
</div>	
<?php

}
else
{
include("../database/functions.php");
redirect("../pages/login.php");
}

?>