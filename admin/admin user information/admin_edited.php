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
		  $username=$_POST['username'];
		   $password1=$_POST['password1'];
		   $password2=$_POST['password2'];
		    $errors=array();
			
			 if(empty($username))
		   {
		   $errors[]='username cannot be blank';
		   }
		   if(empty($password1))
		   {
		   $errors[]='password can not be empty';
		   }
		   if(empty($password2))
		   {
		   $errors[]='confirm password can not be blank';
		   }
		      
         if (count($errors) > 0) {
				echo '<p><strong style="color:#FF000;">Unable to Edit the information ' . 
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
			   $qry="UPDATE `tbl_adminlogin` SET
			         `username`='$username',
					`password`='$password1'
					WHERE id='$id'";
				$res=mysql_query($qry);
				redirect("admin_user.php?msg=edit");
					}
			}
		}
		}	
		?>	