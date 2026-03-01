<?php
//session_start();
if($_SESSION['utype']<>"Administrator")
	{
		header('Location: index.php?msg="You have not previllage');
	}
?>
<form action="../php/save_faculty.php" method="post">
<table width="600" align="center" cellpadding="15">
<tr>
<td>Faculty</td>
<td><input type="text" name="txtfaculty"></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="Save"></td>
</tr>
</table>
</form>
