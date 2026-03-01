<?php
session_start();
if(isset($_POST['btndisplay']))
{
$_SESSION['district']=$_POST['d1'];
$_SESSION['select']=$_POST['option'];
}
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
<form method="Post" action="selected_municipality.php">
<?php
$n=0;
foreach($_SESSION['district'] as $districts)
{
  $dname[$n]=$districts;
    //echo $dname[$n];
	//echo "</br>";
    
?>
<br>
<center>
<font size="+2" color="#990000"><b><u>
<?php echo $dname[$n];?></u></b>
</font>
</center>
<br>
<table width="80%" border="1" class="maintable">
<tr>
<td align="center">S.No</td>
<td align="center">Name of Municipality</td>
<td align="center">Mobile No.</td>
<td>Tick</td>
</tr>
<?php
$i=1;
//$q = intval($_GET['q']); //for numerice value
$sql="SELECT * FROM tbldistrict where districtname='$dname[$n]' ORDER BY munvdc";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td align=center>".$i."</td>";
    echo "<td>".$row["munvdc"]."</td>";
    echo "<td align=center>".$row["mobileno"]."</td>";
	if($_SESSION['select']=="All")
	{
    echo "<td align=center><input type=checkbox name=rem[] value=". $row["ID"] ." checked=true></td>";
    }
	else
	{
	echo "<td align=center><input type=checkbox name=rem[] value=". $row["ID"] ."></td>";
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
               <td colspan="2" align="center"><input type="submit" value="Send Message" name="btndisplay" class="button">&nbsp;&nbsp;&nbsp;<input type="submit" value="School" name="btnteacher" class="button">
			   &nbsp;&nbsp;&nbsp;<select name="option"><option>Select</option><option>All</option></select>
			   </td>
           </tr>
    </table>
</form>
</BODY>
</HTML>
