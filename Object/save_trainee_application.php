<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$citizen=$_POST['txtcitizenshipno'];
$filename = $_FILES['filecv']['name'];
$temp_file=$citizen .'_' . $filename;
$cv=$temp_file;
$foldercv = '../application_document/' . $temp_file;
$extensioncv = pathinfo($filename, PATHINFO_EXTENSION);
$filecv = $_FILES['filecv']['tmp_name'];
$sizecv = $_FILES['filecv']['size'];

$filename = $_FILES['filequalification']['name'];
$temp_file=$citizen .'_' . $filename;
$qualifile=$temp_file;
$folderqualification = '../application_document/' . $temp_file;
$extensionqualification = pathinfo($filename, PATHINFO_EXTENSION);
$filequalification = $_FILES['filequalification']['tmp_name'];
$sizequalification = $_FILES['filequalification']['size'];

$sql1 = "SELECT citizenshipno FROM tbltrainee where citizenshipno='".$citizen."'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
    {
      header('Location: error.php?msg= "Alerady Exist"');      
    }
  else
    {
      if (!in_array($extensioncv, ['PDF', 'JPG','png', 'PNG','pdf','jpg','jpeg']) OR !in_array($extensionqualification, ['PDF', 'JPG','png', 'PNG','pdf','jpg','jpeg']))
        {
          header('Location: ../error.php?msg= "Your file extension must be PDF, JPG वा PNG (Max 5MB"');
        }
      elseif ($sizecv > 5000000 OR $sizequalification>5000000)
        { // file shouldn't be larger than 1Megabyte
          header('Location: ../error.php?msg= "File to large"');
    	  }
      else
        {
          if (copy($filecv, $foldercv) and copy($filequalification, $folderqualification))
            {
              $sql = "INSERT INTO tbltrainee(traineename,
                 traineecast,
                mobileno,
                email,
                traineeaddress,
                currentaddress,
                qualification,
                position,
                workingoffice,
                citizenshipno,
                bankname,
                bankac,
                panno,
                trainingname,
                trainingsubject,
                cvfilename,
                qualifilename,
                remark) values('".$_POST['txtname']."',
                '".$_POST['txtcast']."',
                '".$_POST['txtmobileno']."',
                '".$_POST['txtemail']."',
                '".$_POST['txtaddress']."',
                '".$_POST['txtcurrentaddress']."',
                '".$_POST['txtqualification']."',
                '".$_POST['optcondition']."',
                '".$_POST['txtoffice']."',
                '".$_POST['txtcitizenshipno']."',
                '".$_POST['txtbankname']."',
                '".$_POST['txtbankacno']."',
                '".$_POST['txtpanno']."',
                '".$_POST['txttraining']."',
                '".$_POST['txtsubject']."',
                '".$cv."',
                '". $qualifile ."',
                '')";
                if (mysqli_query($conn, $sql))
                  {
			              header('Location: ../index.php?msg= "Saved Successfully"');
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
