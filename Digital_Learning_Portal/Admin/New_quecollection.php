<?php
include("header.php");
$sql="Select subjectid, subject from tblsubject where level='$_SESSION[level]' and faculty='$_SESSION[faculty]'";
$rownum=$conn->query($sql);
?>
<body>

<form name="form1" method="post" action="processing/save_oldqueans.php">
  <table width="900" border="0" cellspacing="5" cellpadding="0" align="center">
  <tr>
      <td align="right">Subject :</td>
      <td align="center"><select name="cmbsubject">
	  <?php
	  if($rownum->num_rows>0)
	  {
	  while($data=$rownum->fetch_assoc())
	  	{
		?>
		<option><?php echo $data["subject"];?></option>
	<?php
		}
	  }
		?>
	  
	  </select> Level: <?php echo $_SESSION['level'];?></td>
    </tr>
   <tr>
	<td align="Left" bgcolor="#0000FF"><a href="index.php">Back</a></td><td bgcolor="#0000FF" align="center"><font color="#FFFFFF" size="+3"><b>Question</b></font></td>
	</tr>
	<td colspan="2" align="center">
	<?php
	include("../fckeditor/fckeditor.php") ;
  	$oFCKeditor = new FCKeditor("addque");
 	$oFCKeditor->BasePath = "../FCKeditor/";
  	$oFCKeditor->Value    = "";
 	$oFCKeditor->Width    = 800;
 	$oFCKeditor->Height   = 200;
  	echo $oFCKeditor->CreateHtml();
   ?>
	</td>
	</tr>
	 <tr>
	<td colspan="2" align="center" bgcolor="#0000FF"><font color="#FFFFFF" size="+3"><b>Answer</b></font></td>
	</tr>
	<td colspan="2" align="center">
	<?php
	include("../fckeditor/fckeditor.php") ;
  	$oFCKeditor = new FCKeditor("addans");
 	$oFCKeditor->BasePath = "../FCKeditor/";
  	$oFCKeditor->Value    = "";
 	$oFCKeditor->Width    = 800;
 	$oFCKeditor->Height   = 200;
  	echo $oFCKeditor->CreateHtml();
   ?>
	</td>
	</tr>
	   <tr>
      <td>&nbsp;</td>
      <td><div align="right">
        <input name="btnsave" type="submit" id="btnsave" value="Save">
        <input name="btnreset" type="reset" id="btnreset" value="Cancel">
      </div></td>
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
