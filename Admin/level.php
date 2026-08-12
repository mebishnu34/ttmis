<?php
session_start();
if($_SESSION['token']<>"Run")
{
header('Location: ../admin_login.php?msg= "Please Login"');
}
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
echo $q;
//$q = intval($_GET['q']); //for numerice value
$sql="SELECT * FROM tbltraining where trainingname='".$q."'";
$result = mysqli_query($conn,$sql);
echo "<Select name=cmblevel onchange=level1(this.value)>";
while($row = mysqli_fetch_array($result))
      {
      echo "<option>" . $row['level'] . "</option>";
     }
echo "</select>";
mysqli_close($conn);
?>
</body>
</html>
