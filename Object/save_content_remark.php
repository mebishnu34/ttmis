<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$application=$_POST['optapplication'];
$roster=$_POST['optroster'];
$customize=$_POST['optcustomize'];
$aitraining=$_POST['optai'];
$sql = "SELECT remark FROM tblcontents where contenttitle='Training Application'";
$result = $conn->query($sql);
    if ($result->num_rows > 0)
        {
            mysqli_query($conn,"Update tblcontents set remark='".$application."' where contenttitle='Training Application'");
        }
        else
        {
            mysqli_query($conn,"INSERT INTO tblcontents(contenttitle,remark) VALUES('Training Application','".$application."')");
        }

$sql = "SELECT remark FROM tblcontents where contenttitle='Roster'";
$result = $conn->query($sql);
    if ($result->num_rows > 0)
        {
            mysqli_query($conn,"Update tblcontents set remark='".$roster."' where contenttitle='Roster'");
        }
        else
        {
            mysqli_query($conn,"INSERT INTO tblcontents(contenttitle,remark) VALUES('Roster','".$roster."')");
        }
$sql = "SELECT remark FROM tblcontents where contenttitle='Customize Training'";
$result = $conn->query($sql);
    if ($result->num_rows > 0)
        {
            mysqli_query($conn,"Update tblcontents set remark='".$customize."' where contenttitle='Customize Training'");
        }
        else
        {
            mysqli_query($conn,"INSERT INTO tblcontents(contenttitle,remark) VALUES('Customize Training','".$customize."')");
        }


$sql = "SELECT remark FROM tblcontents where contenttitle='AI Training'";
$result = $conn->query($sql);
    if ($result->num_rows > 0)
        {
            mysqli_query($conn,"Update tblcontents set remark='".$aitraining."' where contenttitle='AI Training'");
        }
        else
        {
            mysqli_query($conn,"INSERT INTO tblcontents(contenttitle,remark) VALUES('AI Training','".$aitraining."')");
        }
header('Location: ../Admin/registration_1.php?msg= "Update Successfully"');
mysqli_close($conn);
?>
