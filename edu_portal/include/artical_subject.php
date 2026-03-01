<?php
session_start();
include("database/db_connection.php");
$sql="Select id, writername, subject,topic from tblarticle ORDER BY writername";
$rownum=$conn->query($sql);
$i=0;
?>
<table width="100%" border="0">
<?php 
if($rownum->num_rows>0)
{
while($data=$rownum->fetch_assoc())
	{
?>
<tr>
<td>
<?php
	 	echo "<a href=read_article.php?alinkid=".$data["id"] . ">" . $data["topic"] ."-" . $data["writername"]."</a>";
//echo "<a href=read_article.php?alinkid=".$data["id"] . ">" .$data["subject"] ."-".$data["topic"] ."-" . $data["writername"]."</a>";
		$i++;
	}
}
?>
</td>
</tr>
</table>
