<?php 
if(isset($_POST['submit']))
   {
   include("../../database/connect.php");
    include("../../database/functions.php");
     $car_model=$_POST['car_model'];
	 $available_location=$_POST['available_location'];
	 $fare=$_POST['fare'];
	 $status=$_POST['status'];
	  $qry="INSERT INTO tbl_car_info SET
	        `car_model`='$car_model',
			`available_location`='$available_location',
			`fare`='$fare',
			`status`='$status'"; 
	    $res=mysql_query($qry);
		
		
		 $qr="select * from car_available_location where `car_available_location`='$available_location'"; 
$re=mysql_query($qr);
$num=mysql_num_rows($re);
if($num==0)
{

	
		$qrys="INSERT INTO car_available_location SET
		       `car_available_location`='$available_location'";
			   
			    
	    $res=mysql_query($qrys);
			   
		}
		redirect("admin_car_info.php?msgs=add_success");
	 }	
	  else{
	  redirect("admin_car_info.php");
	  }	
	 
	
	 ?>
	   