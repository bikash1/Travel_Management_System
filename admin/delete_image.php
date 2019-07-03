<?php
session_start();
include("../database/functions.php");
if(!isset($_SESSION['admin']))
{
redirect("../pages/login.php");
}
else
{
include("admin.php");
include("../database/connect.php");


?>
<center> <font color="#FF0000" size="+4"><br />Images </font></center>
<table border="1" align="center">
<?php if(isset($_GET['msg']) && $_GET['msg']==="delete_image")
	   {
	   ?>
	   <div style="widows:400; height:100; left:200; float:left; position:absolute; color:#FF0000; "><font size="+2">You have deleted an image</font></div>
	   <?php
	    
		}
	?>	

<?php 
      
							$sqlImages="select * from place_image_location " ;
							$ress=mysql_query($sqlImages);
							$nums=mysql_num_rows($ress);
							if($nums>0){
							while($rows=mysql_fetch_object($ress))
							{
							$loc_name=$rows->location_name;

						 $sqlImage="select * from img where category='$loc_name'" ; 
							$res=mysql_query($sqlImage);
							$num=mysql_num_rows($res);
							if($num>0){
							echo "<tr><td>".$loc_name."&nbsp;&nbsp;image</td></tr>";
							while($row=mysql_fetch_object($res))
							{
							?>
							
							<tr><td>>
							
<img src="upload_page/gallery_image_upload/gallery_images/<?php echo $row->imagename;?>" height="250" width="250">

          </td><td><a href="image_delete.php?id=<?php echo $row->id;?>" onclick="return confirm('Are you sure you want to delete this image??');">Delete</a></td></tr>
		  <tr><td><?php echo $row->image_description;?></td></tr>
	
	

							<?php  }}}}}?>
						