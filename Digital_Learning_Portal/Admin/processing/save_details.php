<?php
ob_start();
session_start();
include("../../php_processing/db_connection.php");
/*
echo $_SESSION['level'];
echo $_SESSION['subject'];
echo $_SESSION['category'];
echo $_SESSION['topic'];
*/
$sql1="Select id, levelname from tbllevel where levelname='$_SESSION[level]'";
$result=$conn->query($sql1);
if($result->num_rows>0)
	{
	if($data=$result->fetch_assoc())
	{
		$level=$data["id"];
	}
}
$sql2="Select id,categoryname from tbl_catagory where categoryname='$_SESSION[category]'";
$result1=$conn->query($sql2);
if($result1->num_rows>0)
{
	if($data3=$result1->fetch_assoc())
	{
	$category= $data3["id"];
	}
}
$sql="Select id, subjectname from tbl_subject where subjectname='$_SESSION[subject]'";
$rownum=$conn->query($sql);
if($rownum->num_rows>0)
{
	if($data1=$rownum->fetch_assoc())
		{
			$subject=$data1["id"];
		}
}
$sql="Select id, content_topic from tbltopic where content_topic='$_SESSION[topic]'";
$rownum1=$conn->query($sql);
if($rownum1->num_rows>0)
{
	if($data2=$rownum1->fetch_assoc())
		{
			$topic=$data2["id"];
		}
}
$heading=$_POST['txtheading'];
$details=$_POST['txtdetails'];
/*
echo "<br>";
echo $level;
echo $category;
echo $subject;
echo $topic;
exit;
*/
if($category>0 and $level>0 and $subject>0 and $topic>0)
{
$sql="Select subheading from tbl_contents where categoryid='$category' and levelid='$level' and subjectid='$subject' and topicid='$topic' and subheading='$heading'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
	{
		header('Location: ../add_subject_details_1.php?msg="Duplicate Heading"');
	}
else
	{
		$sql="Insert into tbl_contents(categoryid, levelid, subjectid,topicid,subheading,contentdetails,ondate, remark) 
		values('$category','$level','$subject','$topic','$heading','$details', now(), 'OK')";
		if(!mysqli_query($conn,$sql))
			{
			header('Location: ../add_subject_details_1.php?msg=' . mysqli_error($conn));
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