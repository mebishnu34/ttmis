<?php
session_start();
error_reporting(E_ALL);
ini_set('displa_errors',1);
include("../Processing/db_connection.php");
if(isset($_GET['tid']))
{
$_SESSION['trainingid']=$_GET['tid'];
$district="काभ्रेपलाञ्चोक";
$municipality="धुलिखेल";
$scode=0;
$startdate="";
$enddate="";
$venu="";
$subject="";
$trainingdays="";
$training="";
$schoolname="";
$teachername="";
$traingyear=2082;

    $schoolname="........................................";
   $teachername="....................................................";
   $munvdc="............";
$rid=0;
$cosql = "SELECT ID,coordinator, schoolcode, sdate, runid,certificatenumber,registernumber FROM tblttraining where ID='".$_SESSION['trainingid']."'";
$co = $conn->query($cosql);
if ($co->num_rows > 0)
   {
    if($corow = $co->fetch_assoc())
    {
         $rid=$corow["runid"];
         $coordinator=$corow["coordinator"];
         $scode=$corow["schoolcode"];
         $traingyear=substr($corow["sdate"],0,4);
         $certificateno=$corow["certificatenumber"];
         $regno=$corow["registernumber"];

    }
}
$sql = "SELECT trainingname, level, subject, startdate, enddate, venue, trainingdays, financialyear FROM tblruntraining where id='".$rid."'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    if($row = $result->fetch_assoc())
    {
        $training= $row["trainingname"];
        $level= $row["level"];
         $subject=$row["subject"];
         $startdate=$row["startdate"];
         $enddate= $row["enddate"];
         $venu=$row["venue"];
         $trainingdays=$row["trainingdays"];
         $fyear=$row["financialyear"];
        
        }
    }


$sql1 = "SELECT tname, munvdc, fathername,province, district,wardno,citizenship FROM tblteacher where teachercode='".$_SESSION['teacherid']."'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0)
   {
    if($row1 = $result1->fetch_assoc())
    {
        $munvdc= $row1["munvdc"];
        $teachername= $row1["tname"];
        $fathername=$row1["fathername"];
        $district=$row1["district"];
        $province=$row1["province"];
        $wardno=$row1["wardno"];
        $citizenshipno=$row1["citizenship"];
         
    }
    }
if($fathername=="")
    {
        $fathername="बुबाकाे नाम हुनु पर्ने";
    }
$sql2 = "SELECT schoolname, address,district FROM tblschool where schoolcode='$scode'";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0)
   {
    while($row2 = $result2->fetch_assoc())
    {
        $schoolname= $row2["schoolname"];
        $schooladdress= $row2["address"];
        $schooldistrict= $row2["district"];

    }
    }
$printdate=$_SESSION['$tdate'];

?>
<!--
<form action="print_certificate_1.php" method="Post">
    <div align="center">
        Training Type : <select name="cmbtraining">
                                <option>TPD</option>
                                <option>In Service</option>
                                <option>One Month</option>
                        </select>
    </div>
        <br>
    <div align="center">
        Model : <input type="radio" value="M1" name="optmodel"> Format-1 <input type="radio" value="M2" name="optmodel"  checked> Format-2
    <div>
        <br>
    <div align="center">
        <input type="Submit" value="PRINT" name="btncertificate">
</div>
</form>
-->
<?php
//echo $training;
if($training=="एक महिने प्रमाणीकरण तालिम (TPD)")
    {
      include("one_month_certificate_4.php");
    }
elseif($training=="सेवा प्रवेश तालिम" OR $training=="सेवाकालिन")
    {
        include("sewa_prabesh_certificate_4.php");
        
    }
elseif($training=="पुनर्ताजगी" OR $training="नेतृत्व तथा व्यवस्थापन" OR $training=="शिक्षक पेशागत विकास")
    {
        include("tpd_certificate_4.php");
    }
else
    {
        include("sewa_prabesh_certificate_4.php");
    }
if($_SESSION['trainingid']>0)
    {
        $today=date("Y-m-d");
mysqli_query($conn,"INSERT INTO tblprintdetails(trainingname,trainingid,teacherid,scode,schooldistrict,printby,printdate,trainingyear,certificateno) values('".$training."','".$_SESSION['trainingid']."','".$_SESSION['teacherid']."','".$scode."','".$schooldistrict."','".$_SESSION['uname']."','".$today."','".$fyear."','0')");
mysqli_query($conn,"UPDATE tblttraining set certificate='Printed' where ID='".$_SESSION['trainingid']."'");
    }

}
?>

