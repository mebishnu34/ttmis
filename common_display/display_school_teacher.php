<?php
session_start();
//echo $_SESSION['training'];
//echo $_SESSION['level'];
//echo $_SESSION['subject'];
//echo $_SESSION['sdate'];
//echo $_SESSION['edate'];
//echo $_SESSION['remark'];
include("../Processing/db_connection.php");
include("../print_function.php");
$schoolname=$_POST['cmbschool'];
$district=$_POST['cmbdistrict1'];
$mun=$_POST['cmbmv1'];
$sql1 = "SELECT * FROM tblschool where schoolname='$schoolname'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc()) 
		{
		$scode=$row["schoolcode"];
	}
	}
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
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><a href="../common_report.php">Back</a></font></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<form>
<div align="right">
		<input type="Button" name="btnprint" value="Print" onClick="javascript:CallPrint('pdata');">
        </div>
</form>
<div id="pdata">
 <table width="100%" border="1">
 <tr>
 <td colspan="9" align="center"><font size="+2"><b>District:<?php echo $district;?> &nbsp;&nbsp;&nbsp; Local Government:<?php echo $mun;?> &nbsp;&nbsp;&nbsp; Name of School:<?php echo $schoolname;?> </b></font></td>
 </tr>
<tr>
<td>S.No</td>
<td>Teacher Code</td>
<td>School Code</td>
<td>Name of Teacher</td>
<td>Gender</td>
<td>DOB</td>
<td>Login Name</td>
<td>Password </td>
<td>Contact</td>
</tr>
<?php
$i=1;
$ln="";
$pass="";
//echo $scode;
if($schoolname=="All")
{
      $sql1 = "SELECT * FROM tblteacher where munvdc='$mun'";
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0)
      {
         while($row = $result1->fetch_assoc())
         {
         echo "<td>" . $i ."</td>";
         echo "<td align=center>".$row["teachercode"]."</td>";
         echo "<td align=center>".$row["scode"]."</td>";
         echo "<td>". $row["tname"]."</td>";
         echo "<td>".$row["gender"]."</td>";
         echo "<td>".$row["dob"]."</td>";
         echo "<td>".$row["loginname"]."</td>";
         echo "<td>".$row["tpass"]."</td>";
         echo "<td>".$row["tcontact"]."</td>";
        echo "</tr>";
         $i++;
         }
      }
mysqli_close($conn);
}
else
{
     $sql1 = "SELECT * FROM tblteacher where scode='$scode'";
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0)
      {
         while($row = $result1->fetch_assoc())
         {
         echo "<td>" . $i ."</td>";
         echo "<td align=center>".$row["teachercode"]."</td>";
         echo "<td align=center>".$row["scode"]."</td>";
         echo "<td>". $row["tname"]."</td>";
         echo "<td>".$row["gender"]."</td>";
         echo "<td>".$row["dob"]."</td>";
         echo "<td>".$row["loginname"]."</td>";
         echo "<td>".$row["tpass"]."</td>";
         echo "<td>".$row["tcontact"]."</td>";
        echo "</tr>";
         $i++;
         }
      }
	mysqli_close($conn);
}
?>
</table>
</div>

</body>
</html>
