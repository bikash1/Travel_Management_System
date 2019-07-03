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
?>
<h1><center>Upload Image</center></h1>
<table border="0" cellpadding="10" cellspacing="10">
<tr>

<td><a href="gallery_image_upload/upload.php">Gallery image Upload</a></td>
<td><a href="../delete_image.php">Delete image</a></td>
<td><a href="gallery_img_loc_del.php">Delete Image Location </a></td>
</tr>
</table>
<?php }?>