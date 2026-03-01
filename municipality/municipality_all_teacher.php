<HTML>
<HEAD>
 <TITLE>TTIMS</TITLE>
 <link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
</HEAD>
<BODY class="bg">
<div align="center">
<div align="center" style="background-color:#0000FF"><a href="export/export_palika_teacher.php" target="_blank">Export In Excel</a></div>
 <table width="95%" class="subtable">
 <tr>
 <th>S.No</th>
  <th>Name of Teacher</th>
  <th>Gender</th>
  <th>Name of School</th>
  <th>Address</th>
  <th>Contact</th>
  <th>Email</th>
  </tr>
<?php
$sn=1;
$sql1 = "SELECT * FROM tblteacher where munvdc='$_SESSION[uname]' and (remark='Working' OR remark='Approved')";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
              $sqls = "SELECT schoolname FROM tblschool where schoolcode='$row[scode]'";
	$results = $conn->query($sqls);
		if($results->num_rows > 0)
   		{
    	if($sdata = $results->fetch_assoc())
    	   {
    	       $schoolname=$sdata["schoolname"];
    	   }
   		}
         echo "<tr>";
         echo "<td>".$sn."</td>";
         echo "<td>". $row['tname'] . "</td>";
         echo "<td>". $row['gender']."</td>";
         echo "<td>". $schoolname."</td>";
         echo "<td>". $row['address'] . "</td>";
         echo "<td>". $row['tcontact'] . "</td>";
         echo "<td>". $row['email'] . "</td>";
         echo "</tr>";
         $sn++;
         }
      }

?>
</table>
</BODY>
</HTML>
