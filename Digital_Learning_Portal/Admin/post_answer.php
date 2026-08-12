<?php
session_start();
include("header.php");
if($_SESSION['level']=="वालविकास केन्द्र")
	 	{
		$id=$_GET['que'];
		$sql="select queid, subject, queby, topic, question, ondate, remark from tblsixque where queid=$id";
	 	$rownum=$conn_1->query($sql);
		if($rownum->num_rows>0)
			{
			if($data=$rownum->fetch_assoc())
				{
				 $question=$data["question"];
				}
			}
		}
elseif($_SESSION['level']=="आधारभूत (१ –५)")
		{
		$id=$_GET['que'];
	 	$sql="select queid, subject, queby, topic, question, ondate, remark from tblsixque where queid=$id";
	 	$rownum=$conn_1->query($sql);
		if($rownum->num_rows>0)
			{
			if($data=$rownum->fetch_assoc())
				{
				 $question=$data["question"];
				}
			}
		}
	elseif($_SESSION['level']=="आधारभूत (६ –८)")
		{
		$id=$_GET['que'];
	 	$sql="select queid, subject, queby, topic, question, ondate, remark from tblsixque where queid=$id";
	 	$rownum=$conn_1->query($sql);
		if($rownum->num_rows>0)
			{
			if($data=$rownum->fetch_assoc())
				{
				 $question=$data["question"];
				}
			}
		}
	elseif($_SESSION['level']=="माध्यमिक(९ –१०)")
		{
		$id=$_GET['que'];
	 	$sql="select queid, subject, queby, topic, question, ondate, remark from tblhigherque where queid=$id";
	 	$rownum=$conn_1->query($sql);
		if($rownum->num_rows>0)
			{
			if($data=$rownum->fetch_assoc())
				{
				 $question=$data["question"];
				}
			}
		}
	elseif($_SESSION['level']=="माध्यमिक(११ –१२)")
		{
		$id=$_GET['que'];
	 	$sql="select queid, subject, queby, topic, question, ondate, remark from tblsixque where queid=$id";
	 	$rownum=$conn_1->query($sql);
		if($rownum->num_rows>0)
			{
			if($data=$rownum->fetch_assoc())
				{
				 $question=$data["question"];
				}
			}
		}
	elseif($_SESSION['level']=="प्रधानाध्यापक (आधारभूत)")
		{
		$id=$_GET['que'];
	 	$sql="select queid, subject, queby, topic, question, ondate, remark from tblsixque where queid=$id";
	 	$rownum=$conn_1->query($sql);
		if($rownum->num_rows>0)
			{
			if($data=$rownum->fetch_assoc())
				{
				 $question=$data["question"];
				}
			}
		}
	elseif($_SESSION['level']=="प्रधानाध्यापक (माध्यमिक)")
		{
		$id=$_GET['que'];
	 	$sql="select queid, subject, queby, topic, question, ondate, remark from tblsixque where queid=$id";
	 	$rownum=$conn_1->query($sql);
		if($rownum->num_rows>0)
			{
			if($data=$rownum->fetch_assoc())
				{
				 $question=$data["question"];
				}
			}
		}
?>
<body>
<form action="../php/save_answer.php" method="post" enctype="multipart/form-data">
<table width="1000" border="1" cellpadding="10" align="center">
<tr>
<td align="center"><font color="#0000FF" size="+3"><b>Answer By: <?php echo $_SESSION['fname']; ?><input type="hidden" name="txtlname" value="<?php echo $_SESSION['fname'];?>"></b></font></td>
</tr>
<tr>
<td>
<input type="hidden" name="txtqueid" value="<?php echo $_GET['que'];?>"> 
<?php echo $question;?>
</td>
</tr>
<tr>
<td align="center">
<?php
include("../fckeditor/fckeditor.php") ;
  $oFCKeditor = new FCKeditor(txtanswer);
  $oFCKeditor->BasePath = "../fckeditor/";
  $oFCKeditor->Value    = "";
  $oFCKeditor->Width    = 800;
  $oFCKeditor->Height   = 400;
  echo $oFCKeditor->CreateHtml();
  //echo "<textarea name="txtanswer" cols="120" rows="10"></textarea>"
 ?>


</td>
</tr>
<tr>
<td colspan="4" align="center"><input type="submit" value="Save"></td>
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
