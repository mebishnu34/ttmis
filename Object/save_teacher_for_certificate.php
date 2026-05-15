<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);
include("../Processing/db_connection.php");
$mobileno=$_POST['txtmobileNo'];
$citizen=$_POST['txtcitizenshipNo'];
$financial_year=$_POST['cmbyear'];
$trainingrunid=$_POST['cmbtrainingid'];
include("../financial_year.php");
$sql1 = "SELECT citizenship FROM tblteacher where citizenship='".$citizen."' OR tcontact='".$mobileno."'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
    {
      header('Location: ../Admin/registration.php?msg="Found Duplicate"');
    }
else
  {
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
      $sql = "INSERT INTO tblteacher(tname,
      teachercode,
      gender,
      cast,
      mothertong,
      citizenship, 
      sheetroll,
      subject,
      loginname, 
      tpass,
      dob,
      fathername, 
      address, 
      email,
      province,
      district, 
      munvdc, 
      wardno,
      tcontact, 
      appointdate, 
      appointtype,
      workinglevel, 
      teachingsubject, 
      scode,
      schoolname,
      schooladdress,
      category, 
      teachinglevel, 
      qualification, 
      faculty, 
      majorsubject, 
      remark, 
      importno,
      username,
      teachertype,
      stream,
      rank,
      position,
      contact) 
      values('".$_POST['txtteacherName']."',
      '".$_POST['txtcode']."',
      'Gender',
      'cast',
      'mothertong',
      '". $citizen ."',
      '',
      'subject',
      '".$_POST['txtmobileNo']."',
      '".$_POST['txtmobileNo']."',
      '2045/05/06',
      '".$_POST['txtfatherName']."',
      '".$_POST['cmbdistrictnp'].','.$_POST['cmbmunnp'].'-'.$_POST['txtward']."',
      '".$_POST['txtemail']."',
      '".$_POST['cmbprovince']."',
      '".$_POST['cmbdistrictnp']."',
      '".$_POST['cmbmunnp']."',
      '".$_POST['txtward']."',
      '".$_POST['txtmobileNo']."',
      '".$_POST['txtappointdate']."',
      'Appoint Type',
      '".$_POST['cmbappointlevel']."',
      '".$_POST['cmbappointsubject']."',
      '".$scode."',
      '".$_POST['txtschoolname']."',
      '".$_POST['cmbdistrictbagamati'].','.$_POST['cmbmunbagamati'].','.$_POST['txtschoolward']."',
      'category',
      '".$_POST['cmbappointlevel']."',
      'Qualification',
      'Faculty',
      '".$_POST['cmbappointsubject']."',
      'Remark',
      '0',
      '".$_SESSION['uname']."',
      'Teacher',
      'Stream',
      '0',
      'Position',
      '".$_POST['txtmobileNo']."')";
    if (mysqli_query($conn, $sql))
      {
      $sql1 = "SELECT teacherid FROM tblttraining where teacherid='".$_POST['txtcode']."' and runid='".$trainingrunid."'";
      $result = $conn->query($sql1);
      if ($result->num_rows == 0)
        {
          $sql1 = "SELECT id, trainingname, mobileno,subject, coordinator, startdate, enddate,venue,user from tblruntraining where startdate>='".$sdate."' and enddate<='".$edate."' and remark='Running' ORDER BY starttime";
          $result1 = $conn->query($sql1);
          if($result1->num_rows > 0)
            {
              if($row1 = $result1->fetch_assoc())
                  {
                      mysqli_query($conn,"INSERT INTO tblttraining(teacherid, trainingid,runid, schoolcode,munid ,gnumber, coordinator, mobileno, sdate, edate, remark) values('".$_POST['txtcode']."','0','".$trainingrunid."','$scode','0', '1', '".$row1['coordinator']."','".$row1['mobileno']."','".$row1['startdate']."','".$row1['enddate']."','completed')");
                      
                  }
            }
        }
        ?>
      <script>
      //window.opener.location.reload(); // refresh parent page
      window.close();
      </script>
      //header('Location: ../report.php?msg="Save Successfully"');
      <?php
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
}         
mysqli_close($conn);
?>
