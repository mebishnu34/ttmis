<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);
include("../Processing/db_connection.php");
$tid=$_POST['txtid'];
    $scode="";
    $sql1 = "SELECT schoolname FROM tblschool where schoolname='".$_POST['txtschoolname']."' and district='".$_POST['cmbdistrictbagamati']."' and munvdc='".$_POST['cmbmunbagamati']."'";
    $result = $conn->query($sql1);
    if ($result->num_rows==0)
    {
   mysqli_query($conn,"INSERT INTO tblschool(schoolname, schoolcode, address, munvdc, wardno, contact, mobileno, email, website, district, authorizeperson,loginname, spass, remark,importno) values('".$_POST['txtschoolname']."','".$_POST['txtschoolcode']."','".$_POST['cmbdistrictbagamati'].','.$_POST['cmbmunbagamati'].'-'.$_POST['txtschoolward']."','".$_POST['cmbmunbagamati']."','".$_POST['txtschoolward']."','".$_POST['txtmobileNo']."','".$_POST['txtmobileNo']."','".$_POST['txtemail']."','','".$_POST['cmbdistrictbagamati']."','','".$_POST['txtschoolcode']."','".$_POST['txtschoolcode']."','Running','0')");
    }
    $sid = "SELECT schoolcode FROM tblschool where schoolname='".$_POST['txtschoolname']."' and district='".$_POST['cmbdistrictbagamati']."' and munvdc='".$_POST['cmbmunbagamati']."'";
    $reid = $conn->query($sid);
    if ($reid->num_rows > 0)
      {
      if($row1 = $reid->fetch_assoc())
            {
            $scode=$row1['schoolcode'];
            }
      }
    if($scode<>"")
      {
      $sql = "UPdate tblteacher set
      tname='".$_POST['txtteacherName']."',
      citizenship='". $_POST['txtcitizenshipNo'] ."',
      loginname='".$_POST['txtmobileNo']."',
      tpass='".$_POST['txtmobileNo']."',
      fathername='".$_POST['txtfatherName']."',
      address='".$_POST['cmbdistrictnp'].','.$_POST['cmbmunnp'].'-'.$_POST['txtward']."',
      email='".$_POST['txtemail']."',
      province='".$_POST['cmbprovince']."',
      district='".$_POST['cmbdistrictnp']."',
      munvdc='".$_POST['cmbmunnp']."',
      wardno='".$_POST['txtward']."',
      tcontact='".$_POST['txtmobileNo']."',
      appointdate='".$_POST['txtappointdate']."',
      workinglevel='".$_POST['cmbappointlevel']."',
      teachingsubject='".$_POST['cmbappointsubject']."',
      scode='".$scode."',
      schoolname='".$_POST['txtschoolname']."',
      schooladdress='".$_POST['cmbdistrictbagamati'].','.$_POST['cmbmunbagamati'].','.$_POST['txtschoolward']."',
      teachinglevel='".$_POST['cmbappointlevel']."',
      majorsubject='".$_POST['cmbappointsubject']."',
      username='".$_SESSION['uname']."' WHERE teacherid='".$tid."'";
     if (mysqli_query($conn, $sql))
      {
        echo "Update Successfully";
      }
    else
        {
        header('Location: ../error.php?msg='. die("Database Connection Error" .mysqli_error()));
        }
  }
else
  {
  header('Location: ../error.php?msg="School Not exist"');
  }
   
mysqli_close($conn);
?>
