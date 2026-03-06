<?php
session_start();
if($_SESSION['username']=="")
	{
		header('Location: admin_application.php');
	}
include("../php_processing/db_connection.php");
if($_GET['id'])
	{
		$id=$_GET['id'];
		$topic="";
		$subject="";
		$category="";
		$level="";
		$faculty="";
		$postby="";
		$source="";
		$sql="Select id, categoryid,topicid, levelid, subjectid,contentdetails,subheading, ondate from tbl_contents where id='$id'";
		$result=$conn->query($sql);
		if($data=$result->fetch_assoc())
			{
			$heading=$data["subheading"];
			$details=$data["contentdetails"];
			$sql="Select content_topic from tbltopic where id='$data[topicid]'";
			$rownum=$conn->query($sql);
			if($rownum->num_rows>0)
				{
				if($data1=$rownum->fetch_assoc())
					{
						$topic=$data1["content_topic"];
						
					}
				}
			}
			$sql1="Select id, categoryname from tbl_catagory where id='$data[categoryid]'";
			$resultc=$conn->query($sql1);
			if($resultc->num_rows>0)
				{
					if($datac=$resultc->fetch_assoc())
						{
							$category=$datac["categoryname"];
						}
				}
			$sql1="Select levelid, levelname from tbllevel where levelid='$data[levelid]'";
			$resultl=$conn->query($sql1);
			if($resultl->num_rows>0)
				{
					if($datal=$resultl->fetch_assoc())
						{
							$level=$datal["levelname"];
						}
				}
            $sql1="Select subjectid, subject from tblsubject where subjectid='$data[subjectid]'";
            $resultc=$conn->query($sql1);
            if($resultc->num_rows>0)
                {
                if($datac=$resultc->fetch_assoc())
                    {
                        $subject=$datac["subject"];
                        
                    }
                }
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Add Details</title>
</head>
<body>
<form action="processing/update_details.php" method="post" enctype="multipart/form-data">
<table width="1000" border="1" cellpadding="10" align="center">
<tr>
<td>Level :</td>
<td><input type="hidden" name="txtid" value="<?php echo $id;?>" readonly="true"><input type="text" name="txtlevel" value="<?php echo $level;?>" readonly="true"></td>
<td>Faculty :</td>
<td><input type="text" name="txtfaculty" value="<?php echo $faculty;?>" readonly="true"></td>
</tr>
<tr>
<td>Subject :</td>
<td><input type="text" name="txtsubject" value="<?php echo $subject;?>" readonly="true"></td>
<td>Post By:</td>
<td><input type="text" name="txtpost" value="<?php echo $postby;?>"></td>
</tr>
<tr>
<td>Source</td>
<td colspan="3"><input type="text" name="txtsource" size="40" value="<?php echo "$source";?>"></td>
</tr>
<tr>
<td>Topic</td>
<td><input type="text" name="txttopic" size="40" value="<?php echo "$topic";?>"></td>
<td>Image</td>
<td><input type="file" name="image"></td>
</tr>
<tr>
<td colspan="4" align="center"><font color="#0000FF" size="+3"><b>Details</b></font></td>
</tr>
<tr>
<td colspan="4" align="center">
<?php
include("../fckeditor/fckeditor.php") ;
  $oFCKeditor = new FCKeditor('txtdetails');
  $oFCKeditor->BasePath = "../FCKeditor/";
  $oFCKeditor->Value    = $details;
  $oFCKeditor->Width    = 800;
  $oFCKeditor->Height   = 400;
  echo $oFCKeditor->CreateHtml();
  //echo "<textarea name=txtdetails cols=120 rows=10></textarea>"
 ?>
</td>
</tr>
<tr>
<td colspan="4" align="center"><input type="submit" value="Update"></td>
</tr>
</table>
</form>
<?php
if($_GET['msg'])
	{
		echo $_GET['msg'];
	}
?>
</body>
</html>
