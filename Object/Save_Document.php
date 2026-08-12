<?php
include("../Processing/db_connection.php");
 $dname=$_POST['txtname'];
 $tid=$_POST['txttid'];
 $traid=$_POST['cmbtraining'];
 $tn=$_POST['txttnumber'];
 $filename = $_FILES['document']['name'];
 $folder = '../document/' . $filename;
 $extension = pathinfo($filename, PATHINFO_EXTENSION);
 $file = $_FILES['document']['tmp_name'];
 $size = $_FILES['document']['size'];
 if($tid>0)
 {
 if (!in_array($extension, ['zip', 'pdf', 'docx','xlsx','jpg']))
    {
     header('Location: ../application.php?msg= "Your file extension must be .zip, .pdf or .docx or .xlsx, .jpg"');
    }
 elseif ($_FILES['myfile']['size'] > 1000000)
        { // file shouldn't be larger than 1Megabyte
        header('Location: ../application.php?msg= "File to large"');
    }
 else
   {
    if (move_uploaded_file($file, $folder))
       {
          $sql = "INSERT INTO tbldocument (docname, doctype, docsize, document, teacherid, trainingid, trainingnumber) VALUES ('$dname','$extension','$size','$file','$tid','$traid','$tn')";
            if (mysqli_query($conn, $sql))
            {
                header('Location: ../application.php?msg= "Saved Successfully"');
            }
        }
     else
         {
		 	$message= "Save_Document: " . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
            header('Location: ../application.php?msg= "Sorry, Try Latter..."');
         }
    }
 }
 else
 {
 header('Location: ../application.php?msg= "You are not registered"');
 }
?>

