<?php
ob_start();
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Edit Question</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<?php
include("processing/db_connection.php");
if($_GET['linkid'])

	{
		$id= $_GET['linkid'];
		$sql=mysql_query("Select questionid, question, subject, ans1, ans2, ans3, ans4, correctno from tblquestion where questionid='$id'",$con);
		$data=mysql_fetch_array($sql);
	}
if($_GET['dlinkid'])
	{
		$id= $_GET['dlinkid'];
		$sql=mysql_query("Select questionid, question, courseid, subject, ordering, ans1, ans2, ans3, ans4, correctno from tblquestion where questionid='$id'",$con);
		$data=mysql_fetch_array($sql);
	}
$qid=$_POST['txtquestionid'];
$question=$_POST['txtquestion'];
$subject=$_POST['txtsubject'];
$ans1=$_POST['ans1'];
$ans2=$_POST['ans2'];
$ans3=$_POST['ans3'];
$ans4=$_POST['ans4'];
$correct=$_POST['txtcorrect'];
if(isset($_POST['btnedit']))
	{
		if($_POST['txtsubject']<>"" && $_POST['txtquestion']<>"" && $_POST['ans1']<>"" && $_POST['ans2']<>"" && $_POST['ans3']<>"" && $_POST['ans4']<>"" && $_POST['txtcorrect']<>"")
			{
				$sql=mysql_query("Update tblquestion set question='$question', subject='$subject', ans1='$ans1', ans2='$ans2', ans3='$ans3', ans4='$ans4', correctno='$correct' where questionid='$qid'",$con);
						if(!$sql)
							{
								header('Location: displayquestion.php?msg='.mysql_error());
							}
						else
							{
								header('Location: displayquestion.php?msg="Successfully Edited"');
							}
			}
		else
			{
				header('Location: displayquestion.php?msg="Asterisk Fields are Required"');

			}
	}
if(isset($_POST['btndelete']))
	{
			$sql=mysql_query("Delete from tblquestion where questionid='$qid'",$con);
				if(!$sql)
						{
							header('Location: displayquestion.php?msg='. mysql_error());
						}
						else
							{
								header('Location: displayquestion.php?msg="Successfully Deleted"');
							}
			}
	?>
<body bgcolor="#FFFFCC">
<table width="1000" border="0" align="center">
<tr>
<td align="right"><a href="exam/index.php"><img src="image/banner.jpg"></a></td>
<td><img src="image/sagar.jpg" width="200" height="100"></td>
</tr>
</table>
<form name="form1" method="post" action="exam/question_Action.php">
  <table width="900" border="0" cellspacing="5" cellpadding="0" align="center">
  <tr>
  <td>Question ID</td>
  <td>&nbsp;</td>
  <td><input type="text" name="txtquestionid" id="txtquestionid" readonly="True" value="<?php echo $data["questionid"];?>"></td>
  </tr>
 <tr>
  <td>Question ID</td>
  <td>&nbsp;</td>
  <td><input type="text" name="txtsubject" value="<?php echo $data["subject"];?>"></td>
  </tr>
      <tr>
	<td colspan="3" align="center" bgcolor="#0000FF"><font color="#FFFFFF" size="+3"><b>Question</b></font></td>
	</tr>
	<td colspan="3"><?php
	include("../../fckeditor/fckeditor.php") ;
  	$oFCKeditor = new FCKeditor(txtquestion);
 	$oFCKeditor->BasePath = "../../FCKeditor/";
  	$oFCKeditor->Value    = $data["question"];
 	$oFCKeditor->Width    = 800;
 	$oFCKeditor->Height   = 400;
  	echo $oFCKeditor->CreateHtml();
   ?></td>
	</tr>
	<tr>
	<td>Option Answer 1</td>
	<td>&nbsp;</td>
	<td><input type="text"  size="50" name="ans1" id="ans1" value="<?php echo $data["ans1"];?>"></td>
	</tr>
	<tr>
	<td>Option Answer 2</td>
	<td>&nbsp;</td>
	<td><input type="text" size="50" name="ans2" id="ans2" value="<?php echo $data["ans2"];?>"></td>
	</tr>
	<tr>
	<td>Option Answer 3</td>
	<td>&nbsp;</td>
	<td><input type="text" size="50" name="ans3" id="ans3" value="<?php echo $data["ans3"];?>"></td>
	</tr>
	<tr>
	<td>Option Answer 4</td>
	<td>&nbsp;</td>
	<td><input type="text" size="50" name="ans4" id="ans4" value="<?php echo $data["ans4"];?>"></td>
	</tr>
	<tr>
	<td>Correct Number</td>
	<td>&nbsp;</td>
	<td><input type="text" name="txtcorrect"  value="<?php echo $data["correctno"];?>"></td>
	</tr>
   <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">
       <input name="btnedit" type="submit" id="btnedit" value="Modify"> &nbsp; &nbsp;
	   <input name="btndelete" type="submit" id="btndelete" value="Delete">
      </div></td>
    </tr>
  </table>
</form>
<?php
if($_GET['msg'])
	{
		echo $_GET['msg'];
	}
ob_flush();
?>
<br>
<a href="exam/index.php">Back</a>
</body>
</html>
