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
$_SESSION['tid']=$q;
//$q = intval($_GET['q']); //for numerice value
$sql="SELECT * FROM tblttraining where trainingid='".$q."' ORDER BY trainingnumber";
$result = mysqli_query($conn,$sql);
echo "<Select name=cmbnumber onchange=teacher(this.value)>";
while($row = mysqli_fetch_array($result))
      {
      echo "<option value='" . $row['trainingnumber'] . "'>" . $row['trainingnumber'] . "</option>";
     }
echo "</select>";
?>
</body>
</html>
