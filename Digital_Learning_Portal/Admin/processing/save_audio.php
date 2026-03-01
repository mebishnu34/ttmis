<?php
ob_start();
include("../../php_processing/db_connection.php");
$filename = $_FILES['afile']['name'];  // name of the uploaded file
$destination = '../audio_material/' . $filename;     // destination of the file on the server
$extension = pathinfo($filename, PATHINFO_EXTENSION); // get the file extension
$file = $_FILES['afile']['tmp_name'];// the physical file on a temporary uploads directory on the server
$size = $_FILES['afile']['size'];
$category=$_POST['cmbcategory'];
$level=$_POST['cmblevel'];
$subject=$_POST['cmbsubject'];
$topic=$_POST['cmbtopic'];
$resource=$_POST['txtsource'];
$description=$_POST['txtdescription'];

//echo $filename;
//echo "hello";
//echo $extension;
//echo $destination;
//exit;
if (file_exists($destination))
{
  //echo "Sorry, file already exists.";
  
  header('Location: ../admin_application.php?msg="Sorry, File is already exist"');
  $uploadOk = 0;
   
}
else
{
if(!in_array($extension, ['wav','mp3'])) 
	{
    header('Location: ../admin_application.php?msg="Your file extension must be .wav, or .mp3"');
     //echo "Your file extension must be .mp3, or .wav";
    } 
elseif ($_FILES['afile']['size'] > 100000000) // file shouldn't be larger than 1Megabyte
	{ 
		header('Location: ../admin_application.php?msg="File too large"');
       // echo "File too large!";
    } 
else
  {
  
  	$sql="Select levelid from tbl_audio where filename='$filename'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
   		{
			header('Location: ../admin_application.php?msg="Found Duplicate"');
		}
	else
		{
	     if (move_uploaded_file($file, $destination))     // move the uploaded (temporary) file to the specified destination
		 	{
        	 $sql = "INSERT INTO tbl_audio (categoryid,levelid, subjectid,topicid,adescription,afilename, filesize, destination,aresourse,ondate,remarks) VALUES ('$category','$level', '$subject','$topic','$description','$filename', '$size', '$destination','$resource',now(),'Ok')";
         	if (mysqli_query($conn, $sql)) 
		 		{
                	header('Location: ../admin_application.php?msg="Save Successfully"');
            	}
			else
				{
					 //header('Location: ../admin_application.php?msg'. mysqli_error($conn));
				echo mysqli_error($conn);
				}
        	} 
		else
		 {
           header('Location: ../admin_application.php?msg="Failed to upload file"');
            //echo "Failed to upload file.";
        }
	}
  }
}
ob_flush();
?>
