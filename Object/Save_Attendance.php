<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$tra=$_POST['cmbtraining'];
$tn=$_POST['cmbnumber'];
$od=$_POST['txtdate'];
//$attendanceobject->saveattendance($tra, $tn, $t, $r, $od);
//echo "Records Saved";
if($od=="")
{
 header('Location: ../Admin/entry.php?msg="Fields Are Required"');
}
else
{
    $tid=$_POST['tid1'];
    $rem=$_POST['rem'];
	$i=0;
	foreach($tid as $t)
	{
	$teacherid[$i]=$t;
    $i++;
	}
	$k=0;
	foreach($rem as $rems)
	{
	$remark[$k]=$rems;
	$k++;
	}
    for($d=0; $d<$k;$d++)
	{
              $sql1 = "SELECT * FROM tblattendance where ondate='$od' and teacherid='$teacherid[$d]' and trainingnumber='$tn'";
              $result = $conn->query($sql1);
              if ($result->num_rows > 0)
                 {
                  header('Location: ../Admin/entry.php?msg="Found Duplicate"');
                 }
              else
               {
                $sql = "INSERT INTO tblattendance(trainingid,trainingnumber, teacherid, remark, ondate) values('$tra', '$tn', '$teacherid[$d]', '$remark[$d]', '$od')";
                if (mysqli_query($conn, $sql))
                {
                header('Location: ../Admin/entry.php?msg= "Saved Successfully"');
                }
              else
              {
              $message= "Save_Attendance:" . $sql . "<br>" . mysqli_error($conn);
		  	  $mobileno="9851001482";
		      include("sms_code.php");
			  header('Location: ../Admin/entry.php?msg= "Sorry, Try Later..."');
              }
              }
  }
 }
mysqli_close($conn);
?>
