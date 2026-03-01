<html>
<HEAD>
 <TITLE>Teacher Update</TITLE>
 <link rel="stylesheet" href="../CSS/main_table.css">
</HEAD>
<BODY class="bg">
<div align="center">
<table width="100%">
<tr>
<td align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.svg" width="150" height="100"></td>
<td bgcolor="#FFFFFF" align="left"><img src="..\Image\banner.jpg" width="100%" height="150"></td>
</tr>
</table>

<?php
include("../Processing/db_connection.php");
if(isset($_GET['tid']))
{
$code = $_GET['tid'];
$sql1 = "SELECT tname,tcontact FROM tblteacher where teachercode='$code'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0)
      {
      if($row = $result1->fetch_assoc())
         {
		 $name=$row['tname'];
        $contact= $row['tcontact'];
          }
   }
?>
<form method="Post" action="../Object/update_teacher_1.php">
<table width="100%" class="subtable" border="0" class="10" cellpadding="10">
<tr>
<td colspan="3" align="center">Update Mobile Number</td>
</tr>
<tr><td align="right">Name of Teacher</td>
<td>&nbsp;</td>
<td><?php echo $name;?>( <?php echo $code;?>)</td>
</tr>
<tr><td align="right">Mobile Number</td>
<td>&nbsp;</td>
<td><input name="txtcontact" type="Text" size="20" value="<?php echo $contact;?>" /><input name="txtcode" type="hidden" size="20" value="<?php echo $code;?>" /></td>
</tr>
<tr>
<td colspan="3" align="Center"><input name="btnupdate" type="Submit" value="Update" /></td>
</tr>

</table>
</form>
</div>
<?php
}
if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
?>
</body>

</html>
