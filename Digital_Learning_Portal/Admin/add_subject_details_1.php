<?php
session_start();
?>
<html>
<head>
    <title>Digital Learning Portal</title>
    <link rel="stylesheet" href="..\CSS\style_sheet.css"/>
    <link rel="stylesheet" href="..\CSS\grid.css"/>
    <link rel="stylesheet" href="..\CSS\gallary.css"/>
    <link rel="stylesheet" href="..\CSS\slider.css"/>
</head>
<body bgcolor="#0099FF">
<form action="processing/save_details.php" method="post" ID="details_form">
<table width="1000" border="0" cellpadding="10" align="center" bgcolor="#FFFFFF">
<tr>
<td>Category :<?php echo $_SESSION['category'];?></td>
</tr>
<tr>
<td>Level :<?php echo $_SESSION['level'];?></td>
</tr>
<tr>
<td>Subject :<?php echo $_SESSION['subject'];?></td>
</tr>
<tr>
<td>Topic:<?php echo $_SESSION['topic'];?></td>
</tr>
<tr>
<td>Details Heading:<input type="Text" name="txtheading" id="txtheading"></td>
</tr>
<tr>
<td align="center"><font color="#0000FF" size="+3"><b>Details</b></font></td>
</tr>
<tr>
<td align="center">
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
<td align="center"><input type="submit" value="Save"></td>
</tr>
</table>
</form>
<?php
if(isset($_GET['msg']))
	{
		echo "<center>".  $_GET['msg'] ."</center>";
	}
?>
</body>
</html>
