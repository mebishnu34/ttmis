<?php
session_start();
//include("object_include.php");
include("../Processing/db_connection.php");
$trainingid=$_SESSION['trainingid'];
$t=$_POST['txtcode'];
$tname=$_POST['txtname'];
$regular=$_POST['txtregu'];
$creative=$_POST['txtcreative'];
$rules=$_POST['txtrules'];
$comitment=$_POST['txtcomitment'];
$written=$_POST['txtwritten'];
$planning=$_POST['txtplanning'];
$completion=$_POST['txtcompletion'];
$report=$_POST['txtreport'];
$presentation=$_POST['txtpresentation'];

if($t=="" and $trainingid=="")
{
header('Location: ../Admin/entry.php?msg="Fields Are Required"');
}
else
{
  $i=0;
  foreach($t as $tc)
  {
    $tcode[$i]=$tc;
    $i++;
  }
$j=0;
  foreach($tname as $name)
  {
    $teacher[$j]=$name;
    $j++;
  }
  $k=0;
  foreach($regular as $regulars)
  {
    $regularmark[$k]=$regulars;
    $k++;
  }
$m=0;
  foreach($creative as $creatives)
  {
    $creativemark[$m]=$creatives;
    $m++;
  }
$r=0;
  foreach($rules as $rule)
  {
    $rulesmark[$r]=$rule;
    //echo $rulesmark[$r];
    $r++;
  }
$c=0;
  foreach($comitment as $comitments)
  {
    $comitmentmark[$c]=$comitments;
    //echo $comitmentmark[$c];
    $c++;
  }
$n=0;
  foreach($written as $writtens)
  {
    $writtenmark[$n]=$writtens;
    $n++;
  }
$p=0;
  foreach($planning as $plannings)
  {
    $planningmark[$p]=$plannings;
//    echo $planningmark[$p];
    $p++;
  }

  $cm=0;
  foreach($completion as $completions)
  {
    $completionmark[$cm]=$completions;
  //  echo $completionmark[$cm];
    $cm++;
  }
$re=0;
  foreach($report as $reports)  
  {
    $reportmark[$re]=$reports;
    //echo $reportmark[$re];
    $re++;
  }
$pr=0;
  foreach($presentation as $presentations)  
  {
    $presentationmark[$pr]=$presentations;
    //echo $presentationmark[$pr];
    $pr++;
  }
for($d=0;$d<$i;$d++)
  {
   $sql1 = "SELECT tcode FROM tbltpd where (tcode='$tcode[$d]' or tcodes='$tcode[$d]') and tsubject='$_SESSION[subs]' and fyear='".$_SESSION['fyear']."'";
   $result = $conn->query($sql1);
           if ($result->num_rows > 0)
           {
           $sql = "Update tbltpd set regularatten='$regularmark[$d]',creative='$creativemark[$d]',followrules='$rulesmark[$d]',comitment='$comitmentmark[$d]',written='$writtenmark[$d]', planning='$planningmark[$d]',workcomplete='$completionmark[$d]',reporting='$reportmark[$d]',present='$presentationmark[$d]'  where (tcode='$tcode[$d]' or tcodes='$tcode[$d]') and tsubject='$_SESSION[subs]' and fyear='".$_SESSION['fyear']."'";
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
             // echo $completionmark[$d].'-'.$reportmark[$d].'-'.$presentationmark[$d];
              
              $sql = "INSERT INTO tbltpd(tcode,tcodes, tname, teacherlevel, schoolname, district, logov, regularatten, creative,followrules, comitment, written, planning, workcomplete, reporting, present, trainingstep, tpdtype, tpdstep, tsubject, trainingdate, closingdate, fyear, trainingvenue, facilitator, remark) values('0','$tcode[$d]','$teacher[$d]','$_SESSION[level]','$sname','$district','$lgov','$regularmark[$d]','$creativemark[$d]','$rulesmark[$d]','$comitmentmark[$d]','$writtenmark[$d]','$planningmark[$d]','$completionmark[$d]','$reportmark[$d]','$presentationmark[$d]','$step','P','$step1','$_SESSION[subs]','$_SESSION[sdate]','$_SESSION[edate]','$_SESSION[fyear]','$_SESSION[venu]','$_SESSION[facilator]','')";
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
