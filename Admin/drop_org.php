<?php
include("../Processing/db_connection.php");
$q = $_GET['q'];
//$q = intval($_GET['q']); //for numerice value

if($q=="School")
{
$sql="SELECT schoolname,schoolcode FROM tblschool ORDER BY schoolname";
$result = mysqli_query($conn,$sql);
echo "<table width=100%>";
echo "<tr>";
echo "<td> Name of School</td>";
echo "<td width=80%>";
echo "<Select name=cmborg>";
while($row = mysqli_fetch_array($result))
      {
      echo "<option value='" . $row['schoolcode'] . "'>" . $row['schoolcode'].'-'. $row['schoolname'] . "</option>";
     }
echo "</select>";
mysqli_close($conn);
echo "</tr>";
echo "</table>";
}
elseif($q=="Municipality/Rural")
{
$sql="SELECT munvdc FROM tbldistrict ORDER BY districtname, munvdc";
$result = mysqli_query($conn,$sql);
echo "<table width=100%>";
echo "<tr>";
echo "<td> Name of Municipality/Rural</td>";
echo "<td width=70%>";
echo "<Select name=cmborg>";
while($row = mysqli_fetch_array($result))
      {
      echo "<option>" . $row['munvdc'] . "</option>";
     }
echo "</select>";
mysqli_close($conn);
echo "</tr>";
echo "</table>";
}
?>

