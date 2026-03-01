<?php
session_start();
//include("object_include.php");
include("../Processing/db_connection.php");
$access=$_POST['cmbusefor'];
$docname=$_POST['txtname'];
$filename = $_FILES['document1']['name'];
$temp_file=$_SESSION['lname'].'_'.$filename;
$folder = '../document/' . $temp_file;
$extension = pathinfo($filename, PATHINFO_EXTENSION);
$file = $_FILES['document1']['tmp_name'];
$size = $_FILES['document1']['size'];
//echo $extension;
//exit;
if (!in_array($extension, ['zip', 'pdf','Pdf', 'docx','xlsx','jpg']))
    {
     header('Location: error.php?msg= "Your file extension must be .zip, .pdf or .docx or .xlsx, .jpg"');
    }
 elseif ($size > 5000000)
        { // file shouldn't be larger than 1Megabyte
        header('Location: error.php?msg= "File to large"');
    	}
 else
   {
    if (move_uploaded_file($file, $folder))
       {
		    $sql = "INSERT INTO tbladmin_document(username,document_name,file_name,document_file,submitdate,updatedate,remark,comment,accessby) values('$_SESSION[lname]','$docname','$temp_file','$file',now(),now(),'Upload','','$access')";
       		if (mysqli_query($conn, $sql))
         		{
			    	header('Location: ../Admin/entry.php?msg= "Your Document Saved Successfully"');
				
          		}
      		else 
          		{
		  			//$message= "New_Account" . $sql . "<br>" . mysqli_error($conn);
		  			//$mobileno="9851001482";
		  			//include("sms_code.php");
          			//header('Location: ../consultancy.php?msg= "Sorry, Try Later..."');
					//echo $message;
					//echo "Hello";
					
					header('Location: ../Admin/entry.php?msg= "Thank You, Try Later on..."');
          		}
	
  			}
	}
mysqli_close($conn);
?>
