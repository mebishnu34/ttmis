<?php
if($_SESSION['utype']<>"Administrator")
	{
		header('Location: index.php?msg="You have not previllage"');
	}
?>
<form action="../php/save_writer.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="1000" border="0" cellspacing="5" cellpadding="10">
      <tr>
      <td>Name of Writer*</td>
      <td>&nbsp;</td>
      <td><input name="txtwriter" type="text"  size="50"></td>
    </tr>
	<tr>
      <td>Address</td>
      <td>&nbsp;</td>
      <td><input name="txtaddress" type="text" id="txtaddress" size="50"></td>
    </tr>
	<tr>
      <td>Contact</td>
      <td>&nbsp;</td>
      <td><input name="txtcontact" type="text" id="txtcontact" size="20"></td>
    </tr>
	<tr>
      <td>E-mail</td>
      <td>&nbsp;</td>
      <td><input name="txtemail" type="text" id="txtemail" size="50"></td>
    </tr>
	<tr>
      <td>Qualification</td>
      <td>&nbsp;</td>
      <td><input name="txtquali" type="text" id="txtquali" size="50"></td>
    </tr>
	<tr>
      <td>Experence</td>
      <td>&nbsp;</td>
      <td>
	  <?php
	include("../fckeditor/fckeditor.php") ;
  $oFCKeditor = new FCKeditor("experence");
  $oFCKeditor->BasePath = "../FCKeditor/";
  $oFCKeditor->Value    = "";
  $oFCKeditor->Width    = 800;
  $oFCKeditor->Height   = 200;
  echo $oFCKeditor->CreateHtml();
  //echo "<textarea name=txtdetails cols=120 rows=10></textarea>"
 ?></td>
<tr>
<td>Photo*</td>
<td>&nbsp;</td>
<td><input name="image" type="file"></td>
</tr>
    </tr>
	<td align="center" colspan="3">
        <input name="btnsave" type="submit" id="btnsave" value="Save">
     </td>
    </tr>
  </table>
</form>
