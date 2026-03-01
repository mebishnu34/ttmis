<?php
session_start();
include("../Processing/db_connection.php");
$schoolname=$_POST['cmbschool'];
$sql1 = "SELECT * FROM tblschool where schoolname='$schoolname'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc()) 
		{
		$scode=$row["ID"];
	}
	}
$sql = "SELECT * FROM tblschooldocument where schoolcode='$scode'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
   <title>TTMIS</title>
   <link rel="stylesheet" href="../CSS/main_table.css">
  <link rel="stylesheet" href="../CSS/sidemenu.css">

</head>
<BODY class="bg">
<div align="center">
<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="..\Image\logo.svg" width="200" height="180"></td>
<td align="left" bgcolor="#FFFFFF" class="tdradius"><center><img src="..\Image\banner.jpg" width="90%" height="180"></center></td>
</tr>
<tr>
<td colspan="0" bgcolor="#0852FA" align="Right"><a href="../Admin/report.php">Home</a></td>
<td colspan="0" bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><?php echo $_SESSION['uname'];?></font></td>

</tr>
</table>

<table width="100%">
<tr>
    <th>S.No.</th>
    <th>Document Name</th>
   <th width="60%">&nbsp;</th>
</tr>
 <?php
  if ($result->num_rows > 0)
      {
      $sn=1;
      while($row = $result->fetch_assoc())
         {
      ?>
    <tr>
      <td align="center"><?php echo $sn; ?></td>
      <td align="left"><?php echo $row['docname']; ?></td>
      <td align="Left"><a href="../Display/download.php?school_id=<?php echo $row['ID']; ?>" target=_blank>Download</a></td>
    </tr>
  <?php
       $sn=$sn+1;
       }
  }
  ?>
</table>
 </body>
</html>

