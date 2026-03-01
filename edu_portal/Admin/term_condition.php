<?php
if($_SESSION['utype']<>"Administrator")
	{
		header('Location: index.php?msg="You have not previllage"');
	}
?>
<form action="../php/save_condition.php" method="post" enctype="multipart/form-data">
<table width="1000" border="1" cellpadding="10" align="center">
<tr>
<td colspan="4" align="center"><font color="#0000FF" size="+3"><b>Details</b></font></td>
</tr>
<tr>
<td colspan="4" align="center">
<?php
include("../fckeditor/fckeditor.php") ;
  $oFCKeditor = new FCKeditor("txtdetails");
  $oFCKeditor->BasePath = "../FCKeditor/";
  $oFCKeditor->Value    = "";
  $oFCKeditor->Width    = 800;
  $oFCKeditor->Height   = 400;
  echo $oFCKeditor->CreateHtml();
  //echo "<textarea name="txtdetails" cols="120" rows="10"></textarea>"
 ?>

</td>
</tr>
<tr>
<td colspan="4" align="center"><input type="submit" value="Save"></td>
</tr>
</table>
</form>
