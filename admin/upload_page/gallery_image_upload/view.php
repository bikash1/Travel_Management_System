<?php
session_start();
if(isset($_POST['myfile']))
{
header("location:upload.php");
}
else
{
include("../../admin.php");
$name=$_SESSION['name'];
$con=mysql_connect('localhost','root','');
mysql_select_db('travel',$con) or die("could no found db");
$qry=mysql_query("SELECT * FROM img WHERE imagename='$name'");
if(mysql_num_rows($qry)==0)
{
die("image  not found");
}
else
{
echo"<br><br><br><br>The image you have uploaded is:<br>";
$row=mysql_fetch_object($qry);
$location=$row->image_location;
echo "<img src='$location' height='200' width='200'>";
}}
?>