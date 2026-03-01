<!DOCTYPE html>
<html>
<head>
<title>EDUTC</title>
</head>
<body>

<?php
include("../Processing/db_connection.php");
$q = $_GET['q'];
//$q = intval($_GET['q']); //for numerice value
$sql="SELECT * FROM tblschool where munvdc='".$q."'";
$result = mysqli_query($conn,$sql);
echo "<Select name=cmbschool onchange=teacher(this.value) class=normaltext>";
echo "<option>All</option>";
while($row = mysqli_fetch_array($result))
      {
      echo "<option>" . $row['schoolname'] . "</option>";
     }
echo "</select>";
mysqli_close($conn);
?>
</body>
</html>
