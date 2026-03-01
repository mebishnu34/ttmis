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
include("Processing/db_palika_connection.php");
if(isset($_GET['t']))
{
$_SESSION['$t']=$_GET['t'];
}
if(isset($_GET['l']))
{
$l = $_GET['l'];
$sql="SELECT DISTINCT subject FROM tbltraining where palikaid='$_SESSION[tid]' and trainingname='".$_SESSION['$t']."' and level='".$l."' ORDER BY subject";
$result = mysqli_query($palikaconn,$sql);
echo "<Select name=cmbsubject>";
echo "<option>None</option>";
while($row = mysqli_fetch_array($result))
      {
      echo "<option>" . $row['subject'] . "</option>";
     }
echo "</select>";
mysqli_close($palikaconn);
}
?>
</body>
</html>
