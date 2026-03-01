<?php
ob_start();
include("database/db_connection.php");
$sql=mysql_query("Select newstitle, news, image,source, ondate from tblsocialnews", $con);
$rownum=mysql_num_rows($sql);
$i=0;
?>
<table width="100%" align="center">
<?php
while($i<$rownum)
	{
		echo "<tr>";
		echo "<td bgcolor=#0000FF align=center><b><font size=+1 color=#000000>";
		echo mysql_result($sql, $i, "newstitle");
		echo "</font></b></td>";
		echo "</tr>";
		if(mysql_result($sql, $i, "image")<>"")
		{
		echo "<tr>";
		echo "<td align=center>";
		echo '<img src="data:image/jpeg;base64,' . base64_encode(mysql_result($sql, $i, "image")) . '" width="200" height="200">';
				echo "</td>";
		echo "</tr>";
		}
		echo "<tr>";
		echo "<td align=justify>";
		echo mysql_result($sql, $i, "news") ."<b><font color=#0000FF>" . mysql_result($sql, $i, "source") . " - " . mysql_result($sql, $i, "ondate") ."</font></b>";
		echo "</td>";
		echo "</tr>";
		$i++;
	}
?>
</table>