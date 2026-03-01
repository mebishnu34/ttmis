<?php
session_start();
$coordinator=$_POST['txtcoordinator'];
$cmobileno=$_POST['txtmobile'];
$remark=$_POST['txtremark'];
$munid=$_POST['rem'];
$time=$_POST['txttime'];
$date=$_SESSION['$tdate'];
$school=$_POST['rem'];
//$pn1=$_SESSION['pn'];
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
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="..\Image\logo.svg" width="200" height="180"></td>
<td align="left" bgcolor="#FFFFFF" class="tdradius"><center><img src="..\Image\banner.jpg" width="90%" height="180"></center></td>
</tr>
<tr>
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><a href="../Admin/create.php">Back</a></font></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<form method="Post" Action="../Object/save_message_to_teacher.php">
<?php
$n=0;
foreach($school as $schools)
{
  $schoolcode[$n]=$schools;
    //echo $dname[$n];
	//echo "</br>";
	$sqlm="SELECT schoolname FROM tblschool where schoolcode='$schoolcode[$n]'";
                $resultm = mysqli_query($conn,$sqlm);
                while($rowm = mysqli_fetch_array($resultm))
                {
                   $school=$rowm["schoolname"];
                }    
    
?>
<br>
<center>
<font size="+2" color="#990000"><b><u>
<?php echo $school;?></u></b>
</font>
</center>
<br>
<table width="100%" border="1" class="maintable">
<tr>
<td align="center">S.No</td>
<td align="center">Name of Teacher</td>
<td align="center">Mobile No.</td>
<td align="center">Group Number</td>
<td align="center">Tick</td>

</tr>
<?php
$i=1;
//$q = intval($_GET['q']); //for numerice value
$sql="SELECT teachercode, tname, tcontact FROM tblteacher where scode='$schoolcode[$n]' ORDER BY tname";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td align=center>".$i."</td>";
    echo "<td>".$row["tname"]."</td>";
    echo "<td align=center>".$row["tcontact"]."</td>";
	echo "<td align=center><input type=text name=group[] size=5 value=1></td>";
	echo "<td align=center><input type=checkbox name=rem[] value=". $row["teachercode"] ."></td>";
	$i++;
    echo "</tr>";
}
?>
</table>
<?php
$n=$n+1;
}
?>
    <table class="maintable">
    <tr>
               <td align="right">Training Coordinator*</td>
               <td><input type="text" name="txtcoordinator" size="60" value="<?php echo $coordinator?>" readonly="True"></td>
           </tr>
    <tr>
               <td align="right">Mobile No.*</td>
               <td><input type="text" name="txtmobile" value="<?php echo $cmobileno?>" readonly="True"></td>
           </tr>
           <tr>
               <td align="right">Remark</td>
               <td><input type="text" name="txtremark" size="60" value="<?php echo $remark?>" readonly="True"></td>
           </tr>
           <tr>
               <td align="right">Training Time</td>
               <td><input type="text" name="txttime" size="60" value="<?php echo $time?>" readonly="True"></td>
           </tr>
		    <tr>
               <td align="right">SMS</td>
               <td><Select name="optsms">
<option selected>NOSMS</option>
<option>YESSMS</option>
</select></td>
           </tr>
           <tr>
               <td colspan="2" align="center"><input type="submit" value="Send" name="btnteacher" class="button"></td>
           </tr>
    </table>
</form>
</BODY>
</HTML>
