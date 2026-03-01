<HTML>
<HEAD>
 <TITLE>School Details</TITLE>
 <link rel="stylesheet" href="../CSS/main_table.css">
</HEAD>
<BODY class="bg">
<div align="center">
<table width="100%">
<tr>
<td align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.svg" width="150" height="100"></td>
<td bgcolor="#FFFFFF" align="left"><img src="..\Image\banner.jpg" width="100%" height="150"></td>
</tr>
</table>
<table width="70%" border="1" align="center">
<?php
$sn=1;
include("../Processing/db_connection.php");
$teacherid = $_GET['tid'];
$sql1 = "SELECT * FROM tblschool where ID='$teacherid'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<tr>";
         echo "<td colspan=2 align=center>School Information</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td width=30%>Name of School</td>";
         echo "<td>". $row['schoolname'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>School Code</td>";
         echo "<td>". $row['schoolcode'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Address</td>";
         echo "<td>". $row['address'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>District</td>";
         echo "<td>". $row['district'] . "</td>";
         echo "</tr>";
          echo "<tr>";
         echo "<td>Municipality/Rural</td>";
         echo "<td>". $row['munvdc'] . "</td>";
         echo "</tr>";
          echo "<tr>";
         echo "<td>Ward No.</td>";
         echo "<td>". $row['wardno'] . "</td>";
         echo "</tr>";
          echo "<tr>";
         echo "<td>Contact</td>";
         echo "<td>". $row['contact'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Mobile No.</td>";
         echo "<td>". $row['mobileno'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Email Address</td>";
         echo "<td>". $row['email'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Web Site</td>";
         echo "<td>". $row['website'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Head Teacher</td>";
         echo "<td>". $row['authorizeperson'] . "</td>";
         echo "</tr>";
		 echo "<tr>";
         echo "<td>Login Name</td>";
         echo "<td>". $row['loginname'] . "</td>";
         echo "</tr>";
		 echo "<tr>";
         echo "<td>Password</td>";
         echo "<td>". $row['spass'] . "</td>";
         echo "</tr>";
          }
   }
?>
</table>
</div>
</BODY>
</HTML>
