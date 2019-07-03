<?php
session_start();
include("../database/connect.php");
include("../database/functions.php");
if(!isset($_SESSION['admin']))
{
redirect("../pages/login.php");
}
else
{
?>
<?php 
 include("admin.php");
if(isset($_GET['msg'])&& $_GET['msg']=="delete_success")
{
?>
 <font color="#FF0000" size="+2"> <br /><br />
 <?php
echo " You have successfully delete the description";
?>
</font>
<?php
}
if(isset($_GET['12'])&& $_GET['12']=="12")
{
?>
<font color="#990000" size="+2"><br /><br />You have successfully edited the description</font>
<?php
}
if(isset($_GET['msg2'])&& $_GET['msg2']=="img")
{
?>
<font color="#990000" size="+2"><br /><br />You have successfully added an image</font>
<?php
}
  if(isset($_GET['msg']) && $_GET['msg']=="delete_image")
	   {
	   ?>
	 <font color="#FF0000" size="+2">  <br /><br />You have deleted an image</font>
		 
	<?php  }
	    
		
	?>

	
<center><a href="description_page/page_add.php"><button style="color:#CC0000">Add a new Description</button></a></center>
<table width="1320" border="1" cellpadding="0" cellspacing="0">
	<tr><th>sno</th>
		<th>Page_name</th>
		<th>Description</th><th></th>
	</tr>
<?php
$qry="SELECT * FROM tbl_cms order by id asc";
$res=mysql_query($qry);
$num=mysql_num_rows($res);
$i=1;
if($num>0)
{
while($row=mysql_fetch_object($res))
     {//var_dump($row);
	?>
	<tr>
	  <td><?php echo $i;?></td>
	 
	 <td><?php echo $row->page_name;?></td>
	 <td><?php echo $row->description?></td>
	 
	 
	
	    <td><a href="description_edit.php?act=edit&id=<?php echo $row->id;?>">Edit</a>|<a href="description_delete.php?act=delete&id=<?php echo $row->id;?>" onclick="return confirm('Are you sure you want to delete this content');">Delete</a>|<br /><a href="description_page/add_image.php?act=edit&id=<?php echo $row->id;?>">Add image</a>|<br /><a href="description_page/delete_image.php?act=delete&id=<?php echo $row->id;?>">Delete  image</a></td>
</tr>	
	<?php	

	$i++;}	
}
}
?>
</table>