<?php
ob_start();
session_start();
if($_SESSION['utype']<>"Administrator")
	{
		header('Location: index.php?msg="You have not previllage"');
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
include("../../database/db_connection.php");
if(isset($_GET['linkid']))

	{
		$id= $_GET['linkid'];
		$sql="Select articleid, writername, subject, topic, source, indexno, article from tblarticle where articleid='$id'";
		$rownum=$conn->query($sql);
		
	}
if(isset($_GET['dlinkid']))
	{
		echo "Group ID " .$_GET['dlinkid'] ." For Delete";
		$id= $_GET['dlinkid'];
		$sql="Select articleid, writername, subject, topic, source, indexno, article from tblarticle where articleid='$id'";
		$rownum=$conn->query($sql);
	}
if(isset($_POST['btnedit']))
	{
		if($_POST['txtaid']<>"" && $_POST['txtwname']<>"" && $_POST['txtsubject']<>"" &&$_POST['article']<>"")
			{
				$sql="Update tblarticle set subject='$_POST[txtsubject]', topic='$_POST[txttopic]', source='$_POST[txtsource]', indexno='$_POST[txtindex]', article='$_POST[article]' where articleid='$_POST[txtaid]'";
				if(!mysqli_query($conn,$sql))
					{
					header('Location: ../index.php?msg'. mysqli_error($conn));
					}
				else
					{
					header('Location: ../index.php?msg="Successfully Eedited"');
					}
			}
		else
			{
				header('Location: ../index.php?msg="Asterisk Fields are Required"');

			}
	}
if(isset($_POST['btndelete']))
	{
	$sql="Delete from tblarticle where articleid='$_POST[txtaid]'";
	if(!mysqli_query($conn,$sql))
			{
				header('Location: ../index.php?msg'. mysqli_error($conn));
			}
		else
			{
				header('Location: ../index.php?msg="Successfully Deleted"');
			}
	}
		
?>
<form name="form1" method="post" action="writerarticle_Action.php">
<?php
if($rownum->num_rows>0)
{
	if($data=$rownum->fetch_assoc())
	{
	?>
  <table width="90%" border="0" cellspacing="5" cellpadding="0" align="center">
   <tr>
      <td>Article ID</td>
      <td>&nbsp;</td>
      <td><input name="txtaid" type="text"  readonly="True" value="<?php echo $data["articleid"];?>"></td>
    </tr>
    <tr>
      <td>Name of Writer</td>
      <td>&nbsp;</td>
      <td><input name="txtwname" type="text" readonly="True"  value="<?php echo $data["writername"];?>" size="40"></td>
    </tr>
      <tr>
	   <td>Subject</td>
	  <td>&nbsp;</td>
      <td><input name="txtsubject" type="text" value="<?php echo $data["subject"];?>" size="40"></td>
       </tr>
	    <tr>
	   <td>Topic</td>
	  <td>&nbsp;</td>
      <td><input name="txttopic" type="text" value="<?php echo $data["topic"];?>" size="40"></td>
       </tr>
	  <tr>
	   <td>Source</td>
	  <td>&nbsp;</td>
      <td><input name="txtsource" type="text" value="<?php echo $data["source"];?>" size="40"></td>
       </tr>
	  <tr>
	   <td>Index No.</td>
	  <td>&nbsp;</td>
      <td><input name="txtindex" type="text" value="<?php echo $data["indexno"];?>"></td>
       </tr>
	    <tr>
      <td valign="top">Article</td>
      <td>&nbsp;</td>
      <td>
	   <?php
  include("../../fckeditor/fckeditor.php") ;
  $oFCKeditor = new FCKeditor("article");
  $oFCKeditor->BasePath = "../../FCKeditor/";
  $oFCKeditor->Value    = $data["article"];
  $oFCKeditor->Width    = 800;
  $oFCKeditor->Height   = 300;
  echo $oFCKeditor->CreateHtml();
  
 ?>
        
      </div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">
       <input name="btnedit" type="submit" id="btnedit" <?php if(isset($_GET['dlinkid'])) { ?> disabled <?php }?> value="Modify"> &nbsp; &nbsp;
	   <input name="btndelete" type="submit" id="btndelete"  <?php if(isset($_GET['linkid'])) { ?> disabled <?php }?> value="Delete">
      </div></td>
    </tr>
  </table>
</form>
<?php
}
}
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
