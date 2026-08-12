<?php
session_start();
//include("object_include.php");
//echo "Name".$_SESSION['training']."<br>";
//echo "level".$_SESSION['level']."<br>";
//echo "Subject" .$_SESSION['subject']."<br>";
//echo "Start Date".$_SESSION['sdate']."<br>";
//echo "End Date" .$_SESSION['edate']."<br>";
//echo "Remark" .$_SESSION['remark']."<br>";
include("../Processing/db_connection.php");
//exit;
//$attendanceobject->saveattendance($tra, $tn, $t, $r, $od);
//echo "Records Saved";
if($_SESSION['training']=="" and $_SESSION['level']=="" and $_SESSION['subject']=="" and $_SESSION['sdate']=="" and $_SESSION['edate']=="")
{
 header('Location: ../Admin/create.php?msg="Fields Are Required"');
}
else
{

     $rem=$_POST['rem'];
	$i=0;
 	$k=0;
foreach($rem as $rems)
	{
	$teacherid[$k]=$rems;
	//echo $teacherid[$k];
 	$k++;
	}
 for($d=0; $d<$k;$d++)
	{
	echo $teacherid[$d].$scode[$d];
	echo "<br>";
	if($teacherid[$d]<>"")
        {
              $sql1 = "SELECT * FROM tblttraining where startdate='$_SESSION[sdate]' and enddate='$_SESSION[edate]' and teacherid='$teacherid[$d]' and trainingname='$_SESSION[training]' and subject='$_SESSION[subject]'";
              $result = $conn->query($sql1);
              if ($result->num_rows > 0)
                 {
                 // header('Location: ../Admin/create.php?msg="Already Exist"');
                 }
              else
               {
              $sql="SELECT * FROM tblteacher where teacherid='$teacherid[$d]'";
              $result1 = mysqli_query($conn,$sql);
              while($row1 = mysqli_fetch_array($result1))
              {
              $scode=$row1["schoolcode"];
               }
               $sql = "INSERT INTO tblttraining(teacherid,schoolcode, trainingname, subject, trainingnumber, level, startdate, enddate,trainingvenue, gnumber, coordinator, ongoing, remark) values('$teacherid[$d]','$scode', '$_SESSION[training]', '$_SESSION[subject]', '$tn','$_SESSION[level]','$_SESSION[sdate]','$_SESSION[edate]','$_SESSION[venue]','$_SESSION[gnumber]','$_SESSION[coordinator]','Running','$_SESSION[remark]')";
                if (mysqli_query($conn, $sql))
                {
                header('Location: ../Admin/create.php?msg= "Saved Successfully"');
                }
              else
              {
              $message= "accept_for_tranining" . $sql . "<br>" . mysqli_error($conn);
		  	  $mobileno="9851001482";
		      include("sms_code.php");
			  header('Location: ../Admin/create.php?msg= "Sorry, Try Later..."');
              }
              }
        }
  }
 }
mysqli_close($conn);
?>
