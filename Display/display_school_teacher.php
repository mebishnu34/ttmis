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
	<link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
</head>
<body>
<table class="maintable">
<tr>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td  valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" width="800" height="130"></td>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
    <td bgcolor="#0000FF" align="Right"><font color="#FFFFFF">&nbsp;</font></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1" color="#FFFFFF"><b>Teacher Training Management Information System(TTMIS)</b></font></td>
<td bgcolor="#0000FF"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr
</table>
<form>
<div align="right">
		<input type="Button" name="btnprint" value="Print" onClick="javascript:CallPrint('pdata');">
        </div>
</form>
<div id="pdata">
 <table width="100%" class="table_design">
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
<td></td>
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
         echo "<td bgcolor=blue><a href=../Input/teacher_short_info_update.php?tid=$row[ID] target=_blank>Edit</a></td>";
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
         echo "<td bgcolor=blue><a href=../Input/teacher_short_info_update.php?tid=$row[teacherid] target=_blank>Edit</a></td>";
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
