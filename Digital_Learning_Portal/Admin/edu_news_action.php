<?php
session_start();
if($_SESSION['Admin']=="")
	{
		header('Location: ../index.php');
	}
include("../database/db_connection.php");
$sql=mysql_query("select newsid, newstitle, news, image,source from tblnews where newsid='$id'",$con);
$data=mysql_fetch_array($sql);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Add Details</title>
</head>
<body>
<form action="../php/update_edunews.php" method="post" enctype="multipart/form-data">
<table width="1000" border="1" cellpadding="10" align="center">
<input type="hidden" name="txtid" value="<?php echo $id;?>">
<tr>
<td>News Title:</td>
<td><input type="text" name="txttitle" size="40" value="<?php echo $data["newstitle"];?>"></td>
<td>Source</td>
<td colspan="3"><input type="text" name="txtsource" size="40" value="<?php echo $data["source"];?>"></td>
</tr>
<tr>
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
  $oFCKeditor = new FCKeditor(txtdetails);
  $oFCKeditor->BasePath = "../FCKeditor/";
  $oFCKeditor->Value    = $data["news"];
  $oFCKeditor->Width    = 800;
  $oFCKeditor->Height   = 400;
  echo $oFCKeditor->CreateHtml();
  //echo "<textarea name="txtdetails" cols="120" rows="10"></textarea>"
 ?>
</td>
</tr>
<tr>
<td colspan="4" align="center"><input type="submit" value="Update"></td>
</tr>
</table>
</form>
<?php
if($_GET['msg'])
	{
		echo $_GET['msg'];
	}
?>
</body>
</html>
