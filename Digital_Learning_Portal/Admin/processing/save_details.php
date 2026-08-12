<?php
ob_start();
session_start();
include("../../php_processing/db_connection.php");

//echo $_SESSION['level'];
//echo $_SESSION['subject'];
//echo $_SESSION['category'];
//echo $_SESSION['topic'];

$sql1="Select levelid, levelname from tbllevel where levelname='$_SESSION[level]'";
$result=$conn->query($sql1);
if($result->num_rows>0)
	{
	if($data=$result->fetch_assoc())
	{
		$levelid=$data["levelid"];
	}
}
$sql2="Select id,categoryname from tbl_catagory where categoryname='$_SESSION[category]'";
$result1=$conn->query($sql2);
if($result1->num_rows>0)
{
	if($data3=$result1->fetch_assoc())
	{
	$categoryid= $data3["id"];
	}
}
$sql="Select subjectid, subject from tblsubject where subject='$_SESSION[subject]'";
$rownum=$conn->query($sql);
if($rownum->num_rows>0)
{
	if($data1=$rownum->fetch_assoc())
		{
			$subjectid=$data1["subjectid"];
		}
}
$sql="Select id, content_topic from tbltopic where content_topic='$_SESSION[topic]'";
$rownum1=$conn->query($sql);
if($rownum1->num_rows>0)
{
	if($data2=$rownum1->fetch_assoc())
		{
			$topicid=$data2["id"];
		}
}
$heading=$_POST['txtheading'];
$details=$_POST['txtdetails'];
/*
echo "<br>level";
echo $levelid;
echo "<br>category";
echo $categoryid;
echo "<br>subject";
echo $subjectid;
echo "<br>topic";
echo $topicid;
exit;
*/
if($categoryid<>0 and $levelid<>0 and $subjectid<>0 and $topicid<>0)
{
$sql="Select subheading from tbl_contents where categoryid='$categoryid' and levelid='$levelid' and subjectid='$subjectid' and topicid='$topicid' and subheading='$heading'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
	{
		header('Location: ../add_subject_details_1.php?msg="Duplicate Heading"');
	}
else
	{
		$sql="Insert into tbl_contents(categoryid, levelid, subjectid,topicid,subheading,contentdetails,ondate, remark) 
		values('$categoryid','$levelid','$subjectid','$topicid','$heading','$details', now(), 'OK')";
		if(!mysqli_query($conn,$sql))
			{
			header('Location: ../add_subject_details_1.php?msg=' . mysqli_error($conn));
			//echo mysqli_error($conn);
			}
		else
			{
			header('Location: ../add_subject_details_1.php?msg="Save Successfully"');
			}
	}
}
else
{
	header('Location: ../add_subject_details_1.php?msg="Some Fields Are Missing"');
}
ob_flush();
?>