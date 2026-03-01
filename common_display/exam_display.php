<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
</HEAD>
<BODY>
<table width="100%" class="dtable">
<tr>
<th>S.No</th>
<th>Exam Name</th>
<th>Exam Type</th>
<th>Mark of</th>
</tr>
<?php
$sn=1;
include("../Processing/db_connection.php");
$sql = "SELECT * FROM tblexam ORDER BY examname";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
         echo "<tr>";
         echo "<td align=center>". $sn . "</td>";
         echo "<td>" . $row["examname"] . "</td>";
         echo "<td>" . $row["examtype"] . "</td>";
         echo "<td align=center>" . $row["markof"] . "</td>";
         echo "</tr>";
         $sn++;
    }
}

?>
</BODY>
</HTML>
