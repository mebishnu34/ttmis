<?php
include("../database/db_connection.php");
$sql="Select articleid, writername, subject, topic from tblarticle ORDER BY writername";
$rownum=$conn->query($sql);
$i=0;
?>
<table width="800" border="1">
<tr>
<td>S.No</td>
<td>Subject</td>
<td>Topic</td>
<td>Name of Writer</td>
<td>Action</td>
</tr>
<?php 
if($rownum->num_rows>0)
{
while($data=$rownum->fetch_assoc())
	{
	?>
<tr>
<td>
<?php
	 	echo ($i+1);
?>
</td>
<td>
<?php
	 	echo $data["subject"];
?>
</td>
<td>
<?php
	 	echo $data["topic"];
?>
</td>

<td>
<?php
	 	echo $data["writername"];
?>
</td>
<td bgcolor="#0000FF">
<a href=artical/writerarticle_Action.php?linkid=<?php echo $data["articleid"];?>>Edit</a>&nbsp;&nbsp;&nbsp;
<a href=artical/writerarticle_Action.php?dlinkid=<?php echo $data["articleid"];?>>Delete</a>
</td>
<?php
		$i++;
	echo "</tr>";
	}
}
?>
</table>
<a href="index.php">Back</a>