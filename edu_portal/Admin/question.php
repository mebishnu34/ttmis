<?php
ob_start();
include("header.php");
?>

<table width="100%">
<tr>
<td valign="top"> 

<?php
	 if($_SESSION['level']=="वालविकास केन्द्र")
	 	{
	 	$sql="select queid, subject, queby, topic, question, ondate, remark from tblsixque where level='$_SESSION[level]'";
	 	$rownum=$conn_1->query($sql);
		}
	elseif($_SESSION['level']=="आधारभूत (१ –५)")
		{
	 	$sql="select queid, subject, queby, topic, question, ondate, remark from tblsevenque where level='$_SESSION[level]'";
	 	$rownum=$conn_1->query($sql);
		}
	elseif($_SESSION['level']=="आधारभूत (६ –८)")
		{
	 	$sql="select queid, subject, queby, topic, question, ondate, remark  from tbleightque where level='$_SESSION[level]'";
	 	$rownum=$conn_1->query($sql);
		}
	elseif($_SESSION['level']=="माध्यमिक(९ –१०)")
		{
	 	$sql="select queid, subject, queby, topic, question, ondate, remark  from tblhigherque where level='$_SESSION[level]'";
	 	$rownum=$conn_1->query($sql);
		}
	elseif($_SESSION['level']=="माध्यमिक(११ –१२)")
		{
	 	$sql="select queid, subject, queby, topic, question, ondate, remark  from tbltenque where level='$_SESSION[level]'";
	 	$rownum=$conn_1->query($sql);
		}
	elseif($_SESSION['level']=="प्रधानाध्यापक (आधारभूत)")
		{
	 	$sql="select queid, subject, queby, topic, question, ondate, remark  from tblelevenque where level='$_SESSION[level]'";
	 	$rownum=$conn_1->query($sql);
		}
	elseif($_SESSION['level']=="प्रधानाध्यापक (माध्यमिक)")
		{
	 	$sql="select queid, subject, queby, topic, question, ondate, remark  from tbltwelveque where level='$_SESSION[level]'";
	 	$rownum=$conn_1->query($sql);
		}
	elseif($_SESSION['level']=="अन्य")
		{
	 	$sql="select queid, subject, queby, topic, question, ondate, remark  from tbltwelveque where level='$_SESSION[level]'";
	 	$rownum=$conn_1->query($sql);
		}
	 $i=0;
	?>
<table width="100%" align="center">
<?php
if($rownum->num_rows>0)
{
	while($data=$rownum->fetch_assoc())
		{
		echo "<tr>";
		echo "<td bgcolor=#FFFFCC><b>" . $_SESSION['level'] . " \ "  . $data["subject"] . " \ " . $data["topic"] . "--Post By:" . $data["queby"] . "</b></td>";
		$_SESSION['topic']=$data["topic"];
		echo "</tr>";
		echo "<tr>";
		echo "<td>" . $data["question"] . "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td bgcolor=#0000FF align=right><a href=post_answer.php?que=" . $data["queid"] . ">Post Answer</td>";
		echo "</tr>";
		$i++;
	}
}
?>
</table>
 </td>
</tr>
</table>
