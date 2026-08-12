<?php
session_start();
?>
<HTML>
<HEAD>
 <TITLE>TTIMS</TITLE>
 <link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
</HEAD>
<BODY class="bg">
<div align="center">
<table width="95%" border="1" class="maintable">
<tr>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td  valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130"></td>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr
<tr>
<td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1" color="#FFFFFF"><b>Teacher Training Management System(TTMIS)</b></font></td>
<td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"><?php echo $_SESSION['uname'];?></font></td>
</tr>
 </table>
 <table width="95%" border="1" bgcolor="#FFFFFF" cellspacing="0" cellpadding="5">
 <tr>
 <th>S.No</th>
  <th>Name of Teacher</th>
  <th>Gender</th>
  <th>Address</th>
  <th>Contact</th>
  <th>Email</th>
  <th>Appointment Date</th>
  <th>Appointment Type</th>
  </tr>
<?php
$sn=1;
include("../Processing/db_connection.php");
if($_GET['tlinkid'])
{
$scode=$_GET['tlinkid'];
$sql1 = "SELECT * FROM tblteacher where scode='$scode' and (remark='Working' OR remark='Approved')";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<tr>";
         echo "<td>".$sn."</td>";
         echo "<td>". $row['tname'] . "</td>";
         echo "<td>". $row['gender']."</td>";
         echo "<td>". $row['address'] . "</td>";
         echo "<td>". $row['tcontact'] . "</td>";
         echo "<td>". $row['email'] . "</td>";
         echo "<td>". $row['appointdate'] . "</td>";
         echo "<td>". $row['appointtype'] . "</td>";
		 ?>
		 <td bgcolor="#0000FF"><a href="teacher_update.php?tlinkid=<?php echo $row['teacherid'];?>" target="blank">Edit</a></td>
		 <?php
         echo "</tr>";
         $sn++;
         }
      }
}
?>
</table>
</BODY>
</HTML>
