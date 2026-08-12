<?php
ob_start();
if($_SESSION['usertype']<>"Administrator")
	{
		header('Location: admin_application.php?msg="You have not previllage"');
	}
?>
<form action="processing/save_subject.php" method="post" ID="normal_form">
<table width="600" align="center" cellpadding="5" ID="content_table">
<tr>
<td>Subject</td>
<td><input type="text" name="txtsubject" size="50" required></td>
</tr>
<tr>
<td align="center" colspan="2"><input type="submit" name="btnsave" value="Save"></td>
</tr>
</table>
</form>
