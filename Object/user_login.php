<?php
session_start();
 //include("object_include.php");
include("../Processing/db_connection.php");
$ln=$_POST['txtloginname'];
$up=$_POST['txtpass'];
$_SESSION['$tdate']="";
if($ln<>"" and $up<>"")
  {
    if($_POST["btnteacher"])
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
                header('Location: ../index.php?msg= "Wrong Login Name Or Password"');
              }
      }
      elseif($_POST["btnschool"])
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
                header('Location: ../index.php?msg= "Wrong Login Name Or Password"');
              }
        }
      elseif($_POST["btnpalika"])
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
                header('Location: ../index.php?msg= "Wrong Login Name Or Password"');
                }
        }
    else
      {
      header('Location: ../index.php');
      }
  }
else
  {
    header('Location: ../index.php?msg= "Fields Are Required"');    
  }
mysqli_close($conn);
?>
