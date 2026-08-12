<?php
ob_start();
session_start();
include("../Processing/db_connection.php");
$documentid=$_POST["document"];
/* Single File Download
foreach($documentid as $documentids)
	{
	$sql = "SELECT document_id,document_name, file_name, submitdate FROM tbldocument where document_id= '$documentids'";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
   	{
    	while($row1 = $result->fetch_assoc())
        {
	
		    $file="../document/".$row1["file_name"];
			//echo $file ."<br>";
			if(file_exists($file))
			{
				
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename="' . basename($file).'"');
				header('Expires:0');
				header('Cache-Control: must-revalidate');
				header('pragma:public');
				header('Content-Length: ' .Filesize($file));
				ob_clean();
    	 	   flush();
				readfile($file);
				//echo $file;
			}
			
		}
	}
	
}
*/
//Multi Files Download with zip file
$zip = new ZipArchive(); // Load zip library 
//$zip_name = time().".zip"; // Zip name
$zip_name=$_SESSION['lname'].".zip";
$file_folder="../document/";
if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE)
	{ 
	 // Opening zip file to load files
	$error .= "* Sorry ZIP creation failed at this time";
	}
foreach($documentid as $documentids)
	{
	$sql = "SELECT document_id,document_name, file_name, submitdate FROM tbladmin_document where document_id= '$documentids'";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
   	{
    	if($row1 = $result->fetch_assoc())
		//foreach($post['files'] as $file)
        {
		//echo $row1["file_name"]. "<br>";
		if($row1["file_name"]<>"")
			{
			$zip->addFile($file_folder.$row1["file_name"]); // Adding files into zip
			}
		}

	}
	}
$zip->close();
if(file_exists($zip_name))
	{
	// push to download the zip
	header('Content-type: application/zip');
	header('Content-Disposition: attachment; filename="'.$zip_name.'"');
	readfile($zip_name);
// remove zip file is exists in temp path
	unlink($zip_name);
	}
ob_flush();
?>
