<?php
session_start();
 //include("object_include.php");
include("../Processing/db_connection.php");
$ln=$_POST['txtloginname'];
$up=$_POST['txtpass'];
$_SESSION['$tdate']=$_POST['txtdate'];
if($ln=="" and $up=="")
{
 header('Location: ../teacher_login.php?msg= "Fields Are Required"');
}
else
 {
  $sql1 = "SELECT teacherid,tname, teachercode, tpass, loginname, workinglevel, loginname FROM tblteacher where loginname='$ln' and tpass='$up'";
  $result = $conn->query($sql1);
      if($result->num_rows > 0)
          {
           if($row1 = $result->fetch_assoc())
             {
                $_SESSION['utype']='Teacher';
                $_SESSION['uname']=$row1['tname'];
                $_SESSION['tid']=$row1['teacherid'];
                $_SESSION['password']=$row1['tpass'];
				$_SESSION['memlname']=$row1['loginname'];
				$_SESSION['level']=$row1['workinglevel'];
				$_SESSION['lname']=$row1['loginname'];
				$_SESSION['fname']=$row1['tname'];		
               $_SESSION['token']="TRun";
			   mysqli_query($conn,"INSERT INTO tbllogin(username,loginuser,ldate,remark) values('$_SESSION[uname]','$_SESSION[utype]',now(),'')");
                header('Location: ../user_application.php');
             }
           }
          else
              {
			  //echo  mysqli_error($conn);
                header('Location: ../teacher_login.php?msg= "Wrong Login Name Or Password"');
              }
  }
mysqli_close($conn);
?>
