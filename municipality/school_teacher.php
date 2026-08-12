<?php
session_start();
include("../Processing/db_connection.php");
if(isset($_GET['id']))
{
$_SESSION['trainingid']=$_GET['id'];
}

?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
 <TITLE>TTMIS</TITLE>
 <link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
</HEAD>
<BODY>
<table class="maintable">
<tr>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="../Image/logo.jpg" width="150" height="130"></td>
<td  valign="top" bgcolor="#FFFFFF"><img src="../Image/banner.jpg" height="130"></td>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="../Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
<td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"><a href="index.php">Log Out</a></font></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1" color="#FFFFFF"><b>Teacher Training Management Information System(TTMIS)</b></font></td>
<td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"><?php echo $_SESSION['uname']."/".$_SESSION['tid'];?></font></td>
</tr>
</table>
  <form action="select_school_teacher.php" method="Post">
   <table align="center">
  <tr><td align="right">Select School*</td>
<td>&nbsp;</td>
<td>
<?php 
$sql="SELECT * FROM tblschool where munvdc='$_SESSION[uname]' and (remark='Running' or remark='Registered')";
$result = mysqli_query($conn,$sql);
echo "<Select name=cmbschool>";
echo "<option selected>All</option>";
while($row = mysqli_fetch_array($result))
      {
      echo "<option>" . $row['schoolname'] . "</option>";
     }
echo "</select>";
?>
</td>
<tr>
<td colspan="3" align="center"><input name="btnschool" type="Submit" value="Display" class="button"></td>
</tr>
  </table>
  </form>
</BODY>

</HTML>
