<HTML>
<HEAD>
<link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
</HEAD>
<BODY class="bg">
<div align="center">
<table width="100%" border="1" bgcolor="#FFFFFF" cellspacing="0" cellpadding="5">
<tr>
<th align="center">S.No</th>
<th>Name of Teacher</th>
<th align="center">Name of School</th>
<th>Local Government</th>
<th>District</th>
<th>Name of Training</th>
<th>Start Date</th>
<th>End Date</th>
</tr>
<?php
$munvdc="";
$district="";
$sn=1;
       $sql="SELECT * FROM tblttrainingrequest where remark='Request' ORDER BY ID";
    $result1 = mysqli_query($conn,$sql);
    while($row1 = mysqli_fetch_array($result1))
    {
           $tid=$row1["teacherid"];
		  $traid=$row1["trainingid"];
		  $scode=$row1["schoolcode"];
  		  $tname="";
		  $schoolname="";
		  $trainingname="";
		  $sql="SELECT * FROM tblteacher where teachercode='$tid'";
	      $teacher = mysqli_query($conn,$sql);
		  while($row2 = mysqli_fetch_array($teacher))
		    {
			$tname=$row2["tname"];
			$munvdc=$row2["munvdc"];
			$district=$row2["district"];
			}
		$sql="SELECT * FROM tblschool where schoolcode='$scode'";
	      $school = mysqli_query($conn,$sql);
		  while($row3 = mysqli_fetch_array($school))
		    {
			$schoolname=$row3["schoolname"];
			}
		  $sql="SELECT * FROM tbltraining where ID='$traid'";
	      $training = mysqli_query($conn,$sql);
		  while($row4 = mysqli_fetch_array($training))
		    {
			$trainingname=$row4["trainingname"];
			}
          echo "<tr>";
          echo "<td align=center>". $sn . "</td>";
		  
          echo "<td>" . $tname . "</td>";
          echo "<td>" . $schoolname . "</td>";
          echo "<td>" . $munvdc . "</td>";
          echo "<td>" . $district . "</td>";
		  echo "<td>" . $trainingname . "</td>";
		  echo "<td>" . $row1["sdate"] . "</td>";
		  echo "<td>" . $row1["edate"] . "</td>";
          echo "<td bgcolor=blue><a href=../Input/approve_teacher_training_update.php?linkid=". $row1["ID"] ." target=blank>Accept<a></td>";
          echo "</td>";
          echo "</tr>";
    $sn++;
    }

?>
</table>
</BODY>
</HTML>
