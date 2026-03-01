<?php
session_start();
//error_reporting(E_ALL);
//include("object_include.php");
include("../Processing/db_connection.php");
$ln=$_POST['txtloginname'];
$up=$_POST['txtpass'];
$_SESSION['$tdate']=$_POST['txtdate'];
//echo $_SESSION['csrf'];
//echo "hello";
//echo "<br>";
//echo $_POST['csrf1'];
//$t="@123";
if(isset($_POST['login']))
{
    
   if($_SESSION['csrf']==$_POST['csrf1'])
  //  if($t=="@123")
        {
        if($ln=="" and $up=="")
            {
                header('Location: ../index.php?msg= "Fields Are Required"');
            }
        else
            {
                $sql1 = "SELECT utype,uname, upass,remark FROM tbluser where loginname='$ln' and upass='$up'";
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
                            //$_SESSION['$a']="Nepal From Do Login";
                            //echo $_SESSION['lname'];
                            //echo $_SESSION['token'];
                            //echo "Do Login";
                            //echo $_SESSION['$a'];
                            if($_SESSION['utype']=="Administrator")
                                {
				                mysqli_query($conn,"INSERT INTO tbllogin(username,loginuser,ldate,remark) values('$_SESSION[uname]','$_SESSION[utype]',now(),'')");
                               header('Location: ../Admin/admin_application.php');
                                }
                            else
                            {
				                mysqli_query($conn,"INSERT INTO tbllogin(username,loginuser,ldate,remark) values('$_SESSION[uname]','$_SESSION[utype]',now(),'')");
                                header('Location: ../normal_application.php');
                            }
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
