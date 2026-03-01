<?php
ob_start();
session_start();
include("../database/db_connection.php");
$lname=$_POST['txtlname'];
$pass=$_POST['txtpass'];
$sql1="Select memberid,fname, gender, address, email, contact, memphoto, institute, level, faculty, lname, lpass, Remark from tblmember where lname='$lname' and lpass='$pass'";
$result = $conn_1->query($sql1);
if($result->num_rows > 0)
   {
   		//echo "Login Test First";
        $repsql="select remark from tblloginreport where remark='ON' and loginname='$lname'";
		$result2 = $conn_1->query($repsql);
        if($result2->num_rows > 0)
          	{
           	 	header('Location: ../index.php?msg="Multi User Not Allowed"');
			}
		else
			{
				if($row1=$result->fetch_assoc())
					{
						$_SESSION['memberid']=$row1['memberid'];
						$_SESSION['memlname']=$lname;
						$_SESSION['content']=$row1['memphoto'];
						$_SESSION['level']=$row1["level"];
						$_SESSION['faculty']=$row1["faculty"];
						$_SESSION['lname']=$row1["lname"];
						$_SESSION['fname']=$row1["fname"];		
						$_SESSION['subject']="";
						$_SESSION['topic']="";
						$_SESSION['response']="";
						//echo $_SESSION['level'];
						//echo "Login Test";
						//mysqli_query("insert into tblloginreport(username, loginname,level, faculty, logindate, remark) values('$_SESSION[fname]', '$_SESSION[lname]','$_SESSION[level]','$_SESSION[faculty]',now(), 'ON')";
						header('Location: ../member.php');
					}
			}
	}
else
	{
		header('Location: ../index.php?msg="Invalid Login Name or Password"');
	}
?>
