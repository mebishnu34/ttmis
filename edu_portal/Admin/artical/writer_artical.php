<?php
session_start();
$wname=$_SESSION['fname'];
include("../../database/db_connection.php");
$sql="Select subjectid, subject from tblsubject";
$rownum=$conn->query($sql);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Artical</title>
</head>
<body>
<a href="../index.php">Back</a>
<form name="form1" method="post" action="../../php/save_article.php">
  <table width="900" border="0" cellspacing="5" cellpadding="0" align="center">
     <tr>
      <td>Name of Writer*</td>
      <td>&nbsp;</td>
      <td><input name="txtwname" type="text" readonly="True" value="<?php echo $wname;?>" size="40"></td>
    </tr>
    <tr>
      <td>Subject*</td>
      <td>&nbsp;</td>
      <td><select name="txtsubject">
<?php
if($rownum->num_rows>0)
{
	while($data=$rownum->fetch_assoc())
		{
			echo "<option>" . $data["subject"] . "</option>";
			
		}
}
?>
</td>
    </tr>
	    <tr>
      <td>Topic*</td>
      <td>&nbsp;</td>
      <td><input name="txttopic" type="text" size="40"></td>
    </tr>
	<tr>
      <td>Source</td>
      <td>&nbsp;</td>
      <td><input name="txtsource" type="text" size="40"></td>
    </tr>
      <tr>
      <td>Index*</td>
      <td>&nbsp;</td>
      <td><input name="txtindex" type="text" value="0"></td>
    </tr>
    <tr>
      <td valign="top" 	align="center" colspan="3">Details*</td>
     </tr>
	<tr>
      <td align="center" colspan="3">
	   <?php
  include("../../fckeditor/fckeditor.php") ;
  $oFCKeditor = new FCKeditor("contents");
  $oFCKeditor->BasePath = "../../fckeditor/";
  $oFCKeditor->Value    = "";
  $oFCKeditor->Width    = 800;
  $oFCKeditor->Height   = 300;
  echo $oFCKeditor->CreateHtml();
  ?>
    </td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#FFCCCC">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>
        <input name="btnsave" type="submit" id="btnsave" value="Save">
      </td>
    </tr>
  </table>
</form>
<center>
<?php
if(isset($_GET['msg']))
{
	echo $_GET['msg'];
}
?>
</center>
</body>
</html>
