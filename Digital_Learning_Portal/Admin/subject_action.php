<?php
ob_start();
session_start();
include("../php_processing/db_connection.php");
if($_SESSION['usertype']<>"Administrator")
	{
		header('Location: admin_application.php?msg="You have not previllage"');
	}
$id=$_GET['subid'];
$sql="Select subjectid, subject from tblsubject where subjectid='$id'";
$result=$conn->query($sql);
if($data=$result->fetch_assoc())
{
$id= $data["subjectid"];
$subject= $data["subject"];
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Online_Learning</title>
<link rel="stylesheet" href="..\CSS\style_sheet.css"/>
</head>
<body>
<form action="processing/update_subject.php" method="post" ID="normal_form">
<table width="500" align="center" cellpadding="5" ID="content_table">
<tr>
<td>Subject ID</td>
<td><input type="text" name="txtid" value="<?php echo $id;?>" Readonly></td>
</tr>
<tr>
<td>Subject</td>
<td><input type="text" name="txtsubject" value="<?php echo $subject;?>"></td>
</tr>
<tr>
<td align="center" colspan="2"><input type="submit" name="btnedit" value="Edit"></td>
</tr>
</table>
</form>
<?php
if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
?>
</body>
</html>
