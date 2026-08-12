<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>EDUTC</title>
</head>
<body>
<?php
include("../Processing/db_connection.php");
$q = $_GET['q'];
$_SESSION['tn']=$q;
//$q = intval($_GET['q']); //for numerice value
$sql="SELECT * FROM tblttraining where trainingid='".$q."'";
$result = mysqli_query($conn,$sql);
echo "<Select name=cmbtnumber onchange=teacher(this.value)>";
while($row = mysqli_fetch_array($result))
      {
      echo "<option>" . $row['trainingnumber'] . "</option>";
     }
echo "</select>";
mysqli_close($conn);
?>
</body>
</html>
