
<?php
if(isset($_POST['submit']))
{
include("../../database/functions.php");
include("../../database/connect.php");
$transport_mode_name=$_POST['transport_mode_name'];
$query="SELECT transport_mode_name FROM tbl_transport WHERE transport_mode_name='$transport_mode_name'";
$res=mysql_query($query);
$num=mysql_num_rows($res);
if($num>0)
{
redirect("transport_add.php?msg1=alreadyexist");
}
else
{
$qry="INSERT INTO tbl_transport SET 
      `transport_mode_name`='$transport_mode_name'";
	 $res=mysql_query($qry);
	 $id=mysql_insert_id($con);
	 $_SESSION['mode_id']=$id;
redirect("transport_route_add.php?id=$id&&transport_mode_name=$transport_mode_name");
}


}
else
{
redirect("transport_route_add.php");
}?>