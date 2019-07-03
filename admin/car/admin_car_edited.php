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

	   if(isset($_POST['submit']))
	      {
		  $id=$_POST['id'];
		  $car_model=$_POST['car_model'];
		   $available_location=$_POST['available_location'];
		   $fare=$_POST['fare'];
		   $status=$_POST['status'];
		    $errors=array();
			
			 if(empty($car_model))
		   {
		   $errors[]='car_model cannot be blank';
		   }
		   if(empty($available_location))
		   {
		   $errors[]='available_location can not be empty';
		   }
		   if(empty($fare))
		   {
		   $errors[]='fare can not be blank';
		   }
		      
         if (count($errors) > 0) {
				echo '<p><strong style="color:#FF000;">Unable to register ' . 
					'.</strong></p>';
				echo '<p>Please fix the following:</p>';
				echo '<ul>';
				foreach ($errors as $error) {
					echo '<li>' . $error . '</li>';
				}
				echo '</ul>';
				
			}
			else
			{ 
			 $qry="UPDATE `tbl_car_info` SET
			         `car_model`='$car_model',
					`available_location`='$available_location',
					`fare`='$fare',
					`status`='$status'
					WHERE id='$id'"; 
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
					redirect("admin_car_info.php");
			}
		}
		}
			
		?>	