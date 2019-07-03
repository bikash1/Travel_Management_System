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
<br /><center><div><br /><h2>Transport Available location </h2></div>


<div style="width:250; left:500; top:400; position:absolute; float:left;">
<table border="1" cellpadding="12" cellspacing="10">
<tr>
<?php
if(isset($_GET['123'])&& $_GET['123']=="delete")
{
?><tr><td colspan="2" style="color:#FF0000">Deleting a  transport available location  success</td></tr>
<?php
}
?>

<th>From Location </th>
<th>Delete</th>

                
</tr>


<?php
$sql="SELECT * FROM  tbl_transport_available_location";
$result=mysql_query($sql);
$num=mysql_num_rows($result);
if($num=0)
{
?>
<tr>
  <td colspan="5">No Location</td>
  </tr>
  <?php
  }
    else 
	{
	  while($row=mysql_fetch_object($result))
	     {
			 ?>
			   <tr>
			   <td><?php  if($row->from!=''){ echo $row->from; ?></td>
			   
			
			  <td><a href="transport_avail_loc_delete.php?act=delete&from_id=<?php echo $row->id;?>"onclick="return confirm('Are you sure want to                       delete this entry??');" >Delete</a></td>
			  </tr>
			  
			  
		  <?php }}
		  ?>
		  </table>
		  </div>
		  <?php
		  
		  $sql="SELECT * FROM  tbl_transport_available_location";
				$results=mysql_query($sql);
				$nums=mysql_num_rows($result);
		  ?>
		  
		  <div style="width:350; left:600; top:400; position:absolute; float:left;">
		<table border="1" cellpadding="12" cellspacing="10"  align="right">
		  <tr><th>To location</th>
		  <td>Delete</td></tr>
		  <?php
		    while($rows=mysql_fetch_object($results)){
			?>
			<tr>
		   <td><?php  if($rows->to!=""){ echo $rows->to; ?></td>
		   
		
		  <td><a href="transport_avail_loc_delete.php?act=delete&to_id=<?php echo $rows->id;?>"onclick="return confirm('Are you sure want to delete this entry??');" >Delete</a></td>
		  
		  
		  
		  
		   </tr>
		   
		   <?php
		   }
		    }
			?>
	</table>
	
	</div>
	<?php
	}}?>