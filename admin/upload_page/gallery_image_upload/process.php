<?php
session_start();
if(isset($_POST['myfile']))
{
header("location:upload.php");
}
else
{
include("../../admin.php");

$con=mysql_connect('localhost','root','');
mysql_select_db('travel',$con) or die("could no found db");
$category=$_POST['category'];
$name=$_FILES['myfile']['name'];
$description=$_POST['description'];
$_SESSION['name']=$name;

$tmp_name=$_FILES['myfile']['tmp_name'];
if($name)
{
$location="gallery_images/$name";
//$newlocation="admin/upload_page/gallery_image_upload/gallery_images";

move_uploaded_file($tmp_name,$location);
 $qr="select * from place_image_location where location_name='$category'"; 
$res=mysql_query($qr);
$num=mysql_num_rows($res);
if($num==0)
{

	 $qry="INSERT INTO place_image_location SET
	    `location_name`='$category'"; 
		$result=mysql_query($qry); 
	}
	}	

$qry="INSERT INTO img SET
       imagename='$name',
	   image_location='$location',
	   category='$category',
	   image_description='$description'";
	   mysql_query($qry);
echo"<br><br><br><br>";
die("your file has been uploaded <a href='view.php'>view");
}

?>