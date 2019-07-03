<?php
session_start();
include("../../database/functions.php");
if(isset($_POST['myfile']))
{
redirect("upload.php");
}
else
{
include("../admin.php");

$con=@mysql_connect('localhost','root','');
@mysql_select_db('travel',$con) or die("could no found db");
@$page_id=$_GET['page_id'];
@$id=$_GET['id'];
@$name=$_FILES['myfile']['name'];
$_SESSION['name']=$name;

$tmp_name=@$_FILES['myfile']['tmp_name'];
if($name)
{
$location="../../images/page_image/$name";
//$newlocation="admin/upload_page/gallery_image_upload/gallery_images";

move_uploaded_file($tmp_name,$location);
 
if(isset($_GET['page_id']))
{
	 $qry="INSERT INTO tbl_cms_image  SET
	    `image_name`='$name',
		`page_id`='$page_id'"; 
		mysql_query($qry);
		redirect("add_image.php?msg2=img&page_id=".$page_id);
}

if(isset($_GET['id']))
{
 $_GET['id'];
	 $qry="INSERT INTO tbl_cms_image  SET
	    `image_name`='$name',
		`page_id`='$id'"; 
		mysql_query($qry);
			redirect("add_image.php?msg2=img&id=".$_GET['id']);
		
}


}

?>

<center><h1>Upload Images of Different Location</h1></center>
<?php
 if(isset($_GET['msg'])&& $_GET['msg']="add_success")
	   {
	     ?> 
		 <font color="#CC0000">
	     <br><br><center>You have successfully added a description.</font></center>
		  </font>
		  <?php
		}
		 
?>	
<form  method="post" action="" enctype="multipart/form-data">
<table border="0">
	<?php
 if(isset($_GET['msg2'])&& $_GET['msg2']="img")
	   {
	     ?> 
		 <font color="#CC0000">
	     <br><br><center><a href="../description.php">Click here to go to Content page.</a></font></center>
		  </font>
		  <?php
		}
		 
?>

<tr><td>Choose  Image To Upload:</td><td><input type="file" name="myfile"  /></td></tr>

<tr><td><input type="submit" name="upload" value="Upload" /></td><td></td></tr>
</form>

<?php }
?>