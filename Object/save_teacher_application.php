<?php
session_start();
//include("object_include.php");
include("../Processing/db_connection.php");
$citizen=$_POST['txtcitizenshipNo'];
$mobileno=$_POST['txtmobileNo'];
$filename = $_FILES['fileletter']['name'];
$temp_file=$citizen .'_' . $filename;
$letter=$temp_file;
$folderletter = '../application_document/' . $temp_file;
$extensionletter = pathinfo($filename, PATHINFO_EXTENSION);
$fileletter = $_FILES['fileletter']['tmp_name'];
$sizeletter = $_FILES['fileletter']['size'];

$filenamectz = $_FILES['filecitizenship']['name'];
$temp_file=$citizen .'_' . $filenamectz;
$citizenship=$temp_file;
$folderctz = '../application_document/' . $temp_file;
$extensionctz = pathinfo($filenamectz, PATHINFO_EXTENSION);
$filectz = $_FILES['filecitizenship']['tmp_name'];
$sizectz = $_FILES['filecitizenship']['size'];

$filenamerecomend = $_FILES['fileschoolrecommend']['name'];
$temp_file=$citizen .'_' . $filenamerecomend;
$recommend=$temp_file;
$folderrecomend = '../application_document/' . $temp_file;
$extensionrecomend = pathinfo($filenamerecomend, PATHINFO_EXTENSION);
$filerecomend = $_FILES['fileschoolrecommend']['tmp_name'];
$sizerecomend = $_FILES['fileschoolrecommend']['size'];
$sql1 = "SELECT citizenshipno FROM tblapplication where citizenshipno='".$citizen."' OR mobileno='".$mobileno."'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
    {
      $_SESSION['response']="Found Duplicate";
                    header('Location: ../index.php?accountid=application_form');
    }
  else
    {
      if (!in_array($extensionletter, ['PDF', 'JPG','png', 'PNG','pdf','jpg','jpeg']) OR !in_array($extensionctz, ['PDF', 'JPG','png', 'PNG','pdf','jpg','jpeg']) OR !in_array($extensionrecomend, ['PDF', 'JPG','png', 'PNG','pdf','jpg','jpeg']))
        {
          header('Location: ../error.php?msg= "Your file extension must be PDF, JPG वा PNG (Max 5MB"');
        }
      elseif ($sizeletter > 5000000 OR $sizectz>5000000 OR $sizerecomend>5000000)
        { // file shouldn't be larger than 1Megabyte
          header('Location: ../error.php?msg= "File to large"');
    	  }
      else
        {
          if (copy($fileletter, $folderletter) and copy($filectz, $folderctz) and copy($filerecomend,$folderrecomend))
            {
              $sql = "INSERT INTO tblapplication(tname,
                teachercode,
                gender,
                fathername,
                province,
                district,
                munvdc,
                wardno,
                mobileno,
                email,
                citizenshipno,
                issuedistrict,
                appointdate,
                appointmonth,
                appointday,
                appointdistrict,
                appointlocallevel,
                appointsubject,
                bankname,
                bankacno,
                panno,
                schoolname,
                schoolprovince,
                schooldistrict,
                schoollocallevel,
                schoolward,
                trainingcategory,
                trainingsubject,
                priority1model,
                priority2model,
                appointletter,
                citizenship,
                schoolrecommend,
                financialyear,
                remark) values('".$_POST['txtteacherName']."',
                '0',
                'None',
                '".$_POST['txtfatherName']."',
                '".$_POST['cmbprovince']."',
                '".$_POST['cmbdistrictnp']."',
                '".$_POST['cmbmunnp']."',
                '".$_POST['txtward']."',
                '".$_POST['txtmobileNo']."',
                '".$_POST['txtemail']."',
                '".$_POST['txtcitizenshipNo']."',
                '".$_POST['cmbctzissuedistrict']."',
                '".$_POST['txtappointdate']."',
                '".$_POST['cmbappointmonth']."',
                '".$_POST['txtday']."',
                '".$_POST['cmbappointdistrict']."',
                '".$_POST['cmbappointlevel']."',
                '".$_POST['cmbappointsubject']."',
                '".$_POST['txtbankname']."',
                '".$_POST['txtbankacno']."',
                '".$_POST['txtpanNo']."',
                '".$_POST['txtschoolname']."',
                '".$_POST['cmbschoolprovince']."',
                '".$_POST['cmbdistrictbagamati']."',
                '".$_POST['cmbmunbagamati']."',
                '".$_POST['txtschoolward']."',
                '".$_POST['cmbtrainingcategory']."',
                '".$_POST['cmbsubject']."',
                '".$_POST['cmbprioritymode']."',
                '".$_POST['cmbpriority2mode']."',
                '".$letter."',
                '".$citizenship."',
                '".$recommend."',
                '".$_POST['txtfyear']."';
                '')";
                if (mysqli_query($conn, $sql))
                  {
			              $_SESSION['response']="Save Successfully";
                    header('Location: ../index.php?accountid=application_form');
                  }
                else
                  {
                    header('Location: ../error.php?msg='. die("Database Connection Error" .mysqli_error()));
                  }
              }
        }         
    }
mysqli_close($conn);
?>
