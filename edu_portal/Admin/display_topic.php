<?php
session_start();
if($_SESSION['Admin']=="")
	{
		header('Location: ../index.php');
	}
include("../database/db_connection.php");
if($_GET['subid'])
	{
		$id=$_GET['subid'];
		$sql=mysql_query("Select subjectid, subject from tblsubject where subjectid='$id'", $con);
		$data=mysql_fetch_array($sql);
		$subject=$data["subject"];
	}
$level=$_SESSION['level'];
$faculty=$_SESSION['faculty'];
$sql=mysql_query("select detailsid, topic from tblcomputer where subject='$subject'",$con);
$rownum=mysql_num_rows($sql);
$i=0;
?>
<table width="600" align="center">
<tr>
<td colspan="3" align="center" bgcolor="#FFFFCC">Topic of <?php echo $subject . "/" . $level  . "/" . $faculty;?></td>
</tr>

<?php
while($i<$rownum)
	{
		echo "<tr>";
		echo "<td align=center>" . ($i+1) . "</td>";
		echo "<td>" . mysql_result($sql, $i, "topic") . "</td>";
		echo "<td><a href=details_action.php?id=". mysql_result($sql, $i, "detailsid") . ">Edit </a></td>";
		echo "</tr>";
		$i++;
	}
?>
</table>