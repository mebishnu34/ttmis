<?php
include("../database/db_connection.php");
$sql=mysql_query("select newsid, newstitle from tblnews",$con);
$rownum=mysql_num_rows($sql);
$i=0;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Selfreading</title>
</head>
<body>
<table width="600" align="center" border="1">
<tr>
<td align="center">S.No</td>
<td align="left">News Title</td>
<td>Action</td>

</tr>
<?php
while($i<$rownum)
	{
		echo "</tr>";
		echo "<td align=center>" . ($i+1) . "</td>";
		echo "<td>" . mysql_result($sql,$i, "newstitle") . "</td>";
		echo "<td bgcolor=#0099ff><a href=index.php?elink=". mysql_result($sql, $i, "newsid") . ">Update</a></td>";
		echo "</tr>";
		$i++;
	}
?>
</table> 
</body>
</html>
