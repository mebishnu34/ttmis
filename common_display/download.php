<?php
include("../Processing/db_connection.php");
if (isset($_GET['teacher_id']))
{
    $id = $_GET['teacher_id'];
    // fetch file to download from database
    $sql = "SELECT docname,doctype FROM tblteacherdocument WHERE ID=$id";
    $result = mysqli_query($conn, $sql);
    $file =mysqli_fetch_assoc($result);
    $extension=$file['doctype'];
    $filepath = '../document/' . urldecode($file['docname']);
       // echo $filepath;
    if (file_exists($filepath))
    {
        header('Content-Description: File Transfer');
        if($extension=="pdf")
        {
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename=' . basename($filepath));
        }
        else
        {
            header('Content-Type: application/octet-stream');  
            header('Content-Disposition: attachment; filename=' . basename($filepath)); 
        }
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
       header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        ob_clean();
        flush();
        readfile($filepath);
     }
}
elseif (isset($_GET['school_id']))
{
    $id = $_GET['school_id'];
    // fetch file to download from database
    $sql = "SELECT docname,doctype FROM tblschooldocument WHERE ID=$id";
    $result = mysqli_query($conn, $sql);
    $file =mysqli_fetch_assoc($result);
    $extension=$file['doctype'];
    $filepath = '../schooldocument/' . urldecode($file['docname']);
       // echo $filepath;
    if (file_exists($filepath))
    {
        header('Content-Description: File Transfer');
        if($extension=="pdf")
        {
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename=' . basename($filepath));
        }
        else
        {
            header('Content-Type: application/octet-stream');  
            header('Content-Disposition: attachment; filename=' . basename($filepath)); 
        }
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
       header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        ob_clean();
        flush();
        readfile($filepath);
     }

}


?>
