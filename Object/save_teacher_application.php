<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);
//include("object_include.php");
include("../Processing/db_connection.php");
$citizen=$_POST['txtcitizenshipNo'];
$mobileno=$_POST['txtmobileNo'];
$class=$_POST['cmbclass'];
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

$filenamephoto = $_FILES['filephoto']['name'];
$temp_file=$citizen .'_' . $filenamephoto;
$photo=$temp_file;
$folderphoto= '../application_document/' . $temp_file;
$extensionphoto = pathinfo($filenamephoto, PATHINFO_EXTENSION);
$filephoto = $_FILES['filephoto']['tmp_name'];
$sizephoto = $_FILES['filephoto']['size'];
$recommend="";
$sql1 = "SELECT citizenshipno FROM tblapplication where citizenshipno='".$citizen."' OR mobileno='".$mobileno."'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
    {
      $_SESSION['response']="Found Duplicate";
                    header('Location: ../index.php?accountid=application_form');
    }
  else
    {
      if(isset($_FILES['fileschoolrecommend']))
        {
          $filenamerecomend = $_FILES['fileschoolrecommend']['name'];
          $temp_file=$citizen .'_' . $filenamerecomend;
          $recommend=$temp_file;
          $folderrecomend = '../application_document/' . $temp_file;
          $extensionrecomend = pathinfo($filenamerecomend, PATHINFO_EXTENSION);
          $filerecomend = $_FILES['fileschoolrecommend']['tmp_name'];
          $sizerecomend = $_FILES['fileschoolrecommend']['size'];
          if (!in_array($extensionrecomend, ['PDF','pdf','Pdf']))
            {
              header('Location: ../error.php?msg= "Recomended file must be PDF"');
            }
          elseif ($sizerecomend > 5000000)
            { // file shouldn't be larger than 1Megabyte
             header('Location: ../error.php?msg= "File to large"');
    	      }
          else
            {
              copy($filerecomend,$folderrecomend);
            }
        }
      if (!in_array($extensionletter, ['PDF','pdf','Pdf']) OR !in_array($extensionctz, ['PDF', 'pdf','Pdf']) OR !in_array($extensionphoto, ['JPG','jpg','jpeg','JPEG','Jpg','Jpeg','PNG','png','Png']))
        {
          header('Location: ../error.php?msg= "Your file extension must be PDF"');
        }
      elseif ($sizeletter > 5000000 OR $sizectz>5000000 OR $sizephoto>5000000)
        { // file shouldn't be larger than 1Megabyte
          header('Location: ../error.php?msg= "File to large"');
    	  }
      else
        {
          if (copy($fileletter, $folderletter) and copy($filectz, $folderctz) and copy($filephoto,$folderphoto))
            {
              $sql = "INSERT INTO tblapplication(tname,
                teachercode,
		runtrainingid,
		groupnumber,
                gender,
                teacherdob,
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
                acholdername,
                bankacno,
                panno,
                teacherclass,
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
                passportphoto,
                financialyear,
                remark) values('".$_POST['txtteacherName']."',
                '0',
		'0',
		'0',
                '".$_POST['optgender']."',
                '".$_POST['txtdob']."',
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
                '".$_POST['txtaccountholder']."',
                '".$_POST['txtbankacno']."',
                '".$_POST['txtpanNo']."',
                '".$class."',
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
                '".$photo."',
                '".$_POST['txtfyear']."',
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
