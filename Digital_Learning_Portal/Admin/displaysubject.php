<?php
include("../php_processing/db_connection.php");
//echo $_SESSION['level'];
$sql="Select subjectid, subject from tblsubject ORDER BY subject";
$result=$conn->query($sql);
$i=0;
?>
<body>
<table width="800" align="center" border="1" cellspacing="0">
<tr>
<td align="center"><b>S.No</b></td>
<td align="center"><b>Name of Subject</b></td>
<td>&nbsp;</td>
</tr>
<?php
while($data=$result->fetch_assoc())
{
echo "<tr>";
echo "<td align=center>" . ($i+1). "</td>";
echo "<td>" . $data["subject"] . "</td>";
echo "<td align=center><a href=subject_action.php?subid=". $data["subjectid"] . " Target=_blank> Edit </a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=display_topic.php?subid=". $data["subjectid"] . " Target=_blank> Topic </a></td>";
echo "</tr>";
$i++;
}
?>
</table>
</body>
</html>
