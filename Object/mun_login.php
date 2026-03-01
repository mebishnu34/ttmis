<?php
session_start();
 //include("object_include.php");
include("../Processing/db_connection.php");
$ln=$_POST['txtloginname'];
$up=$_POST['txtpass'];
$_SESSION['$tdate']=$_POST['txtdate'];
if($ln=="" and $up=="")
{
 header('Location: ../mun_login.php?msg= "Fields Are Required"');
}
else
 {
  $sql1 = "SELECT * FROM tbldistrict where mobileno='$ln' and mpass='$up'";
  $result = $conn->query($sql1);
          if ($result->num_rows > 0)
          {
           if($row1 = $result->fetch_assoc())
             {
                $_SESSION['utype']='LGovt';
                $_SESSION['uname']=$row1['munvdc'];
                $_SESSION['dname']=$row1['districtname'];
				$_SESSION['authorize']=$row1['aperson'];
				$_SESSION['mobile']=$row1['mobileno'];
                $_SESSION['tid']=$row1['ID'];
                $_SESSION['password']=$row1['mpass'];
                $_SESSION['token']="MRun";
				mysqli_query($conn,"INSERT INTO tbllogin(username,loginuser,ldate,remark) values('$_SESSION[uname]','$_SESSION[utype]',now(),'')");
                header('Location: ../municipality_application.php');
            }
           }
          else
              {
                header('Location: ../mun_login.php?msg= "Wrong Login Name Or Password"');
              }
  }
mysqli_close($conn);
?>
