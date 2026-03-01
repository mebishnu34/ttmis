<?php
session_start();
$district=$_POST['cmbdistrict'];
?>
<HTML>
<head>
<link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
<?php
   include("../Processing/db_connection.php");
   include("../title.htm");
?>
<BODY>
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
<table width="100%" class="dtable">
<tr>
<td align="center">S.No</td>
<td>Name of Municipality</td>
<td align="center">Mobile No.</td>
<td>Login Name</td>
<td>Password</td>
</tr>
<?php
$i=1;
//$q = intval($_GET['q']); //for numerice value
$sql="SELECT * FROM tbldistrict where districtname='$district' ORDER BY munvdc";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td align=center>".$i."</td>";
    echo "<td>".$row["munvdc"]."</td>";
    echo "<td align=center>".$row["mobileno"]."</td>";
    echo "<td align=center>".$row["mobileno"]."</td>";
    echo "<td align=center>".$row["mpass"]."</td>";
    
      $i++;
    echo "</tr>";
}
?>
</table>
</BODY>
</HTML>
