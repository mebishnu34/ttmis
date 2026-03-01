<?php
session_start();
include("../../../Processing/db_connection.php");
//echo $_SESSION['level'];
$subname=$_SESSION['subject'];
	if($_SESSION['level']=="वालविकास केन्द्र")
		{
		$sql="Select topic from tblsix where subject='$subname'";
		$rownum=$conn->query($sql);
		}
	elseif($_SESSION['level']=="आधारभूत (१ –५)")
		{
		$sql="Select topic from tblseven where subject='$subname'";
		$rownum=$conn->query($sql);
		}
	elseif($_SESSION['level']=="आधारभूत (६ –८)")
		{
		$sql="Select topic from tbleight where subject='$subname'";
		$rownum=$conn->query($sql);
		}
	elseif($_SESSION['level']=="माध्यमिक(९ –१०)")
		{
		$sql="Select topic from tblnine where subject='$subname'";
		$rownum=$conn->query($sql);
		}
	elseif($_SESSION['level']=="माध्यमिक(११ –१२)")
		{
		$sql="Select topic from tblten where subject='$subname'";
		$rownum=$conn->query($sql);
		}
	elseif($_SESSION['level']=="प्रधानाध्यापक (आधारभूत)")
		{
		$sql="Select topic from tbleleven where subject='$subname'";
		$rownum=$conn->query($sql);
		}
	elseif($_SESSION['level']=="प्रधानाध्यापक (माध्यमिक)")
		{
		$sql="Select topic from tbltwelve where subject='$subname'";
		$rownum=$conn->query($sql);
		}
	$i=0;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add Question</title>
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

<body>
<a href="../index.php">Back</a>
<form name="form1" method="post" action="../../php/save_examquestion.php">
  <table width="90%" border="0" cellspacing="5" cellpadding="0" align="center">
  <tr>
      <td align="center" colspan="3">Subject:-
      <?php echo $_SESSION['subject'];?><input name="txtsubject" type="hidden" readonly="True" value="<?php echo $_SESSION['subject'];?>" size="50"> &nbsp; 
	  <select name="cmbtopic">
<?php
	if($rownum->num_rows>0)
	{
	while($data=$rownum->fetch_assoc())
		{
		echo "<option>" . $data["topic"] ."</option>";
		}
	}
?>
<option>None</option>
</select> &nbsp; 
Ordering No. <input type="text" name="txtorder"> / Level: <?php echo $_SESSION['level'];?>
&nbsp;&nbsp;&nbsp; Category<select name="cmbcategory">
<option>Text</option>
<option>Audio</option>
<option>Video</option>
<option>Hyperlink</option>
</select>

</td>
    </tr>
   <tr>
	<td colspan="3" align="center" bgcolor="#0000FF"><font color="#FFFFFF" size="+3"><b>Question</b></font></td>
	</tr>
	<td colspan="3" align="center">
	<?php
	include("../../fckeditor/fckeditor.php") ;
  	$oFCKeditor = new FCKeditor("addque");
 	$oFCKeditor->BasePath = "../../fckeditor/";
  	$oFCKeditor->Value    = "";
 	$oFCKeditor->Width    = 800;
 	$oFCKeditor->Height   = 400;
  	echo $oFCKeditor->CreateHtml();
   ?>
	</td>
	</tr>
<tr>
	<td align="right">Option Answer 1</td>
	<td align="left" colspan="2"><input type="text"  size="50" name="ans1" id="ans1"></td>
	</tr>
	<tr>
	<td align="right">Option Answer 2</td>
	<td align="left" colspan="2"><input type="text" size="50" name="ans2" id="ans2"></td>
	</tr>
	<tr>
	<td align="right">Option Answer 3</td>
	<td align="left" colspan="2"><input type="text" size="50" name="ans3" id="ans3"></td>
	</tr>
	<tr>
	<td align="right">Option Answer 4</td>
	<td align="left" colspan="2"><input type="text" size="50" name="ans4" id="ans4"></td>
	</tr>
	<tr>
	<td align="right">Correct Number</td>
	<td align="left" colspan="2"><input type="text" name="txtcorrect"></td>
	</tr>
	</tr>
	   <tr>
        <td colspan="3" align="center"><input name="btnsave" type="submit" id="btnsave" value="Save">
        <input name="btnreset" type="reset" id="btnreset" value="Cancel">
     </td>
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
