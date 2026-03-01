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
include("../../database/db_connection.php");
if(isset($_GET['linkid']))

	{
		$id= $_GET['linkid'];
		$sql="Select questionid, question, subject, topic, ans1, ans2, ans3, ans4, correctno from tblquestion where questionid='$id'";
		$rownum=$conn_1->query($sql);
	}
if(isset($_GET['dlinkid']))
	{
		$id= $_GET['dlinkid'];
		$sql="Select questionid, question, courseid, subject, ordering, ans1, ans2, ans3, ans4, correctno from tblquestion where questionid='$id'";
		$rownum=$conn_1->query($sql);
	}
if(isset($_POST['btnedit']))
	{
		if($_POST['txtsubject']<>"" && $_POST['txttopic']<>"" && $_POST['txtquestion']<>"" && $_POST['ans1']<>"" && $_POST['ans2']<>"" && $_POST['ans3']<>"" && $_POST['ans4']<>"" && $_POST['txtcorrect']<>"")
			{
			$qid=$_POST['txtquestionid'];
			$question=$_POST['txtquestion'];
			$subject=$_POST['txtsubject'];
			$ans1=$_POST['ans1'];
			$ans2=$_POST['ans2'];
			$ans3=$_POST['ans3'];
			$ans4=$_POST['ans4'];
			$correct=$_POST['txtcorrect'];
				$sql="Update tblquestion set question='$question', subject='$subject', topic='$_POST[txttopic]', ans1='$ans1', ans2='$ans2', ans3='$ans3', ans4='$ans4', correctno='$correct' where questionid='$qid'";
				if(!mysqli_query($conn_1,$sql))
							{
								header('Location: displayquestion.php?msg='.mysqli_error($conn_1));
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
			$sql="Delete from tblquestion where questionid='$qid'";
			if(!mysqli_query($conn_1,$sql))
						{
							header('Location: displayquestion.php?msg='. mysqli_error($conn_1));
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
<td align="right"><a href="index.php"><img src="../../image/banner.jpg"></a></td>
<td><img src="../../image/logo.jpg" width="200" height="100"></td>
</tr>
</table>
<form name="form1" method="post" action="question_Action.php">
<?php
if($rownum->num_rows>0)
{
	if($data=$rownum->fetch_assoc())
	{
	?>
  <table width="900" border="0" cellspacing="5" cellpadding="0" align="center">
  <tr>
  <td>Question ID</td>
  <td>&nbsp;</td>
  <td><input type="text" name="txtquestionid" id="txtquestionid" readonly="True" value="<?php echo $data["questionid"];?>"></td>
  </tr>
 <tr>
  <td>Subject</td>
   <td colspan="2"><input type="text" name="txtsubject" value="<?php echo $data["subject"];?>" size="40"> &nbsp; <input type="text" name="txttopic" value="<?php echo $data["topic"];?>" size="30">
   
   </td>
  </tr>
      <tr>
	<td colspan="3" align="center" bgcolor="#0000FF"><font color="#FFFFFF" size="+3"><b>Question</b></font></td>
	</tr>
	<td colspan="3"><?php
	include("../../fckeditor/fckeditor.php") ;
  	$oFCKeditor = new FCKeditor("txtquestion");
 	$oFCKeditor->BasePath = "../../fckeditor/";
  	$oFCKeditor->Value    = $data["question"];
 	$oFCKeditor->Width    = 800;
 	$oFCKeditor->Height   = 200;
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
  <?php
  }
  }
  ?>
</form>
<?php
if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
ob_flush();
?>
<br>
<a href="../index.php">Back</a>
</body>
</html>
