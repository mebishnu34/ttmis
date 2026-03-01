<!DOCTYPE html>
<html>
<head>
<title>EDUTC</title>
</head>
<body>

<?php
include("..\Processing\db_connection.php");
$q = intval($_GET['q']);
echo $q;
$sql="SELECT * FROM tbldistrict where districtid='".$q."'";
$result = mysqli_query($conn,$sql);

echo "<table>
<tr>
<th>Firstname</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['districtname'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($conn);
?>
</body>
</html>
