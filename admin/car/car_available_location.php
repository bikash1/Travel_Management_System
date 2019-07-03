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
<br /><center><div><br /><h2>Car Available location </h2></div>

<table border="1" cellpadding="12" cellspacing="10">
<tr>
<?php
if(isset($_GET['123'])&& $_GET['123']=="delete")
{
?><tr><td colspan="2" style="color:#FF0000">Deleting a  car available location  success</td></tr>
<?php
}
?>
<th>id</th>
<th>Available Location </th>
                
</tr>


<?php
$sql="SELECT * FROM car_available_location";
$result=mysql_query($sql);
$num=mysql_num_rows($result);
$i=1;
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
		   <td><?php echo $i;?></td>
		   <td><?php echo $row->car_available_location;?></td>
		
		  <td><a href="car_available_location_delete.php?act=delete&id=<?php echo $row->id;?>"onclick="return confirm('Are you sure want to delete this entry??');" >Delete</a></td>
		   </tr>
		   <?php
		   $i++;}
		    }
			?>
	</table>
	</center>
	
	<?php
	}?>