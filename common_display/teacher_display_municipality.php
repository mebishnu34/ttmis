<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
</HEAD>
<BODY>
<table width="100%" border="1">
<tr>
<th align="center">S.No</th>
<th align="center">Teacher ID</th>
<th>Name of Teacher</th>
<th>Contact</th>
<th>Email</th>
<th></th>
</tr>
<?php
$sn=1;
include("../Processing/db_connection.php");
$d = $_GET['t'];
$sql1 = "SELECT * FROM tblteacher where munvdc='$d'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    echo "<tr>";
    echo "<td align=center>". $sn . "</td>";
   echo "<td align=center>" . $row["teachercode"] . "</td>";
    echo "<td>" . $row["tname"] . "</td>";
    echo "<td align=center>" . $row["tcontact"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td align=center bgcolor=blue><a href=common_display/teacher_details.php?tid=$row[teacherid] target=_blank>Details</a></td>";
    $sn++;
    }
   }

?>
</BODY>
</HTML>
