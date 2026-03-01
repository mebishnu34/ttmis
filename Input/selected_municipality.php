<?php
session_start();
include("../Processing/db_connection.php");
$munid=$_POST['rem'];
$date=$_SESSION['$tdate'];
$select=$_POST['option'];
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
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td width="80%" valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130"></td>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
    <td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"><a href="..\Admin\create.php">Back</a></font></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1" color="#FFFFFF"><b>Teacher Training Management System(TTMIS)</b></font></td>
<td bgcolor="#0000FF"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<?php
if(isset($_POST['btnteacher']))
{
?>

<form method="Post" Action="select_teacher.php">
	<?php
		$n=0;
		foreach($munid as $muns)
			{
			  $munid[$n]=$muns;
			 //echo $dname[$n];
			//echo "</br>";
			  $sqlm="SELECT munvdc FROM tbldistrict where ID='$munid[$n]'";
              $resultm = mysqli_query($conn,$sqlm);
              while($rowm = mysqli_fetch_array($resultm))
                {
                   $mname=$rowm["munvdc"];
                }    
?>
		<br>
		<center><font size="+2" color="#990000"><b><u><?php echo $mname;?></u></b></font></center>
		<br>
	<table width="100%" border="1" class="maintable">
	<tr>
		<td align="center">S.No</td>
		<td align="center">Name of School</td>
		<td align="center">Mobile No.</td>
		<td align="center">Tick</td>
	</tr>
<?php
	$i=1;
//$q = intval($_GET['q']); //for numerice value

	$sql="SELECT schoolcode,schoolname, mobileno FROM tblschool where munvdc='$mname' ORDER BY schoolname";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result))
	{
    	echo "<tr>";
	    echo "<td align=center>".$i."</td>";
    	echo "<td>".$row["schoolname"]."</td>";
	    echo "<td align=center>".$row["mobileno"]."</td>";
		if($select=="All")
			{
		    echo "<td align=center><input type=checkbox name=rem[] value=". $row["schoolcode"] ." checked=true></td>";
		    }
			else
			{
				echo "<td align=center><input type=checkbox name=rem[] value=". $row["schoolcode"] ."></td>";
			}
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
               <td colspan="2" align="center"><input type="submit" value="Select Teacher" name="btnteacher" class="button"></td>
           </tr>
    </table>
</form>
<?php
}

if(isset($_POST['btndisplay']))
{
?>

<form method="Post" Action="../Object/save_message.php">
<table width="100%" border="1" class="maintable">
<tr>
<td align="center">S.No</td>
<td align="center">Name of Municipality</td>
<td align="center">District</td>
<td align="center">Mobile No.</td>
<td align="center">Participate Number</td>
</tr>
<?php
		$i=1;
		foreach($munid as $id)
			{
			$sql="SELECT ID,munvdc,districtname,mobileno FROM tbldistrict where ID='$id'";
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_array($result))
				{
			    echo "<tr>";
			    echo "<td align=center>".$i."</td>";
			    echo "<td>".$row["munvdc"]."<input type=hidden name=mun[] value=". $row["ID"] ."></td>";
				echo "<td>".$row["districtname"]."<input type=hidden name=district[] value=". $row["districtname"] ."></td>";
			    echo "<td align=center>".$row["mobileno"]."<input type=hidden name=mobile[] value=". $row["mobileno"] ."></td>";
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