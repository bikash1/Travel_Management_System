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
<br /><center><div><br /><h2>Admin information</h2></div>
<div>
<a href="admin_add.php"><input type="button" name="add" value="Add" /></a></div>
<table border="1" cellpadding="12" cellspacing="10">
<tr>
<?php
if(isset($_GET['msg'])&& $_GET['msg']=="success")
{
?><tr><td colspan="2" style="color:#FF0000">Adding a new admin success</td></tr>
<?php
}
if(isset($_GET['msg'])&& $_GET['msg']=="edit")
{
?><tr><td colspan="2" style="color:#FF0000">You have successfully edit the information</td></tr>

<?php }
?>
<th>id</th>
<th>username </th>
<th>password </th>                
</tr>


<?php
$sql="SELECT * FROM tbl_adminlogin";
$result=mysql_query($sql);
$num=mysql_num_rows($result);
$i=1;
if($num=0)
{
?>
<tr>
  <td colspan="5">No admin  is available</td>
  </tr>
  <?php
  }
    else 
	{
	  while($row=mysql_fetch_object($result))
	     {
		 ?>
		   <tr>
		   <td><?php echo $i;?></td>
		   <td><?php echo $row->username;?></td>
		   <td><?php echo $row->password;?></td>
		   <td><a href="admin_edit.php?act=edit&id=<?php echo $row->id;?>">Edit</a>|<a href="admin_delete.php?act=delete&id=<?php echo $row->id;?>"onclick="return confirm('Are you sure want to delete this entry??');" >Delete</a></td>
		   </tr>
		   <?php
		  $i++; $i<=$num; }
		    }
			?>
	</table>
	</center>
	
	<?php
	}?>