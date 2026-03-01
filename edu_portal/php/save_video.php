<?php
ob_start();
include("../database/db_connection.php");
$filename = $_FILES['vfile']['name'];  // name of the uploaded file
$destination = '../video/' . $filename;     // destination of the file on the server
$extension = pathinfo($filename, PATHINFO_EXTENSION); // get the file extension
$file = $_FILES['vfile']['tmp_name'];// the physical file on a temporary uploads directory on the server
$size = $_FILES['vfile']['size'];
$level=$_POST['cmblevel'];
$faculty=$_POST['cmbfaculty'];
$subject=$_POST['cmbsubject'];
//echo $filename;
//echo "hello";
//echo $extension;
//exit;
if (file_exists($destination))
{
  //echo "Sorry, file already exists.";
  header('Location: ../Admin/index.php?msg="Sorry, File is already exist"');
  $uploadOk = 0;
}
else
{
if(!in_array($extension, ['mp4', 'avi','mp3'])) 
	{
    header('Location: ../Admin/index.php?msg="Your file extension must be .mp4, or .avi"');
     //echo "Your file extension must be .mp3, or .wav";
    } 
elseif ($_FILES['vfile']['size'] > 10000000) // file shouldn't be larger than 1Megabyte
	{ 
		header('Location: ../Admin/index.php?msg="File too large"');
       // echo "File too large!";
    } 
else
  {
  
  	$sql="Select level from tblvideo where level='$level' and subject='$subject' and filename='$filename'";
	$result = $conn_1->query($sql);
	if ($result->num_rows > 0)
   		{
			header('Location: ../Admin/index.php?msg="Found Duplicate"');
		}
	else
		{
	     if (move_uploaded_file($file, $destination))     // move the uploaded (temporary) file to the specified destination
		 	{
        	 $sql = "INSERT INTO tblvideo (level, faculty, subject, filename, filesize, destination) VALUES ('$level', '$faculty','$subject','$filename', '$size', '../video/')";
         	if (mysqli_query($conn_1, $sql)) 
		 		{
                	header('Location: ../Admin/index.php?msg="Save Successfully"');
            	}
			else
				{
					 header('Location: ../Admin/index.php?msg'. mysqli_error($conn_1));
				//echo mysqli_error($conn_1);
				}
        	} 
		else
		 {
           header('Location: ../Admin/index.php?msg="Failed to upload file"');
            //echo "Failed to upload file.";
        }
	}
  }
}
ob_flush();
?>
