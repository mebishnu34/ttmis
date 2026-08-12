<?php
session_start();
//$_SESSION['pn']=$_POST['txtnumber'];
if(isset($_POST['btnselect']))
{
	$trainingid=$_POST['tids'];
	$_SESSION['trainingid']=$_POST['tids'];
	$n=0;
	foreach($trainingid as $trainingids)
	{
	$training[$n]=$trainingids;
	$n=$n+1;
	$_SESSION['n1']=$n;
	}
	$_SESSION['pn']=$_POST['txtnumber'];
	$_SESSION['sopt']=$_POST['option'];
}
include("../Processing/db_connection.php");
?>
<HTML>
<head>
<link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
<BODY>
<table class="maintable">
<tr>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td  valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130"></td>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr
><tr>
<td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"><a href="../municipality_application.php">Back</a></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1" color="#FFFFFF"><b>Teacher Training Management System(TTMIS)</b></font></td>
<td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"><?php echo $_SESSION['uname'];?></font></td>
</tr>
</table>
<form method="Post" Action="selected_school.php">
<?php 
for($j=0;$j<$_SESSION['n1'];$j++)
{
?>
<input type="hidden" name="txtid" value="<?php echo $training[$j];?>">
<table width="90%" border="1" cellspacing="0" bgcolor="#FFFFFF" align="center">
<tr>
<td align="center"><b>S.No</b></td>
<td align="center"><b>Name of School</b></td>
<td align="center"><b>School Code</b></td>
<td align="center"><b>Mobile No.</b></td>
<td align="center"><b>Tick</b></td>
</tr>
<?php
$i=1;
//$q = intval($_GET['q']); //for numerice value
$sql="SELECT * FROM tblschool where munvdc='$_SESSION[uname]' and (remark='Running' or remark='Registered') ORDER BY schoolname";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td align=center>".$i."</td>";
    echo "<td>".$row["schoolname"]."</td>";
    echo "<td align=center>".$row["schoolcode"]."</td>";
	echo "<td align=center>".$row["mobileno"]."<input type=hidden name=contact[] value=". $row["mobileno"] ."></td>";
	if($_SESSION['sopt']=="All")
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
<tr>
               <td colspan="5" align="center"><input type="submit" value="Send Message" name="btndisplay" class="button"></td>
           </tr>
    
</table>
 <?php
 }
 ?>
            
</form>
</BODY>
</HTML>
