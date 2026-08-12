<?php
session_start();
$dname=$_SESSION['district'];
?>
<HTML>
<head>
<link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
<?php
   include("../Processing/db_connection.php");
   include("title.htm");
?>
<BODY>
<table class="maintable">
<tr>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td width="80%" valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130"></td>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
    <td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"><a href="..\admin_login.php">Log Off</a></font></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+3" color="#FFFFFF"><b>Teacher Training Management System(TTMIS)</b></font></td>
<td bgcolor="#0000FF"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<form method="Post" Action="local_gov_teacher.php">
<center>
<font size="+2" color="#990000"><b><u>
<?php echo $dname;?></u></b>
</font>
</center>
<br>
<table width="100%" border="1" class="maintable">
<tr>
<td align="center">S.No</td>
<td align="center">Name of Municipality</td>
<td align="center">Mobile No.</td>
<td>Tick</td>
</tr>
<?php
$i=1;
//$q = intval($_GET['q']); //for numerice value
$sql="SELECT * FROM tbldistrict where districtname='$dname' ORDER BY munvdc";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td align=center>".$i."</td>";
    echo "<td>".$row["munvdc"]."</td>";
    echo "<td align=center>".$row["mobileno"]."</td>";
	echo "<td align=center><input type=checkbox name=rem[] value=". $row["ID"] ."></td>";
    $i++;
    echo "</tr>";
}
?>
<tr>
<td colspan="4" align="center"><input type="submit" value="Display Teacher" name="btndisplay" class="button"> </td>
</tr>
    </table>
</form>
</BODY>
</HTML>
