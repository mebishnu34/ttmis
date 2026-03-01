<?php
session_start();
include("../Processing/db_connection.php");
$tid=$_SESSION['code'];
if($tid<>"")
 {
   
 if (isset($_POST['upload']))
 {
     
    $dname = $_FILES['document']['name'];
    $folder = '../schooldocument/' . $dname;
    $extension = pathinfo($dname, PATHINFO_EXTENSION);
    $file = $_FILES['document']['tmp_name'];
    $size = $_FILES['document']['size'];
    if (!in_array($extension, ['zip', 'pdf', 'docx','jpg']))
    {
        header('Location: ../school_application.php?msg= "You file extension must be .zip, .pdf or .docx, .jpg"');
         
    }
    elseif ($_FILES['document']['size'] > 1000000)
    { // file shouldn't be larger than 1Megabyte
        header('Location: ../school_application.php?msg= "File Too Large"');
    }
    else
    {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $folder))
        {
            
            $sql = "INSERT INTO tblschooldocument (docname,doctype, docsize, schoolcode,document, ondate,remark) VALUES ('$dname','$extension', '$size','$tid','',now(),'Upload')";
            if (mysqli_query($conn, $sql))
            {
                
                header('Location: ../school_application.php?msg= "Upload Successfully"');
            }
             else
            {
			$message= "Save_school_document" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		     header('Location: ../school_application.php?msg= "Sorry, Try Later..."');
             }
        }
        else
        {
			$message= "Save_school_document" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  header('Location: ../school_application.php?msg= "Sorry,Try Later..."');
        }
    }
}
}
 else
 {
 header('Location: ../school_application.php?msg= "You are not registered"');
 }
?>

