<?php
session_start();
$district=$_POST['cmbdistrict'];
?>
<HTML>
<head>
<link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
    <link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
<?php
   include("../Processing/db_connection.php");
   include("../title.htm");
?>
<BODY>
<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="..\Image\logo.jpg" width="150" height="150"></td>
<td align="left" bgcolor="#FFFFFF" class="tdradius" colspan="center"><img src="..\Image\banner.jpg" height="150"></td>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><a href="../Admin/report.php">Back</a></font></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+2" color="#FFFFFF"><b>Teacher Training Management System(TTMIS)</b></font></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<table width="80%" class="table_design" align="center">
    <tr>
        <td colspan="7" align="center"><font size="+2"><?php echo $district;?></font></td>
        
    </tr>
<tr>
<td align="center"><b>S.No</b></td>
<td align="center"><b>Local Government</b></td>
<td align="center"><b>Authorize Person</b></td>
<td align="center"><b>Mobile No.</b></td>
<td align="center"><b>Login Name</b></td>
<td align="center"><b>Password</b></td>
<td></td>
</tr>
<?php
$i=1;
//$q = intval($_GET['q']); //for numerice value
$sql="SELECT * FROM tbldistrict where districtname='$district' ORDER BY munvdc";
//$sql="SELECT * FROM tbldistrict ORDER BY munvdc";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td align=center>".$i."</td>";
    echo "<td>".$row["munvdc"]."</td>";
	echo "<td>".$row["aperson"]."</td>";
    echo "<td align=center>".$row["mobileno"]."</td>";
    echo "<td align=center>".$row["mobileno"]."</td>";
    echo "<td align=center>".$row["mpass"]."</td>";
    echo "<td bgcolor=Blue><a href=../Input/update_localgovernment.php?tid=$row[ID] target=_blank>Edit</a></td>";
      $i++;
    echo "</tr>";
}
?>
</table>
</BODY>
</HTML>
