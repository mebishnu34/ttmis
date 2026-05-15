<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$application=$_POST['optapplication'];
$roster=$_POST['optroster'];
$customize=$_POST['optcustomize'];
mysqli_query($conn,"Update tblcontents set remark='".$application."' where contenttitle='Training Application'");
mysqli_query($conn,"Update tblcontents set remark='".$roster."' where contenttitle='Roster'");
mysqli_query($conn,"Update tblcontents set remark='".$customize."' where contenttitle='Customize Training'");
header('Location: ../Admin/registration_1.php?msg= "Update Successfully"');
mysqli_close($conn);
?>
