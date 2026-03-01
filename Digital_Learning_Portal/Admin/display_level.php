<?php
include("../php_processing/db_connection.php");
//echo $_SESSION['level'];
$sql="Select id, levelname from tbllevel ORDER BY id";
$result=$conn->query($sql);
$i=0;
?>
<body>
<table width="800" align="center" border="1" cellspacing="0">
<tr>
<td align="center"><b>S.No</b></td>
<td align="center"><b>Level:</b></td>
<td>&nbsp;</td>
</tr>
<?php
while($data=$result->fetch_assoc())
{
echo "<tr>";
echo "<td align=center>" . ($i+1). "</td>";
echo "<td>" . $data["levelname"] . "</td>";
echo "<td align=center><a href=level_edit.php?subid=". $data["id"] . " Target=_blank> Edit </a></td>";
echo "</tr>";
$i++;
}
?>
</table>
</body>
</html>
