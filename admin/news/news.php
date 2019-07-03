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

$qry="SELECT * FROM news";
$res=mysql_query($qry);
$i=1;
?>
<center> <font color="#FF0000" size="+4"><br />News && Event</font></center>

<center><a href="news_add.php">Add News</a></center>
 <?php
	   if(isset($_GET['msg'])&& $_GET['msg']="add_success")
	   {
	     echo "Thank you for adding News && Event";
		}
		?>
		 <?php
	   if(isset($_GET['edit'])&& $_GET['edit']="edit")
	   {
	     echo " you have edited a News && Event";
		}
		?>
	<?php
	   if(isset($_GET['123'])&& $_GET['123']="delete_success")
	   {
	     echo "You have delete one news!!!!";
		}
		?>	
<table border="1" cellpadding="5" cellspacing="5" align="center">
<tr>
    <th>news_id</th>
	<th>news_title</th>
	<th>news_description</th>
	<th></th>
</tr>	
 <?php
while($row=mysql_fetch_object($res))
    {
	  ?>
	  <tr>
	     <td><?php echo $i; ?></td>
		 <td><?php echo $row->newsName; ?></td>
		 <td><?php echo $row->newsDescription; ?></td>
		 <td><a href="news_edit.php?id=<?php echo $row->id;?>">Edit</a>|<a href="news_delete.php?id=<?php echo $row->id;?>" onclick="return confirm('Are you sure you want to delete this news??');">Delete</a></td>
	  </tr>	  
	
	<?php  $i++; }?>
	</table>
	<?php }?>