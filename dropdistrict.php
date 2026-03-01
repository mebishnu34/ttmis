<!DOCTYPE html>
<html>
<head>
<title>EDUTC</title>
</head>
<body>

<?php
include("Processing/db_connection.php");
$q = $_GET['q'];
//$q = intval($_GET['q']); //for numerice value
$sql="SELECT * FROM tbldistrict where districtname='".$q."'";
$result = mysqli_query($conn,$sql);
echo "<Select name=cmbmv>";
     echo "<option>" . $vdc . "</option>";
while($row = mysqli_fetch_array($result))
      {
      echo "<option>" . $row['munvdc'] . "</option>";
     }
echo "</select>";
mysqli_close($conn);
?>
</body>
</html>
