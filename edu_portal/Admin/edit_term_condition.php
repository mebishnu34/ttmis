<?php
if($_SESSION['utype']<>"Administrator")
	{
		header('Location: index.php?msg="You have not previllage"');
	}
include("../database/db_connection.php");
$sql="Select details from tblterm";
$row=$conn->query($sql);
if($row->num_rows>0)
{
	if($data=$row->fetch_assoc())
		{
			$details=$data["details"];
		}
}
?>
<form action="../php/edit_condition.php" method="post" enctype="multipart/form-data">
<table width="1000" border="0" cellpadding="10" align="center">
<tr>
<td colspan="4" align="center"><font color="#0000FF" size="+3"><b>Details</b></font></td>
</tr>
<tr>
<td colspan="4" align="center">
<?php
include("../fckeditor/fckeditor.php") ;
  $oFCKeditor = new FCKeditor("txtdetails");
  $oFCKeditor->BasePath = "../FCKeditor/";
  $oFCKeditor->Value    = $details;
  $oFCKeditor->Width    = 800;
  $oFCKeditor->Height   = 400;
  echo $oFCKeditor->CreateHtml();
  ?>

</td>
</tr>
<tr>
<td colspan="4" align="center"><input type="submit" value="Save"></td>
</tr>
</table>
</form>
