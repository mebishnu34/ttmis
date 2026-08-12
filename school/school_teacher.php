<?php
session_start();
//echo $_SESSION['training'];
//echo $_SESSION['level'];
//echo $_SESSION['subject'];
//echo $_SESSION['sdate'];
//echo $_SESSION['edate'];
//echo $_SESSION['remark'];
?>
<!DOCTYPE html>
<html>
<head>
<title>EDUTC</title>
</head>
<body>
<form method="Post" Action="../Object/Save_new_training.php">
 <table width="80%">
<tr>
<td>S.No</td>
<td>Teacher ID</td>
<td>Name of Teacher</td>
<td>Contact</td>
<td>Tick</td>
</tr>
<?php
include("../Processing/db_connection.php");
$scode = $_POST['txtcode'];
$i=1;
//$q = intval($_GET['q']); //for numerice value
$sql="SELECT * FROM tblteacher where schoolcode='$scode' ORDER BY tname";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
{
      $teacherid=$row["teacherid"];
      $tname=$row["tname"];
      $contact=$row["tcontact"];

  ?>

 <tr>
<td align="center"><?php echo $i; ?><input type="hidden" name="id" value="<?php echo $i; ?>" readonly="true" size="5"></td>
<td align="center"><?php echo $teacherid;?><input size="10" readonly="True" type="hidden" name="tid1[]" value="<?php echo $teacherid;?>"></td>
<td><?php echo $tname;?><input type="hidden" name="tname1[]" value="<?php echo $tname;?>" readonly="True"></td>
<td><?php echo $contact;?><input type="hidden" name="tcon[]" value="<?php echo $contact;?>" readonly="True"></td>
<td><input type="checkbox" name="rem[]" value="<?php echo $teacherid;?>"></td>
<?php
  	echo "</tr>";
  	$i++;
}
mysqli_close($conn);
?>
<tr>
<td colspan="5" align="center"><input type="Submit" value="Save"></td>
</tr>
</table>
</form>
</body>
</html>
