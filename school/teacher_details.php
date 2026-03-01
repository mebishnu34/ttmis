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
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="..\Image\logo.svg" width="150" height="100"></td>
<td bgcolor="#FFFFFF" align="left" class="tdradius"><center><img src="..\Image\banner.jpg" width="800" height="150"></center></td>
</tr>
<tr>
<td bgcolor="#0852FA" align="Right"></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
 </table>
 <table width="80%" class="subtable">
     <tr>
         <td align="center" colspan="2"><font size="+2"><b>Teacher Details</b></font></td>
         
     </tr>
<?php
$sn=1;
include("../Processing/db_connection.php");
if($_GET['tlinkid'])
{
$teacherid=$_GET['tlinkid'];
$sql1 = "SELECT * FROM tblteacher where teacherid='$teacherid'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<tr>";
         echo "<td>Teacher ID</td>";
         echo "<td width=80%>". $row['teacherid'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Name of Teacher</td>";
         echo "<td>". $row['tname'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Gender</td>";
         echo "<td>". $row['gender'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Date of Birth</td>";
         echo "<td>". $row['dob'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Address</td>";
         echo "<td>". $row['address'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Email Address</td>";
         echo "<td>". $row['email'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>District</td>";
         echo "<td>". $row['district'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Municipality/VDC</td>";
         echo "<td>". $row['munvdc'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Ward No.</td>";
         echo "<td>". $row['wardno'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Contact No.</td>";
         echo "<td>". $row['tcontact'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Appointment Date</td>";
         echo "<td>". $row['appointdate'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Appointment Type</td>";
         echo "<td>". $row['appointtype'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Level</td>";
         echo "<td>". $row['workinglevel'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Name of School</td>";
         echo "<td>". $row['schoolcode'] . "</td>";
         echo "</tr>";
         

         }
   }
}

else
{
echo "You are not registered as teacher.";
}
?>
</table>
</BODY>
</HTML>
