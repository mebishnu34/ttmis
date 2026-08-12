<?php
session_start();
include("../Processing/db_connection.php");
$district=$_POST['cmbdistrict'];
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
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><a href="..\Admin\create.php">Back</a></font></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<form method="Post" Action="../Object/save_run_training.php">
 <table width="100%">
 <tr>
  <td colspan="4">Name of District: <input type="Text" name="txtdistrict" value="<?php echo $district; ?>" readonly="true" size="20"></td>

 </tr>
<tr>
<td align="center">S.No</td>
<td>Name of Municipality</td>
<td align="center">Mobile No.</td>
<td>Tick</td>
</tr>
<?php
$i=1;
//$q = intval($_GET['q']); //for numerice value
$sql="SELECT * FROM tbldistrict where districtname='$district' ORDER BY munvdc";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td align=center>".$i."</td>";
    echo "<td><input type=hidden name=mun[] value=". $row["munvdc"]. ">".$row["munvdc"]."</td>";
    echo "<td align=center><input type=hidden name=mobile[] value=". $row["mobileno"]. ">".$row["mobileno"]."</td>";
    echo "<td align=center><input type=checkbox name=rem[] value=". $row["ID"] ."></td>";
    
      $i++;
    echo "</tr>";
}
?>
<tr>
<td colspan="5" align="center"><input type="Submit" value="Save" class="button"></td>
</tr>
</table>
</form>
  </BODY>

</HTML>
