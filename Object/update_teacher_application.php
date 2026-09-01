<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);
//include("object_include.php");
include("../Processing/db_connection.php");
/*
$citizen=$_POST['txtcitizenshipNo'];
$mobileno=$_POST['txtmobileNo'];
$class=$_POST['cmbclass'];
$filename = $_FILES['fileletter']['name'];
$temp_file=$mobileno .'_' . $filename;
$letter=$temp_file;
$folderletter = '../application_document/' . $temp_file;
$extensionletter = pathinfo($filename, PATHINFO_EXTENSION);
$fileletter = $_FILES['fileletter']['tmp_name'];
$sizeletter = $_FILES['fileletter']['size'];

$filenamectz = $_FILES['filecitizenship']['name'];
$temp_file=$mobileno .'_' . $filenamectz;
$citizenship=$temp_file;
$folderctz = '../application_document/' . $temp_file;
$extensionctz = pathinfo($filenamectz, PATHINFO_EXTENSION);
$filectz = $_FILES['filecitizenship']['tmp_name'];
$sizectz = $_FILES['filecitizenship']['size'];

$filenamephoto = $_FILES['filephoto']['name'];
$temp_file=$mobileno .'_' . $filenamephoto;
$photo=$temp_file;
$folderphoto= '../application_document/' . $temp_file;
$extensionphoto = pathinfo($filenamephoto, PATHINFO_EXTENSION);
$filephoto = $_FILES['filephoto']['tmp_name'];
$sizephoto = $_FILES['filephoto']['size'];
$recommend="";

     if(isset($_FILES['fileschoolrecommend']))
        {
          $filenamerecomend = $_FILES['fileschoolrecommend']['name'];
          $temp_file=$mobileno .'_' . $filenamerecomend;
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
    */
              $sql = "UPDATE tblapplication set 
              tname='".$_POST['txtteacherName']."',
                teachercode='0',
          		  runtrainingid='0',
		            groupnumber='0',
                gender='".$_POST['optgender']."',
                teacherdob='".$_POST['txtdob']."',
                fathername='".$_POST['txtfatherName']."',
                province='".$_POST['cmbprovince']."',
                district='".$_POST['cmbdistrictnp']."',
                munvdc='".$_POST['cmbmunnp']."',
                wardno='".$_POST['txtward']."',
                mobileno='".$_POST['txtmobileNo']."',
                email='".$_POST['txtemail']."',
                citizenshipno='".$_POST['txtcitizenshipNo']."',
                issuedistrict='".$_POST['cmbctzissuedistrict']."',
                appointdate='".$_POST['txtappointdate']."',
                appointmonth='".$_POST['cmbappointmonth']."',
                appointday='".$_POST['txtday']."',
                praappointdate='".$_POST['txtpraappointmiti']."',
                appointdistrict='".$_POST['cmbappointdistrict']."',
                appointlocallevel='".$_POST['cmbappointlevel']."',
                appointsubject='".$_POST['cmbappointsubject']."',
                bankname='".$_POST['txtbankname']."',
                acholdername='".$_POST['txtaccountholder']."',
                bankacno='".$_POST['txtbankacno']."',
                panno='".$_POST['txtpanNo']."',
                teacherclass='".$class."',
                schoolname='".$_POST['txtschoolname']."',
                schoolprovince='".$_POST['cmbschoolprovince']."',
                schooldistrict='".$_POST['cmbdistrictbagamati']."',
                schoollocallevel='".$_POST['cmbmunbagamati']."',
                schoolward='".$_POST['txtschoolward']."'
                where appid='".$_POST['txtapplicationid']."'";
                if (mysqli_query($conn, $sql))
                  {
			              $_SESSION['response']="Update Successfully";
                    ?>
                    <script>
                      window.close();
                    </script>
                    <?php
                  }
                else
                  {
                    header('Location: ../error.php?msg='. die("Database Connection Error" .mysqli_error()));
                  }
mysqli_close($conn);
?>
