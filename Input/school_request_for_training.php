<?php
session_start();
//echo $_SESSION['training'];
//echo $_SESSION['level'];
//echo $_SESSION['subject'];
//echo $_SESSION['sdate'];
//echo $_SESSION['edate'];
//echo $_SESSION['remark'];
include("../Processing/db_connection.php");
$scode = $_POST['txtcode'];
$trainingid=$_SESSION['trainingid'];
?>

<!DOCTYPE html>
<html>
<head>
<title>TTMIS</title>
<link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
</head>
<body>
<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="..\Image\logo.svg" width="200" height="180"></td>
<td align="left" bgcolor="#FFFFFF" class="tdradius"><center><img src="..\Image\banner.jpg" width="90%" height="180"></center></td>
</tr>
<tr>
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><a href="..\Input\school_code.php">Back</a></font></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<form method="Post" Action="../Object/Save_new_training.php">
 <table width="100%">
 <tr>
 <td>School Code</td>
 <td colspan="4"><input type="Text" name="txtscode" value="<?php echo $scode; ?>" readonly="true" size="20"></td>

 </tr>
<tr>
<td>S.No</td>
<td>Teacher ID</td>
<td>Name of Teacher</td>
<td>Contact</td>
<td>Tick</td>
</tr>
<?php
$i=1;
//$q = intval($_GET['q']); //for numerice value
$sql="SELECT * FROM tbltrainingrequest where schoolcode='$scode' and trainingid='$trainingid'";
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
         $contact=$row1["tcontact"];


  ?>

 <tr>
<td align="center"><?php echo $i; ?><input type="hidden" name="id" value="<?php echo $i; ?>" readonly="true" size="5"></td>
<td align="center"><?php echo $teacherid;?><input size="10" readonly="True" type="hidden" name="tid1[]" value="<?php echo $teacherid;?>"></td>
<td><?php echo $tname;?><input type="hidden" name="tname1[]" value="<?php echo $tname;?>" readonly="True"></td>
<td><?php echo $contact;?><input type="hidden" name="tcon[]" value="<?php echo $contact;?>" readonly="True"></td>
<td><input type="checkbox" name="rem[]" value="<?php echo $teacherid;?>"></td>
<?php
  	echo "</tr>";
  	}
  	}
  	$i++;
}
mysqli_close($conn);
?>
<tr>
<td colspan="5" align="center"><input type="Submit" value="Save" class="button"></td>
</tr>
</table>
</form>
</body>
</html>
