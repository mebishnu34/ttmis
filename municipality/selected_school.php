<?php
session_start();
include("../Processing/db_connection.php");
$schoolcode=$_POST['rem'];
$date=$_SESSION['$tdate'];
?>
<HTML>
<head>
	<link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
<?php
      include("../title.htm");
?>
<BODY>
<table class="maintable">
	 <tr>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="../Input/../Image/logo.jpg" width="150" height="130"></td>
<td width="80%" valign="top" bgcolor="#FFFFFF"><img src="../Input/../Image/banner.jpg" height="130"></td>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="../Input/../Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
    <td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"><a href="school.php">Back</a></font></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1" color="#FFFFFF"><b>Teacher Training Management System(TTMIS)</b></font></td>
<td bgcolor="#0000FF"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<?php
if(isset($_POST['btndisplay']))
{
?>

<form method="Post" Action="../Object/save_message_to_school.php">
<table width="100%" border="1" class="maintable" cellspacing="1">
<tr>
<td align="center">S.No</td>
<td align="center">Name of School</td>
<td align="center">Authorize Person</td>
<td align="center">Mobile No.</td>
<td align="center">Address</td>
<td align="center">Participate Number</td>
</tr>
<?php
		$i=1;
		foreach($schoolcode as $scode)
			{
			$sql="SELECT ID,schoolname,authorizeperson,mobileno,address FROM tblschool where schoolcode='$scode'";
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_array($result))
				{
			    echo "<tr>";
			    echo "<td align=center>".$i."</td>";
			    echo "<td>".$row["schoolname"]."<input type=hidden name=scodes[] value=". $scode ."></td>";
				echo "<td>".$row["authorizeperson"]."<input type=hidden name=schoolhead[] value=". $row["authorizeperson"] ."></td>";
			    echo "<td align=center>".$row["mobileno"]."<input type=hidden name=mobile[] value=". $row["mobileno"] ."></td>";
				echo "<td>".$row["address"]."<input type=hidden name=school[] value=". $row["address"] ."></td>";
				echo "<td align=center><input type=Text name=pnum[] size=5 value=". $_SESSION['pn'] ."></td>";
		      	$i++;
    			echo "</tr>";
				}
			}

?>
<tr>
<td colspan="5" align="center">
<input type="Submit" value="Save" class="button" name="btnsave">
</td>
</tr>
</table>
<?php
}
mysqli_close($conn);
?>
</body>
</html>