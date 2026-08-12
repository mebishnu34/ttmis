<?php
session_start();
//include("object_include.php");
include("../Processing/db_connection.php");
$trainingid=$_SESSION['trainingid'];
$t=$_POST['txtcode'];
$tname=$_POST['txtname'];
$regular=$_POST['txtregu'];
$creative=$_POST['txtcreative'];
$written=$_POST['txtwritten'];
$planning=$_POST['txtplanning'];
$step=$_POST['cmbstep'];
$step1="";
if($step=='पहिलो')
{
  $step1="P1";
}
elseif($step=='दोस्रो')
{
  $step1="P2";
}
elseif($step=='तेस्रो')
{
  $step1="P3";
}
if($t=="" and $trainingid=="")
{
header('Location: ../Admin/entry.php?msg="Fields Are Required"');
}
else
{
  $i=0;
  $j=0;
  $k=0;
  $m=0;
  $n=0;
  $p=0;
  foreach($t as $tc)
  {
    $tcode[$i]=$tc;
    $i++;
  }

  foreach($tname as $name)
  {
    $teacher[$j]=$name;
    $j++;
  }

  foreach($regular as $regulars)
  {
    $regularmark[$k]=$regulars;
    $k++;
  }

  foreach($creative as $creatives)
  {
    $creativemark[$m]=$creatives;
    $m++;
  }

  foreach($written as $writtens)
  {
    $writtenmark[$n]=$writtens;
    $n++;
  }

  foreach($planning as $plannings)
  {
    $planningmark[$p]=$plannings;
    $p++;
  }
  for($d=0;$d<$p;$d++)
  {
    
   $sql1 = "SELECT tcode FROM tbltpd where tpdstep='$step1' and tcode='$tcode[$d]' and tsubject='$_SESSION[subs]'";
   $result = $conn->query($sql1);
           if ($result->num_rows > 0)
           {
           $sql = "Update tbltpd set regularatten='$regularmark[$d]',creative='$creativemark[$d]',written='$writtenmark[$d]', planning='$planningmark[$d]'  where trainingstep='$step' and tcode='$tcode[$d]' and tsubject='$_SESSION[subs]'";
             if (mysqli_query($conn, $sql))
              {
                 header('Location: ../Admin/entry.php?msg= "Update Successfully"');
              }
             else
              {
                  $message= "Save_Mark:" . $sql . "<br>" . mysqli_error($conn);
		              $mobileno="9851001482";
		              include("sms_code.php");
                  echo $message;
		            //header('Location: ../Input/teacher_training_running.php?msg= "Sorry, Try Later..."');
             }
           }
           else
           {
              $district="";
              $lgov="";        
              $sql1 = "SELECT district,munvdc,schoolname FROM tblteacher where teachercode='$tcode[$d]'";
              $result1 = $conn->query($sql1);
              if ($result1->num_rows > 0)
              {
                if($row2 = $result1->fetch_assoc())
                {
                  $district=$row2["district"];
                  $lgov=$row2["munvdc"];
                  $sname=$row2["schoolname"];
                }
              }
              
              $sql = "INSERT INTO tbltpd(tcode,tcodes, tname, teacherlevel, schoolname, district, logov, regularatten, creative, written, planning, trainingstep, tpdtype, tpdstep, tsubject, trainingdate, closingdate, fyear, trainingvenue, facilitator, remark) values('0','$tcode[$d]','$teacher[$d]','$_SESSION[level]','$sname','$district','$lgov','$regularmark[$d]','$creativemark[$d]','$writtenmark[$d]','$planningmark[$d]','$step','P','$step1','$_SESSION[subs]','$_SESSION[sdate]','$_SESSION[edate]','2080/081','$_SESSION[venu]','$_SESSION[facilator]','')";
              if (mysqli_query($conn, $sql))
                {
                header('Location: ../Admin/entry.php?msg= "Saved Successfully"');
                }
                else
                {
                $message= "Save_Mark:" . $sql . "<br>" . mysqli_error($conn);
		        $mobileno="9851001482";
		        include("sms_code.php");
                    echo $message;
		       // header('Location: ../Input/teacher_training_running.php?msg= "Sorry, Try Later..."');
                }
           
           }
    
   }
}
mysqli_close($conn);
?>
