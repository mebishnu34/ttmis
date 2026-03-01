<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
</HEAD>
<BODY>
<table>
<tr>
<th>S.No</th>
<th>Teacher ID</th>
<th>Name of Teacher</th>
<th>Contact</th>
<th>Email</th>
</tr>
<?php
$sn=1;
include("../Processing/db_connection.php");
$d = $_GET['t'];
if($d=="All")
{
$sql1 = "SELECT * FROM tblteacher ORDER BY district,munvdc,tname";
$result = $conn->query($sql1);
 }
 else
 {
 $sql1 = "SELECT * FROM tblteacher where district='$d' ORDER BY tname";
 $result = $conn->query($sql1);
 }
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    echo "<tr>";
    echo "<td>". $sn . "</td>";
   echo "<td><a href=teacher_details.php?tid=$row[teacherid]>" . $row["teacherid"] . "</a></td>";
    echo "<td>" . $row["tname"] . "</td>";
    echo "<td>" . $row["tcontact"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    $sn++;
    }
   }

?>
</BODY>
</HTML>
