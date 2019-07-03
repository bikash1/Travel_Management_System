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
<br /><center><div><br /><h2>Transport Mode information</h2></div>
<div>
<a href="transport_add.php"><input type="button" name="add" value="Add Transport Mode"/></a><a href="transport_avail_location.php"><input type="button" value="Available location Names" /></a></div>
<table border="1" cellpadding="12" cellspacing="10">
<tr class="header">
<?php
if(isset($_GET['msg'])&& $_GET['msg']=="success")
{
?><tr><td colspan="2" style="color:#FF0000">Adding a new transport mode success</td></tr>
<?php
}

if(isset($_GET['msg1'])&& $_GET['msg1']=="success1")
{
?><tr><td colspan="2" style="color:#FF0000">Adding a new route success</td></tr>
<?php
}
if(isset($_GET['msg'])&& $_GET['msg']=="edit")
{
?><tr><td colspan="2" style="color:#FF0000">You have successfully edited the mode</td></tr>
<?php
}
?>
<th>id</th>
<th>Mode Name</th>                
</tr>


<?php
$sql="SELECT * FROM tbl_transport";
$result=mysql_query($sql);
$num=mysql_num_rows($result);
$i=1;
if($num=0)
{
?>
<tr class="nor">
  <td colspan="5">No mode is available</td>
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
		   <td><?php echo $row->transport_mode_name;?></td>
		   
		   <td><a href="transport_mode_edit.php?act=edit&id=<?php echo $row->id;?>">Edit</a>&nbsp;&nbsp;|<a href="transport_mode_delete.php?act=delete&id=<?php echo $row->id;?>"onclick="return confirm('Are you sure want to delete this transport mode ?');" >Delete</a>&nbsp;&nbsp;|<a href="transport_route.php?id=<?php echo $row->id;?>&mod=<?php echo $row->transport_mode_name;?>">Route Information</a>&nbsp;&nbsp;|<a href="transport_route_adds.php?id=<?php echo $row->id;?>&mod=<?php echo $row->transport_mode_name;?>">Add Route</a></td>
		   </tr>
		   <?php
		   $i++; $i<=$num;}
		    }
			?>
	</table>
	</center>
	
	<?php
	}?>