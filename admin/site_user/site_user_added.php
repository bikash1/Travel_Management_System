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
		   $fname=$_POST['fname'];
		   
		   $_SESSION['fname']=$fname;
		   $lname=$_POST['lname'];
		   $_SESSION['lname']=$lname;
		   $address=$_POST['address'];
		   $username=$_POST['username'];
		    $query = "SELECT username FROM tbl_registerUser WHERE username='$username'"; 
            $result = mysql_query($query) or die(mysql_error());
            if (mysql_num_rows($result) > 0) { 
			
            $errors[] = 'Username ' . $username . ' is already registered.';
            $username = '';
            }	
		   $password1=$_POST['password1'];
		   $password2=$_POST['password2'];
		   $email=$_POST['email'];
		   $gender=$_POST['gender'];
		   $phone=$_POST['phone'];
		   $country=$_POST['country'];
		   
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
		   if(empty($password1))
		   {
		   $errors[]='password can not be empty';
		   }
		   if(empty($password2))
		   {
		   $errors[]='confirm password can not be blank';
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
		  // var_dump(count($errors)); die();
		   
         if (count($errors) > 0) { redirect("site_user_add.php?msg1=alreadyex");
				/*echo '<p><strong style="color:#FF000;">Unable to register ' . 
					'.</strong></p>'; 
				echo '<p>Please fix the following:</p>';
				echo '<ul>';
				foreach ($errors as $error) {
					echo '<li>' . $error . '</li>';
				}
				echo '</ul>';
				
			*/}
			else
			{ 
			    if($password1==$password2)
				{
			     $qry="INSERT INTO tbl_registerUser SET
			        `fname`='$fname',
					`lname`='$lname',
					`address`='$address',
					`username`='$username',
					`password`='$password1',
					`email`='$email',
					`gender`='$gender',
					`phone`='$phone',
					`country`='$country'";
				$res=mysql_query($qry);
				$id=mysql_insert_id($con);
				$query="insert into tbl_userlogin set
				       `id`='$id',
					   `username`='$username',
					   `password`='$password1'";
				$result=mysql_query($query);
			redirect("site_user.php?msg=success");
				}
				else
				  {
				  redirect("site_user_add.php?errmsg=error");
				  }
			}
		}	
	}
	?>	
	