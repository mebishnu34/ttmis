<!DOCTYPE html>
<html>
<head>
<title>EDUTC</title>
</head>
<body>

<?php
include("Processing/db_connection.php");
$q = $_GET['q'];
$scode=0;
$sql1 = "SELECT * FROM tblschool where schoolname='$q'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc()) 
		{
		$scode=$row["schoolcode"];
	}
	}
//$q = intval($_GET['q']); //for numerice value
$sql="SELECT * FROM tblteacher where scode='".$scode."'";
$result = mysqli_query($conn,$sql);
echo "<Select name=cmbteacher class=normaltext>";
while($row = mysqli_fetch_array($result))
      {
      echo "<option>" . $row['tname'] . "</option>";
     }
echo "</select>";
mysqli_close($conn);
?>
</body>
</html>
