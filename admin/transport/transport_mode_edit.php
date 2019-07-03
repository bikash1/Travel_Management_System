<?php
session_start();
include("../../database/functions.php");
if(!isset($_SESSION['admin']))
{
redirect("../../pages/login.php");
}
else
{
include("../admin.php");
include("../../database/connect.php");


	   if(isset($_POST['submit']))
	      {
		  $id=$_POST['id'];
		  $mode_name=$_POST['mode_name'];
		    $errors=array();
			
			 if(empty($mode_name))
		   {
		   $errors[]='Mode name  cannot be blank';
		   }
		   
		      
         if (count($errors) > 0) {  redirect("transport_mode.php");
		 
		 
		 /*
				echo '<p><strong style="color:#FF000;"> ' . 
					'.</strong></p>';
				echo '<p>Please fix the following:</p>';
				echo '<ul>';
				foreach ($errors as $error) {
					echo '<li>' . $error . '</li>';
				}
				echo '</ul>';*/
				
			}
			else
			{ 
			    if($password1==$password2)
				{
			   $qry="UPDATE `tbl_transport` SET
			         `transport_mode_name`='$mode_name'
					
					WHERE id='$id'";
				$res=mysql_query($qry);
				redirect("transport_mode.php?msg=edit");
					}
			}
		}
	
		?>
<?php			
$id=$_GET['id'];
$query="SELECT * FROM tbl_transport WHERE id='$id'";
$res=mysql_query($query);
$row=mysql_fetch_object($res);
?>
<br /><center><div><br /><h2>Edit Mode Details</h2></div>
<form method="post" action="">
	<table border="0" cellpadding="5" cellspacing="5">
	<tr><td>Mode Name</td><td><input type="text" name="mode_name" value="<?php echo $row->transport_mode_name;?>" /></td></tr>
			<tr><td><input type="hidden" name="id" value="<?php echo $id;?>" /></td></tr>
			<tr><td><input type="submit" name="submit" value="Edit" /></td></tr>
			</form>
			

</table>
</form>
</center>
<?php
}
?>