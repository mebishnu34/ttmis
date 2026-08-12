<HTML>
<HEAD>
 <TITLE>TTMIS</TITLE>
</HEAD>
<BODY>
<table width="100%">
<tr>
<th>S.No</th>
<th>Import No.</th>
<th>Import By</th>
<th>&nbsp;</th>
</tr>
<?php
$sn=1;
include("../Processing/db_connection.php");
//$d = $_GET['t'];
$array=array();
$sql1 = "SELECT DISTINCT importno, username FROM tblteacher ORDER BY importno";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    echo "<tr>";
    echo "<td>". $sn . "</td>";
   echo "<td align=center>" . $row["importno"] . "</td>";
    echo "<td align=center>" . $row["username"] . "</td>";
    echo "<td align=center><a href=../export/save_teacher_import.php?importno=$row[importno] target=_blank>Save In Excel</a> &nbsp;&nbsp;<a href=../Display/display_import_teacher_1.php?importno=$row[importno] target=_blank>Teacher List</a></td>";
    $sn++;
    }
   }

?>
</BODY>
</HTML>
