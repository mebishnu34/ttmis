<?php
ob_start();
include("database/db_connection.php");
$sql1="Select details from tblterm";
$res = $conn_1->query($sql1);
?>
<div class="tabledesign2">
<table width="100%" align="center">
<?php
if ($res->num_rows>0)
   {
    while($row1 = $res->fetch_assoc())
    {
		echo "<tr>";
		echo "<td>";
		echo $row1["details"];
		echo "</td>";
		echo "</tr>";
	}
}
?>
</table>
</div>