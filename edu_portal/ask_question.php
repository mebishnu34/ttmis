<?php
if($_SESSION['memlname']=="")
	{
		header('Location: index.php');
	}
$level=$_SESSION['level'];
$faculty=$_SESSION['faculty'];
$subject=$_SESSION['subject'];
$topic=$_SESSION['topic'];
$lname=$_SESSION['lname'];
$fname=$_SESSION['fname'];
?>
<form action="php/save_question.php" method="post" enctype="multipart/form-data">
<table border="0" cellpadding="10" align="center" bgcolor="#FFCC99">
<input type="hidden" name="txtlevel" value="<?php echo $level;?>" readonly="true">
<input type="hidden" name="txtfaculty" value="<?php echo $faculty;?>" readonly="true">
<input type="hidden" name="txtsubject" value="<?php echo $subject;?>" readonly="true">
<input type="hidden" name="txtlname" value="<?php echo $lname;?>" readonly="true">
<input type="hidden" name="txttopic" size="40" value="<?php echo $topic;?>" readonly="true">
<tr>
<td colspan="4" align="center">
<textarea name="txtquestion" cols="100" rows="5"></textarea>
</td>
</tr>
<tr>
<td colspan="4" align="center"><input type="submit" value="Submit Question"></td>
</tr>
</table>
</form>
