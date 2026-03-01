<?php
include("../database/db_connection.php");
$sql="Select reportid, username, level, faculty, logindate, remark from tblloginreport where remark='ON' order by username";
$rownum=$conn->query($sql);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title></title>
</head>
<body>
<table width="800" align="center" border="1">
<tr>
<td colspan="5" align="center"><b><font color="#0000FF" size="+3">Visitors Report</font></b></td>
</tr>
<tr>
<td align="center"><b>S.No</b></td>
<td align="center"><b>Name of User</b></td>
<td align="center"><b>Level</b></td>
<td align="center"><b>Faculty</b></td>
<td align="center"><b>Date/Time</b></td>
<td align="center"><b>Remark</b></td>
</tr>
<?php
$i=0;
if($rownum->num_rows>0)
{
while($data=$rownum->fetch_assoc())
	{
	echo "<tr>";
	echo "<td align=center>" . ($i+1) . "</td>";
	echo "<td>" . $data["username"] . "</td>";
	echo "<td>" . $data["level"] . "</td>";
	echo "<td>" . $data["faculty"] . "</td>";
	echo "<td>" . $data["logindate"] . "</td>";
	echo "<td bgcolor=#0099FF> <a href=index.php?vid=" . $data["reportid"] . "> Log Off</a>";
	echo "</tr>";
	$i++;
	}
}
?>
</table>
</body>
</html>
