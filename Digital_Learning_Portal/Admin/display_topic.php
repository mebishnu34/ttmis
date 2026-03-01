<?php
session_start();
include("../php_processing/db_connection.php");
if($_GET['subid'])
	{
		$id=$_GET['subid'];
		$sql="Select id, levelid,content_topic from tbltopic where subjectid='$id'";
		$result=$conn->query($sql);
		$i=0;
		$sql="Select id, subjectname from tbl_subject where id='$id'";
		$rownum=$conn->query($sql);
		if($rownum->num_rows>0)
			{
				if($data1=$rownum->fetch_assoc())
					{
						$subject=$data1["subjectname"];
					}
			}
	?>
Name of Subject: <?php echo $subject;?>
<table width="80%" align="center" border="1", cellspacing="0">
<tr>
	<td width="100" align="center">S.No</td>
	<td align="center">Level</td>
	<td align="center">Topic</td>
	<td></td>
</tr>

<?php
		while($data=$result->fetch_assoc())
		{
			$sql1="Select id, levelname from tbllevel where id='$data[levelid]'";
			$result2=$conn->query($sql1);
			if($result2->num_rows>0)
				{
					if($data2=$result2->fetch_assoc())
						{
							$level=$data2["levelname"];
						}
				}
			echo "<tr>";
			echo "<td align=center>" . ($i+1). "</td>";
			echo "<td>" . $level . "</td>";
			echo "<td>" . $data["content_topic"] . "</td>";
			echo "<td align=center><a href=topic_edit.php?topid=".  $data["id"] . ">Edit</a>&nbsp<a href=display_topic_contents.php?topid=".  $data["id"] . ">Details</a></td>";
			echo "</tr>";
			$i++;
		}

?>
</table>
<?php
	}
?>