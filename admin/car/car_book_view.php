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


?>

<center>
  <font color="#FF0000" size="+4"><br />
  Car Book Information </font>
</center>

<table border="1" cellpadding="5" cellspacing="5" align="center">
  <?php	
$qry="SELECT * FROM car_book_view where status='1'";
$res=mysql_query($qry);
$num=mysql_num_rows($res);
$i=1;
if($num==0)
{
?>
  <tr>
    <td>No booking request is comming</td>
  </tr>
  <?php
}
else
{

		?>
  <tr>
    <th>id </th>
    <th>car_model </th>
    <th>available_location </th>
    <th>pick_up_date </th>
    <th>pick_up_time </th>
    <th>number_of_people </th>
    <th>pick_up_address </th>
    <th> drop_down_address </th>
    <th>Total amount</th>
  </tr>
  <?php
while($rows=mysql_fetch_object($res))
    {
	 
	    $query='SELECT * FROM tbl_car_booked where car_id='.$rows->id;
		
		
        $result=mysql_query($query); 
		$row=mysql_fetch_object($result)
		
		
		?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $rows->car_model; ?></td>
    <td><?php echo $rows->available_location; ?></td>
    <td><?php echo $row->pick_up_date; ?></td>
    <td><?php echo $row->pick_up_time;?></td>
    <td><?php echo $row->number_of_people;?></td>
    <td><?php echo $row->pick_up_address;?></td>
    <td><?php echo $row->drop_down_address;?></td>
    <td><?php echo $rows->fares; ?></td>
    </tr>
  <?php //echo $rows->username;
	$i++;  }}}?>
</table>
