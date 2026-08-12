<?php
//include("object_include.php");
session_start();
include("../Processing/db_connection.php");
if(isset($_GET['tid']))
{
 $id=$_GET['tid'];
 $_SESSION['trainingid']=$id;
}
$sql1 = "SELECT * FROM tblmarkdetails where trainingid='$id'";
$result = $conn->query($sql1);
?>
<HTML>
<HEAD>
 <TITLE>TTMIS:Mark Ledger</TITLE>
 <link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
</HEAD>
<BODY>
<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="..\Image\logo.svg" width="200" height="180"></td>
<td align="left" bgcolor="#FFFFFF" class="tdradius"><center><img src="..\Image\banner.jpg" width="90%" height="180"></center></td>
</tr>
<tr>
<td bgcolor="#0852FA" align="Right"></font></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
           <table width="100%" border="1">
           <tr>
           <th>S.No</th>
           <th>Name of Teacher</th>
           <th>Name of School</th>
           <th>Municipality/Rural</th>
           <th>Address of School</th>
           <th>Appoint Date</th>
           <th>Appoint Type</th>
           <th>Working Level</th>
           <th>Mark on Present</th>
           <th>Mark on Discipline</th>
           <th>Mark on Activeness</th>
           <th>Mark on Objective</th>
           <th>Mark on Subjective</th>
           <th>Mark on Reporting</th>
           <th>Total</th>
           <th>Percentage</th>
           <th>Remark</th>
           </tr>
           <?php
           $sn=1;
           if($result->num_rows > 0)
              {
               while($row = $result->fetch_assoc())
               {

               $tid=$row["teacherid"];
                $sql="SELECT * FROM tblteacher where teacherid='$tid'";
                $result1 = mysqli_query($conn,$sql);
                if($row1 = mysqli_fetch_array($result1))
                  {
                  echo "<tr>";
                  echo "<td align=center>". $sn++ . "</td>";
                  echo "<td align=center>". $row1['tname'] . "</td>";
                  echo "<td align=center>". $row1['schoolcode'] . "</td>";
                  echo "<td align=center>". $row1['munvdc'] . "</td>";
                  echo "<td align=center>". $row1['address'] . "</td>";
                  echo "<td align=center>". $row1['appointdate'] . "</td>";
                  echo "<td align=center>". $row1['appointtype'] . "</td>";
                  echo "<td align=center>". $row1['workinglevel'] . "</td>";
                  echo "<td align=center>". $row['present'] . "</td>";
                  echo "<td align=center>". $row['dicipline'] . "</td>";
                  echo "<td align=center>". $row['activeness'] . "</td>";
                  echo "<td align=center>". $row['objective'] . "</td>";
                  echo "<td align=center>". $row['subjective'] . "</td>";
                  echo "<td align=center>". $row['reporting'] . "</td>";
                  echo "</tr>";
                  }
                  }
                  }
                  
           ?>
              </table>
              <form name="export" action="../export/export_mark_ledger.php" method="post">
				<input type="submit" value="Export In Excel" name="markledger">
</form>
           </BODY>
</HTML>
