<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>EDUTC</title>
</head>
<body>
 <table width="100%">
<tr>
<td>S.No</td>
<td>Teacher ID</td>
<td>Name of Teacher</td>
<td>Remark</td>
</tr>
<?php
include("../Processing/db_connection.php");
$q = $_SESSION['tid'];
$t = $_GET['t'];
$i=1;
//$q = intval($_GET['q']); //for numerice value
$sql="SELECT * FROM tblttraining where trainingid='".$q."' and trainingnumber='".$t."' ORDER BY trainingnumber";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
{
      $teacherid=$row["teacherid"];
      $sql1 = "SELECT * FROM tblteacher where teacherid='$teacherid'";
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0)
      {
         if($row1 = $result1->fetch_assoc())
         {
         $tname=$row1["tname"];
         }
      }
  ?>

 <tr>
<td align="center"><?php echo $i; ?><input type="hidden" name="id" value="<?php echo $i; ?>" readonly="true" size="5"></td>
<td align="center"><?php echo $teacherid;?><input size="10" readonly="True" type="hidden" name="tid1[]" value="<?php echo $teacherid;?>"></td>
<td><?php echo $tname;?><input type="hidden" name="tname1[]" value="<?php echo $tname;?>" readonly="True"></td>
<td>
<input type="checkbox" name="rem[]" value="P">P <input type="checkbox" name="rem[]" value="A">A <input type="checkbox" name="rem[]" value="L">L
</td>
<?php
  	echo "</tr>";
  	$i++;
}
mysqli_close($conn);
?>
</table>
</body>
</html>
