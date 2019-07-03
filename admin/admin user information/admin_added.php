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
include("../admin.php");
	   if(isset($_POST['submit']))
	      {
		   $password1=$_POST['password1'];
		   $password2=$_POST['password2'];
		     $errors=array();
		    $username=$_POST['username'];
		    $query = "SELECT username FROM tbl_registerUser WHERE username='$username'";
            $result = mysql_query($query) or die(mysql_error());
            if (mysql_num_rows($result) > 0) {
            $errors[] = 'Username ' . $username . ' is already registered.';
            $username = '';
            }	
			if(empty($username))
		   {
		   $errors[]='User name cannot be blank';
		   } 
			if(empty($password1))
		   {
		   $errors[]='Password cannot be blank';
		   }
		   if(empty($password2))
		   {
		   $errors[]='confirm Password cannot be blank';
		   }
		      if (count($errors) > 0) {redirect("admin_add.php?msg=blank");
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
			    if($password1==$password2)
				{
			     $qry="INSERT INTO `tbl_adminlogin` SET
				    `username`='$username',
					`password`='$password1'";
					$result=mysql_query($qry);
				redirect("admin_user.php?msg=success");
				}
				else
				{
				echo "password and confirm password do not match";
				}
				
			}
			
		}
		else
		{
		
			redirect("admin_add.php");
		
		}
	}		
?>		
		   
			