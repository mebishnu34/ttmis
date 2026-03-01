<?php
session_start();
 //include("object_include.php");
include("../Processing/db_connection.php");
$ln=$_POST['txtloginname'];
$up=$_POST['txtpass'];
$_SESSION['$tdate']=$_POST['txtdate'];
if($ln=="" and $up=="")
{
 header('Location: ../school_login.php?msg= "Fields Are Required"');
}
else
 {
  $sql1 = "SELECT schoolname, schoolcode,authorizeperson,mobileno,spass,munvdc,district,address FROM tblschool where loginname='$ln' and spass='$up'";
  $result = $conn->query($sql1);
          if ($result->num_rows > 0)
          {
           if($row1 = $result->fetch_assoc())
             {
                $_SESSION['utype']='School';
                $_SESSION['uname']=$row1['schoolname'];
				$_SESSION['schooladdress']=$row1['address'];
                $_SESSION['code']=$row1['schoolcode'];
				 $_SESSION['schoolpalika']=$row1['munvdc'];
                $_SESSION['schooldistrict']=$row1['district'];
				$_SESSION['head']=$row1['authorizeperson'];
				$_SESSION['mobileno']=$row1['mobileno'];
                $_SESSION['password']=$row1['spass'];
                $_SESSION['token']="SRun";
				mysqli_query($conn,"INSERT INTO tbllogin(username,loginuser,ldate,remark) values('$_SESSION[uname]','$_SESSION[utype]',now(),'')");
                header('Location: ../school_application.php');
             }
           }
          else
              {
                header('Location: ../school_login.php?msg= "Wrong Login Name Or Password"');
              }
  }
mysqli_close($conn);
?>
