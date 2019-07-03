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
include_once("../database/connect.php");
?>
<div><center><h1><br /><br />Feedback</h1></center></div>


<table border="1" cellpadding="12" cellspacing="10" align="center">
<tr>
<th>Sno.</th>
<th> First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Message</th>
</tr>

<?php
$sql="SELECT * FROM tbl_feedback";
$result=mysql_query($sql);
$num=mysql_num_rows($result);
$i=1;
if($num==0)
{
?>
<tr class="nor">
  <td colspan="5">No feedback</td>
  </tr>
  <?php
  }
    else 
	{
	  while($row=mysql_fetch_object($result))
	     {
		 ?>
		   <tr>
		   <td><?php  echo $i; ?></td>
		   <td><?php echo $row->fname;?></td>
		   <td><?php echo $row->lname;?></td>
		   <td><?php echo $row->email;?></td>
		   <td><?php echo $row->message;?></td>
		   <td><a href="feedback_delete.php?fname=<?php echo $row->fname;?>" onClick="return confirm('Are you sure want to delete this entry??');">Delete</a></td>
		   </tr>
		   <?php
		  $i++; }
		    }
			?>
	</table>
	<?php
	}
	?>