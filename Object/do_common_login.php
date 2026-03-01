<?php
session_start();
//include("object_include.php");
include("../Processing/db_connection.php");
$ln=$_POST['txtloginname'];
$up=$_POST['txtpass'];
$_SESSION['$tdate']=$_POST['txtdate'];
if(isset($_POST['login']))
{
    if($_SESSION['csrf']==$_POST['csrf1'])
    {
   if($ln=="" and $up=="")
    {
    header('Location: ../index.php?msg= "Fields Are Required"');
    }
    else
    {
    $sql1 = "SELECT utype,uname, upass,remark FROM tbluser where loginname='$ln' and upass='$up' and (utype='Normal' OR utype='Administrator' OR utype='Other' OR utype='LGovt')";
    $result = $conn->query($sql1);
          if ($result->num_rows > 0)
          {
           if($row1 = $result->fetch_assoc())
             {
                $_SESSION['utype']=$row1['utype'];
                $_SESSION['uname']=$row1['uname'];
                $_SESSION['password']=$row1['upass'];
				$_SESSION['lname']=$ln;
                $_SESSION['token']="Run";
				mysqli_query($conn,"INSERT INTO tbllogin(username,loginuser,ldate,remark) values('$_SESSION[uname]','$_SESSION[utype]',now(),'')");
                header('Location: ../common_report.php');
             }
           }
          else
              {
                header('Location: ../index.php?msg= "Wrong Login Name Or Password"');
              }
     }
            
    }
    else
     {
        header('Location: ../index.php?msg= "Worng Token"');
        
     }
     
}
else
     {
        header('Location: ../index.php?msg= "Click on Login"');
     }
mysqli_close($conn);
?>
