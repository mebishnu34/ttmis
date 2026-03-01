<?php
include("header.php");
$subject=$_SESSION['subject'];
$level=$_SESSION['level'];
?>
<a href="index.php">Back</a>
<body bgcolor="#0099FF">
<form action="../php/save_details.php" method="post" enctype="multipart/form-data">
<table width="1000" border="1" cellpadding="10" align="center" bgcolor="#FFFFFF">
<tr>
<td>Level :</td>
<td><?php echo $level;?><input type="hidden" name="txtlevel" value="<?php echo $level;?>" readonly="true"></td>
<td></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>Subject :</td>
<td><?php echo $subject;?><input type="hidden" name="txtsubject" value="<?php echo $subject;?>" readonly="true"></td>
<td>Post By:</td>
<td><input type="text" name="txtpost" size="30"></td>
</tr>
<tr>
<td>Source</td>
<td colspan="3"><input type="text" name="txtsource" size="40"></td>
</tr>
<tr>
<td>Topic</td>
<td><input type="text" name="txttopic" size="40"></td>
<td>Image</td>
<td><input type="file" name="image"></td>
</tr>
<tr>
<td colspan="4" align="center"><font color="#0000FF" size="+3"><b>Details</b></font></td>
</tr>
<tr>
<td colspan="4" align="center">
<?php
include("../fckeditor/fckeditor.php") ;
  $oFCKeditor = new FCKeditor("txtdetails");
  $oFCKeditor->BasePath = "../fckeditor/";
  $oFCKeditor->Value    = "";
  $oFCKeditor->Width    = 800;
  $oFCKeditor->Height   = 400;
  echo $oFCKeditor->CreateHtml();
  //echo "<textarea name=txtdetails cols=120 rows=10></textarea>"
 ?>
</td>
</tr>
<tr>
<td colspan="4" align="center"><input type="submit" value="Save"></td>
</tr>
</table>
</form>
<?php
if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
?>
</body>
</html>
