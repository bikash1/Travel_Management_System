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
include_once("../../database/connect.php");
?>
<br /><br />
<div><center><h2>customer information</h2></center></div>
<div>
<a href="site_user_add.php"><input type="button" name="add" value="Add" /></a></div>
<?php 
 if(isset($_GET['msg']) && $_GET['msg']==="success")
 {
 echo"<font color='Green' size='8'> "; 
 
 echo "Adding new user success.";
 echo "</font>";
 }
 if(isset($_GET['msg']) && $_GET['msg']==="notsuccess")
 {
 echo"<font color='red' size='8'> "; 
 
 echo "Adding new user fail...!";
 echo "</font>";

 }
 ?>
 
<table border="1" cellpadding="12" cellspacing="10">
<tr class="header">
<th>id</th>
<th>First Name</th>
<th>Last Name</th>
<th>Address</th>
<th>username </th>
<th>password </th>                
<th>Email</th>
<th>Gender</th>
<th>Phone number</th>
<th>Country</th>
<th>Action</th>
</tr>


<?php
$sql="SELECT * FROM tbl_registerUser";
$result=mysql_query($sql);
$num=mysql_num_rows($result);
 $i=1;
if($num==0)
{
?>
<tr class="nor">
  <td colspan="5">No site user is available</td>
  </tr>
  <?php
  }
    else 
	{				 
	  while($row=mysql_fetch_object($result))
	     {
		?>
		 
		   <tr>
		   <td><?php  echo $i;  ?> </td>
		   
		   <td><?php echo $row->fname;?></td>
		   <td><?php echo $row->lname;?></td>
		   <td><?php echo $row->address;?></td>
		   <td><?php echo $row->username;?></td>
		   
		   <td><?php echo $row->password; ?></td>
		   <td><?php echo $row->email;?></td>
		   <td><?php echo $row->gender;?></td>
		   <td><?php echo $row->phone;?></td>
		    <td><?php echo $row->country;?></td>
		   <td><a href="site_user_edit.php?act=edit&id=<?php echo $row->id;?>">Edit</a>|<a href="site_user_delete.php?act=delete&id=<?php echo $row->id;?>" onClick="return confirm('Are you sure want to delete this entry??');">Delete</a></td>
		   </tr>
		   <?php  $i++;  $i<=$num;?>
		   <?php
		   }
		  
		    }
			?>
	</table>
	<?php
	}
	?>