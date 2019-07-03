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
	   if(isset($_POST['submit']))
	      {
		  $id=$_POST['id'];
		   $fname=$_POST['fname'];
		   $lname=$_POST['lname'];
		   $address=$_POST['address'];
		   $username=$_POST['username'];
		   $password=$_POST['password'];
		   $email=$_POST['email'];
		   $gender=$_POST['gender'];
		   $phone=$_POST['phone'];
		   $country=$_POST['country'];
		   $errors=array();
		   if(empty($fname))
		   {
		   $errors[]='first name cannot be blank';
		   }
		   if(empty($lname))
		   {
		   $errors[]='last name cannot be blank';
		   }
		   if(empty($address))
		   {
		   $errors[]='address cannot be blank';
		   }
		    if(empty($username))
		   {
		   $errors[]='username cannot be blank';
		   }
		   
		   if(empty($email))
		   {
		   $errors[]='email can not be empty';
		   }
		   if(empty($gender))
		   {
		   $errors[]='gender can not be blank';
		   }
		   if(empty($phone))
		   {
		   $errors[]='phone number can not be blank';
		   }
		   if(empty($country))
		   {
		   $errors[]='Country name can not be blank';
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
			   
				
			  $qry="UPDATE `tbl_registerUser` SET
			        `fname`='$fname',
					`lname`='$lname',
					`address`='$address',
					`username`='$username',
					`password`='$password',
					`email`='$email',
					`gender`='$gender',
					`phone`='$phone',
					`country`='$country'
					WHERE `id`='$id'";
					mysql_query($qry);
	
		
				 $query="UPDATE `tbl_userlogin` SET
				       `id`='$id',
					   `username`='$username',
					   `password`='$password'
					   WHERE `id`='$id'";
				$result=mysql_query($query);
				redirect("site_user.php");
				}
			}
		}	
		
		?>