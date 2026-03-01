<?php
include("header.php");
include("../../Processing/db_connection.php");
$_SESSION['level']=$_POST['cmblevel'];
//echo $_SESSION['level'];
$sql="Select ID, subject from tbltraining where level='$_SESSION[level]'";
$result=$conn->query($sql);
$i=0;
?>
<body>
<table width="800" align="center" border="1">
<tr>
<td align="center"><b>S.No</b></td>
<td align="center"><b>Name of Subject</b></td>
<td align="center"><b>Remark</b></td>
</tr>
<?php
while($data=$result->fetch_assoc())
{
echo "<tr>";
echo "<td align=center>" . ($i+1). "</td>";
echo "<td>" . $data["subject"] . "</td>";
echo "<td bgcolor=#0000FF><a href=add_details.php?subid=". $data["ID"] . ">Add details</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=display_topic.php?subid=". $data["ID"] . "> Display Topic</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=subject_action.php?subid=". $data["ID"] . ">Edit</a></td>";
echo "</tr>";
$i++;
}
?>
</table>
</body>
</html>
