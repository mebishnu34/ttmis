<?php
ob_start();
session_start();
if(isset($_SESSION['loginuser']))
	{
		if($_SESSION['usertype']=="Administrator")
		{
			echo $_SESSION['loginuser'];
		}
		else
			{
			header('Location: Login.php?msg="You have no previllege"');
			}
	}
else
	{
		header('Location: login.php?msg="Please Login First"');
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Web_New_User</title>
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
<?php
include("../database/db_connection.php");
if($_GET['linkid'])

	{
		echo "Group ID " .$_GET['linkid'] ." For Edit";
		$id= $_GET['linkid'];
		$sql=mysql_query("Select courseid, coursename,duration, coursefee, objectives, remark from tblcourse where courseid='$id'",$con);
		$data=mysql_fetch_array($sql);
	}
if($_GET['dlinkid'])
	{
		echo "Group ID " .$_GET['dlinkid'] ." For Delete";
		$id= $_GET['dlinkid'];
		$sql=mysql_query("Select courseid, coursename,duration, coursefee, objectives, remark from tblcourse where courseid='$id'",$con);
		$data=mysql_fetch_array($sql);
	}
$gid=$_POST['txtgid'];
$gname=$_POST['txtgname'];
$grouptype=$_POST['cmblinktype'];
if(isset($_POST['btnedit']))
	{
		if($_POST['txtgname']<>"" && $_POST['cmblinktype']<>"")
			{
				$sql=mysql_query("Update tblmaingroup set groupname='$gname', grouptype='$grouptype' where maingroupid='$gid'",$con);
						if(!$sql)
							{
								header('Location: index.php?msg=mysql_error()');
							}
						else
							{
								header('Location: index.php?msg="Successfully Edited"');
							}
			}
		else
			{
				header('Location: index.php?msg="Asterisk Fields are Required"');

			}
	}
if(isset($_POST['btndelete']))
	{
		if($_POST['txtgname']<>"" && $_POST['cmblinktype']<>"")
			{
				$sql=mysql_query("Delete from tblmaingroup where maingroupid='$gid'",$con);
				if(!$sql)
						{
							header('Location: index.php?msg=mysql_error()');
						}
						else
							{
								header('Location: index.php?msg="Successfully Deleted"');
							}
			}
		else
			{
				header('Location: index.php?msg="Asterisk Fields are Required"');

			}
	}
?>
<form name="form1" method="post" action="group_Action.php">
  <table width="900" border="0" cellspacing="5" cellpadding="0">
  <tr>
  <td>Course ID</td>
  <td>&nbsp;</td>
  <td><input type="text" name="txtcourseid" id="txtcourseid"></td>
  </tr>
    <tr>
      <td width="178"><div align="right">Course Name*</div></td>
      <td width="26">&nbsp;</td>
      <td width="676"><input name="txtcoursename" type="text" id="txtcoursename" size="50" value="<?php echo $data["coursename"]; ?>"></td>
    </tr>
     <tr>
      <td><div align="right">Duration*</div></td>
      <td>&nbsp;</td>
      <td><select name="cmbduration" id="cmbduration">
        <option>7-Days</option>
        <option>15-Days</option>
        <option>1-Month</option>
        <option>1.5-Month</option>
		 <option>2-Months</option>
        <option>3-Months</option>
        <option>4-Month</option>
        <option>5-Month</option>
		<option>6-Months</option>
        <option>7-Months</option>
        <option>8-Month</option>
        <option>9-Month</option>
		 <option>10-Months</option>
        <option>11-Month</option>
        <option>1-Years</option>
		<option>1.6-Years</option>
        <option>2-Years</option>
         </select></td>
    </tr>
	<tr>
	<td>Cousse Fee*</td>
	<td>&nbsp;</td>
	<td><input type="text" name="txtfee" id="txtfee" value="<?php echo $data["coursefee"]; ?>"></td>
	</tr>
	<tr>
	<td>Objectives*</td>
	<td>&nbsp;</td>
	<td><textarea name="txtobjective" cols="80" rows="10" id="txtobjective"><?php echo $data["objectives"]; ?>"</textarea></td>
	</tr>
	</tr>
	<tr>
	<td>Remark</td>
	<td>&nbsp;</td>
	<td><input type="text" name="txtremark" id="txtremark" size="50" value="<?php echo $data["remark"]; ?>"></td>
	</tr>
   <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">
       <input name="btnedit" type="submit" id="btnedit" <? if($_GET['dlinkid']) { ?> disabled <? }?> value="Modify"> &nbsp; &nbsp;
	   <input name="btndelete" type="submit" id="btndelete"  <? if($_GET['linkid']) { ?> disabled <? }?> value="Delete">
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
<a href="Display_Group.php">Back</a>
</body>
</html>
