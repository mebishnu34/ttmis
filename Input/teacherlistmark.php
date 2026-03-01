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
$q = $_SESSION['tn'];
$t = $_GET['t'];
//$q = intval($_GET['q']); //for numerice value
$sql="SELECT * FROM tblttraining where trainingid='".$t."' and trainingnumber='".$q."' ORDER BY trainingnumber";
$result = mysqli_query($conn,$sql);
echo "<Select name=cmbteacher>";
while($row = mysqli_fetch_array($result))
{
      $tid=$row["teacherid"];
      $sql1 = "SELECT * FROM tblteacher where teacherid='$tid'";
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0)
      {
         if($row1 = $result1->fetch_assoc())
         {
         echo "<option value='". $row1["teacherid"]."'>".$row1["tname"]."</option>";
         }
      }
}
echo "</select>";
?>
</table>
</body>
</html>
