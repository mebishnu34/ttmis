<?php
session_start();
if($_SESSION['utype']<>"Administrator")
	{
		header('Location: ../index.php?msg="You have not previllage"');
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Teacher Modify</title><link rel="stylesheet" type="text/css" href="../css/body.css">
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
include("../../database/db_connection.php");
if(isset($_GET['linkid']))

	{
		echo "Writer ID " .$_GET['linkid'] ." For Edit";
		$id= $_GET['linkid'];
		$sql="Select id,fullname, address, contact, email, qualification, experence, photo, ondate, remark  from tblwriter where id='$id'";
		$rownum=$conn->query($sql);
	}
if(isset($_POST['btnedit']))
	{
		if(isset($_FILES['image']) && $_FILES['image']['size'] > 0)
		{
		$tmpName = $_FILES['image']['tmp_name'];
		$fp 	 = fopen($tmpName, 'r');
		$data    = fread($fp, filesize($tmpName));
		$data 	 = addslashes($data);
		fclose($fp);
		}
		$id=$_POST['txtid'];
		if($id<>"" && $_POST['txtwriter']<>"")
			{
				$sql="Update tblwriter set fullname='$_POST[txtwriter]', address='$_POST[txtaddress]', contact='$_POST[txtcontact]', email='$_POST[txtemail]', qualification='$_POST[txtquali]', experence='$_POST[experence]',photo='$data', ondate=now(), remark='$_POST[cmbstatus]' where id='$id'";
						if(!mysqli_query($conn,$sql))
							{
								header('Location: ../index.php?msg'. mysqli_error($conn));
							}
						else
							{
								header('Location: ../index.php?msg="Successfully Edited"');
							}
			}
		else
			{
				header('Location: ../index.php?msg="Asterisk Fields are Required"');

			}
	}
if(isset($_POST['btndelete']))
	{
		$code=$_POST['txtcode'];
		if($_POST['txtcode']<>"")
			{
				$sql="Delete from tblwriter where id='$id'";
				if(!mysqli_query($conn,$sql))
						{
							header('Location: ../index.php?msg'. mysqli_error($conn));
						}
						else
							{
								header('Location: ../index.php?msg="Successfully Deleted"');
							}
			}
		else
			{
				header('Location: index.php?msg="Asterisk Fields are Required"');

			}
	}
?>
<form name="form1" method="post" action="writer_Action.php">
<?php
if($rownum->num_rows>0)
	{
	if($data=$rownum->fetch_assoc())
	{
	?>
 <table width="90%" border="0" cellspacing="5" cellpadding="0" height="600" align="center">
    <tr>
      <td>ID*</td>
      <td>&nbsp;</td>
      <td><input name="txtid" type="text"  size="5" value="<?php echo $data["id"];?>"></td>
    </tr>
	<tr>
      <td>Name of Writer*</td>
      <td>&nbsp;</td>
      <td><input name="txtwriter" type="text"  size="50" value="<?php echo $data["fullname"];?>"></td>
    </tr>
	<tr>
      <td>Address</td>
      <td>&nbsp;</td>
      <td><input name="txtaddress" type="text" id="txtaddress" size="50" value="<?php echo $data["address"];?>"></td>
    </tr>
	<tr>
      <td>Contact</td>
      <td>&nbsp;</td>
      <td><input name="txtcontact" type="text" id="txtcontact" size="20" value="<?php echo $data["contact"];?>"></td>
    </tr>
	<tr>
      <td>E-mail</td> 
      <td>&nbsp;</td>
      <td><input name="txtemail" type="text" id="txtemail" size="50" value="<?php echo $data["email"];?>"></td>
    </tr>
	<tr>
      <td>Qualification</td>
      <td>&nbsp;</td>
      <td><input name="txtquali" type="text" id="txtquali" size="50" value="<?php echo $data["qualification"];?>"></td>
    </tr>
	<tr>
      <td>Experence</td>
      <td>&nbsp;</td>
      <td>
	  <?php
	include("../../fckeditor/fckeditor.php") ;
  $oFCKeditor = new FCKeditor("experence");
  $oFCKeditor->BasePath = "../../FCKeditor/";
  $oFCKeditor->Value    = $data["experence"];
  $oFCKeditor->Width    = 800;
  $oFCKeditor->Height   = 200;
  echo $oFCKeditor->CreateHtml();
  //echo "<textarea name=txtdetails cols=120 rows=10></textarea>"
 ?></td>
<tr>
<td>Photo*</td>
<td>&nbsp;</td>
<td><input name="image" type="file"></td>
</tr>
<tr>
<td>Status*</td>
<td></td>
<td><select name="cmbstatus">
<option>Working</option>
<option>Not Work</option>
</select></td>
</tr>
<tr>
      <td colspan="3" align="center">
	    <input name="btnedit" type="submit" id="btnedit" value="Modify"> &nbsp; &nbsp;
	   <input name="btndelete" type="submit" id="btndelete"  value="Delete">
      </td>
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
</body>
</html>
