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
$i=1;
?>
<br /><center><div><br /><h2>Hotel information</h2></div>
<div>
<a href="hotel_add.php"><input type="button" name="add" value="Add" /></a></div>
<table border="1" cellpadding="12" cellspacing="10">
<tr>
<?php
if(isset($_GET['hh'])&& $_GET['hh']=="add")
{
?><tr><td colspan="2" style="color:#FF0000">Adding a new hotel success..</td></tr>
<?php
}
if(isset($_GET['123'])&& $_GET['123']=="delete_success")
{
?><tr><td colspan="2" style="color:#FF0000">You have deleted a hotel..</td></tr>

<?php }
?>
 <?php
	   if(isset($_GET['edit'])&& $_GET['edit']="edit")
	   {
	     ?><tr><td colspan="2" style="color:#FF0000">You have edited the detail for hotel</td></tr>
		 <?php
		}
		?>
<th>id</th>
<th>Name</th>
<th>Location </th>
<th>Image</th>
<th>Description</th>

<th>email</th>
<th>Phone</th>
<th>Type</th>                
</tr>


<?php
$sql="SELECT * FROM tbl_hotels";
$result=mysql_query($sql);
$num=mysql_num_rows($result);
if($num=0)
{
?>
<tr>
  <td colspan="5">No hotel  is available</td>
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
		   <td><?php echo $row->name;?></td>
		   <td><?php echo $row->location;?></td>
		   <td><img src="../../images/hotel_image/<?php echo $row->image;?>" width="200" height="200"></td>
		   <td><?php echo $row->description;?></td>\
		  
		   <td><?php echo $row->email;?></td>
		   <td><?php echo $row->phone;?></td>
		   <td><?php echo $row->type;?></td>
		   
		   <td><a href="hotel_edit.php?act=edit&id=<?php echo $row->id;?>">Edit</a>|<a href="hotel_delete.php?act=delete&id=<?php echo $row->id;?>"onclick="return confirm('Are you sure want to delete this entry??');" >Delete</a></td>
		   </tr>
		   <?php
		  $i++; }}
		    
			?>
	</table>
	</center>
	
	<?php
	}?>