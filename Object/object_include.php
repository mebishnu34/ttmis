<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "..\CSS\db_class.php";
include "..\Processing\db_connection.php";
include "..\database_class\insert_teacher.php";
include "..\database_class\insert_attendance.php";
include "..\database_class\insert_exam.php";
include "..\database_class\insert_mark.php";
include "..\database_class\insert_organization.php";
include "..\database_class\insert_teacher_training.php";
include "..\database_class\insert_training_package.php";
include "..\database_class\insert_user.php";
include "..\database_class\insert_district.php";
//include "..\Object\Save_District.php";
echo "hello";
echo $dn;
echo "h";


//objects
$teacherobject=new teacher();
$attendanceobject=new attendance();
$examobject=new exam();
$markobject=new mark();
$organizationobject=new organization();
$teachertrainingobject=new teachertraining();
$trainingobject=new training();
$userobject=new user();
$districtobject=new district();



?>
