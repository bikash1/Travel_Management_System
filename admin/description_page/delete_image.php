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

$id=$_GET['id'];


?>
<center> <font color="#FF0000" size="+4"><br />Images </font></center>
<table border="1" align="center">


<?php 
                  
				
      
							$sqlImages="select * from  tbl_cms_image where `page_id`='$id'";
							$ress=mysql_query($sqlImages);
							$nums=mysql_num_rows($ress);
							if($nums>0){
							while($rows=mysql_fetch_object($ress))
							{
							
							
						?>
							
							<tr><td>
							
<img src="../../images/page_image/<?php echo $rows->image_name;?>" height="250" width="250">

          </td><td><a href="delete_page.php?id=<?php echo $rows->id;?>&&ids=<?php echo $id;?>" onclick="return confirm('Are you sure you want to delete this image??');">Delete</a></td></tr>
		 
	
	

							<?php  }}}?>
						