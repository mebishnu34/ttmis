<?php
ob_start();
include("../../php_processing/db_connection.php");
$filename = $_FILES['vfile']['name'];  // name of the uploaded file
$destination = '../video_material/' . $filename;     // destination of the file on the server
$extension = pathinfo($filename, PATHINFO_EXTENSION); // get the file extension
$file = $_FILES['vfile']['tmp_name'];// the physical file on a temporary uploads directory on the server
$size = $_FILES['vfile']['size'];
$category=$_POST['cmbcategory'];
$level=$_POST['cmblevel'];
$subject=$_POST['cmbsubject'];
$topic=$_POST['cmbtopic'];
$resource=$_POST['txtsource'];
$description=$_POST['txtdescription'];
//echo $filename;
//echo "hello";
//echo $extension;
//echo $level;
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
if(!in_array($extension, ['mp4','MP4', 'avi','AVI','mp3','MP3'])) 
	{
    header('Location: ../admin_application.php?msg="Your file extension must be .mp4, or .avi"');
     //echo "Your file extension must be .mp3, or .wav";
    } 
elseif ($_FILES['vfile']['size'] > 100000000) // file shouldn't be larger than 1Megabyte
	{ 
		header('Location: ../admin_application.php?msg="File too large"');
       // echo "File too large!";
    } 
else
  {
  
  	$sql="Select levelid from tbl_video where filename='$filename'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
   		{
			header('Location: ../admin_application.php?msg="Found Duplicate"');
		}
	else
		{
	     if (move_uploaded_file($file, $destination))     // move the uploaded (temporary) file to the specified destination
		 	{
        	 $sql = "INSERT INTO tbl_video (categoryid,levelid, subjectid,topicid,vdescription,vfilename, filesize, destination,vresource,ondate,remarks) VALUES ('$category','$level', '$subject','$topic','$description','$filename', '$size', '$destination','$resource',now(),'Ok')";
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
