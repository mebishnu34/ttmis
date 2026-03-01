<?php
session_start();
include("../Processing/db_connection.php");
if(isset($_GET['tid']))
{
 $_SESSION['trainingid']=$_GET['tid'];

$sql = "SELECT id, trainingname, level, subject, startdate, enddate,venue,coordinator from tblruntraining where id='$_SESSION[trainingid]'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    if($row = $result->fetch_assoc())
    {
      $_SESSION['training']=$row["trainingname"];
      $_SESSION['level']=$row["level"];
      $_SESSION['subs']=$row["subject"];
      $_SESSION['sdate']=$row["startdate"];
      $_SESSION['edate']=$row["enddate"];
      $_SESSION['venu']=$row["venue"];
      $_SESSION['facilator']=$row["coordinator"];
    }
   }

}
?>
<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
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
<td bgcolor="#0852FA" align="Right"></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<form action="../Object/Save_Mark.php" method="Post">
<table width="100%">
<tr>
<th colspan="2">Training Step:<select name="cmbstep" required>
         <option value="" disabled selected>Select Step</option>
         <option>पहिलो</option>
         <option>दोस्रो</option>
         <option>तेस्रो</option>
</select>
</th>
<th colspan="2">Name of Training:<?php echo $_SESSION['training'];?></th>
<th>Subject:<?php echo $_SESSION['subs'];?></th>
<th>Level:<?php echo $_SESSION['level'];?></th>
<th>Start Date:<?php echo $_SESSION['sdate'];?></th>
<th>End Date:<?php echo $_SESSION['edate'];?></th>
</tr>
<tr>
<th>S.No</th>
<th>Teacher ID</th>
<th>Name of Teacher</th>
<th>Contact</th>
<th>Attendance</th>
<th>Creative</th>
<th>Written</th>
<th>Planning</th>
</tr>
<?php
$sn=1;
$regu='';
$creative='';
$written='';
$planning='';
$sql1 = "SELECT teacherid FROM tblttraining where runid='$_SESSION[trainingid]' ORDER BY teacherid";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    $teacherid=$row["teacherid"];
      $sql1 = "SELECT tname,tcontact FROM tblteacher where teachercode='$teacherid'";
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0)
      {
         if($row1 = $result1->fetch_assoc())
         {
          echo "<tr>";
          echo "<td align=center>". $sn . "</td>";
          echo "<td align=center>";
          echo $teacherid;
          ?>
          <input type="hidden" name="txtcode[]" value="<?php echo $teacherid;?>">
          </td>
          <?php
          echo "<td>";
          echo $row1["tname"];
          ?>
          <input type="hidden" name="txtname[]" value="<?php echo $row1["tname"];?>">
          </td>
          <?php
          echo "<td align=center>" . $row1["tcontact"] . "</td>";
           echo "<td align=center><input type=text size=5 name=txtregu[] value=". $regu ."></td>";
           echo "<td align=center><input type=text size=5 name=txtcreative[] value=". $creative. " ></td>";
           echo "<td align=center><input type=text size=5 name=txtwritten[] value=". $written. " ></td>";
           echo "<td align=center><input type=text size=5 name=txtplanning[] value=". $planning. "></td>";
           //echo "<td><a href=mark_entry.php?tid=$teacherid>Mark Entry</a></td>";
           echo "</tr>";
            $sn++;
           }
      }
    }
   }
echo "</table>";
echo "<center>";
if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
    
 echo "</center>";
 ?>
 <center><input type="submit" value="Save" name="btnsave"></center>
 </form>
</BODY>
</HTML>
