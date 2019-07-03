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
$id=$_GET['id'];
 $qry="SELECT * FROM `tbl_cms` WHERE `id`='$id'";
$res=mysql_query($qry);
$row=mysql_fetch_object($res);
?>
<br /><br />
<div><h3>Edit the content of the page</h3></div>
<form method="post" action="description_edited.php">

Page name<input type="text" name="page_name" value="<?php echo $row->page_name;?>" /><br />
Description<textarea cols="130" rows="30" name="description"><?php echo $row->description;?></textarea><br />

<input type="hidden" name="id" value="<?php echo $id;?>" />
<input type="submit" name="submit" value="Edit" />
</form>
<?php
}
?>