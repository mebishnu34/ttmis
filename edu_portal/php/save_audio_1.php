<?php
ob_start();
$filename = $_FILES['audiofile']['name'];  // name of the uploaded file
$destination = 'audio/' . $filename;     // destination of the file on the server
$extension = pathinfo($filename, PATHINFO_EXTENSION); // get the file extension
$file = $_FILES['audiofile']['tmp_name'];// the physical file on a temporary uploads directory on the server
$size = $_FILES['audiofile']['size'];
//echo $filename;
//echo $extension;
//echo $size;
//exit;
include("../database/db_connection.php");
$level=$_POST['cmblevel'];
$faculty=$_POST['cmbfaculty'];
$subject=$_POST['cmbsubject'];

if (file_exists($destination)) 
{
    header('Location: ../Admin/artical/audio_1.php?msg="Sorry, file already exists."');
    $uploadOk = 0;
}
else
{
if(!in_array($extension, ['mp3', 'wav'])) 
	{
    header('Location: ../Admin/index.php?msg="Your file extension must be .mp3, or .wav"');
     //echo "Your file extension must be .mp3, or .wav";
    } 
elseif ($_FILES['audiofile']['size'] > 1000000) // file shouldn't be larger than 1Megabyte
	{ 
		header('Location: ../Admin/article/audio_1.php?msg="File too large"');
       // echo "File too large!";
    } 
else
  {
  
  	$sql="Select level from tblaudio where level='$level' and subject='$subject' and filename='$filename'";
	$result = $conn_1->query($sql);
	if ($result->num_rows > 0)
   		{
			header('Location: ../Admin/artical/audio_1.php?msg="Found Duplicate"');
		}
	else
		{
	     if (move_uploaded_file($file, $destination))     // move the uploaded (temporary) file to the specified destination
		 	{
        	 $sql = "INSERT INTO tblaudio (level, faculty, subject, filename, filesize, destination) VALUES ('$level', '$faculty','$subject','$filename', '$size', '../audio/')";
         	if (mysqli_query($conn_1, $sql)) 
		 		{
                	header('Location: ../Admin/artical/audio_1.php?msg="Save Successfully"');
            	}
			else
				{
					 header('Location: ../Admin/artical/audio_1.php?msg'. mysqli_error($conn_1));
				//echo mysqli_error($conn_1);
				}
        	} 
		else
		 {
           header('Location: ../Admin/artical/audio_1.php?msg="Failed to upload file"');
            //echo "Failed to upload file.";
        }
	}
  }
}
ob_flush();
?>