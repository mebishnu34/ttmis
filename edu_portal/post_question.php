<?php
session_start();
if($_SESSION['memlname']=="")
	{
		header('Location: index.php');
	}
?>
<form action="php/save_question.php" method="post" enctype="multipart/form-data">
<table border="0" cellpadding="10" align="center" bgcolor="#FFCC99">
<tr>

<td><?php echo $_SESSION['que'];?><input type="text" name="txtqueid" value="<?php echo $_GET['queid'];?>"</td>
</tr>
<tr>
<td colspan="4" align="center">
<textarea name="txtans" cols="100" rows="5"></textarea>
</td>
</tr>
<tr>
<td colspan="4" align="center"><input type="submit" value="Submit Question"></td>
</tr>
</table>
</form>
