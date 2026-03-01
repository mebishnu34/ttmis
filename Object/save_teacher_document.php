<?php
session_start();
include("../Processing/db_connection.php");
$tid=$_POST['txttid'];
if($tid>0)
 {
 if (isset($_POST['upload']))
 {
    
    $dname = $_FILES['document']['name'];
    $folder = '../document/' . $dname;
    $extension = pathinfo($dname, PATHINFO_EXTENSION);
    $file = $_FILES['document']['tmp_name'];
    $size = $_FILES['document']['size'];
    if (!in_array($extension, ['zip', 'pdf', 'docx','jpg']))
    {
        header('Location: ../user_application.php?msg= "You file extension must be .zip, .pdf or .docx, .jpg"');
    }
    elseif ($_FILES['document']['size'] > 1000000)
    {  //file shouldn't be larger than 1Megabyte
      //  header('Location: ../user_application.php?msg= "File Too Large"');
    }
    else
    {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $folder))
        {
            
            $sql = "INSERT INTO tblteacherdocument (docname,doctype,document, docsize, teacherid,ondate,remark) VALUES ('$dname','$extension','', '$size','$tid',now(),'Upload')";
            if (mysqli_query($conn, $sql))
            {
                
               header('Location: ../user_application.php?msg= "Upload Successfully"');
               // header('Location: ../municipality_application.php?msg= "Upload Successfully"');
            }
            else
            {
             $message= "save_teacher_document" . $sql . "<br>" . mysqli_error($conn);
             echo $message;
             $mobileno="9851001482";
		    include("sms_code.php");
		    header('Location: ../user_application.php?msg= "Sorry,Try Later..."');
            }
        } 
        else
        {
			$message= "save_teacher_document" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
            header('Location: ../user_application.php?msg= "Sorry,Try Later..."');
        }
    }
}
}
 else
 {
 header('Location: ../user_application.php?msg= "You are not registered"');
 }
?>

