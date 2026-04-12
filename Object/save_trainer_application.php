<?php
session_start();
//include("object_include.php");
include("../Processing/db_connection.php");
//$citizen=$_POST['txtcitizenshipno'];
$mobileno=$_POST['txtmobileno'];

$ctz="";
$photo="";
$filename = $_FILES['filecitizenship']['name'];
$temp_file=$mobileno .'_' . $filename;
$ctz=$temp_file;
$folderctz = '../application_document/' . $temp_file;
$extensionctz = pathinfo($filename, PATHINFO_EXTENSION);
$filectz = $_FILES['filecitizenship']['tmp_name'];
$sizectz = $_FILES['filecitizenship']['size'];



$filename = $_FILES['filecv']['name'];
$temp_file=$mobileno .'_' . $filename;
$cv=$temp_file;
$foldercv = '../application_document/' . $temp_file;
$extensioncv = pathinfo($filename, PATHINFO_EXTENSION);
$filecv = $_FILES['filecv']['tmp_name'];
$sizecv = $_FILES['filecv']['size'];

$filename = $_FILES['filequalification']['name'];
$temp_file=$mobileno .'_' . $filename;
$qualifile=$temp_file;
$folderqualification = '../application_document/' . $temp_file;
$extensionqualification = pathinfo($filename, PATHINFO_EXTENSION);
$filequalification = $_FILES['filequalification']['tmp_name'];
$sizequalification = $_FILES['filequalification']['size'];

$filename = $_FILES['filephpto']['name'];
$temp_file=$mobileno .'_' . $filename;
$photo=$temp_file;
$folderphoto = '../application_document/' . $temp_file;
$extensionphoto = pathinfo($filename, PATHINFO_EXTENSION);
$filephoto = $_FILES['filephpto']['tmp_name'];
$sizephoto = $_FILES['filephpto']['size'];

$sql1 = "SELECT mobileno FROM tbltrainee where mobileno='".$mobileno."'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
    {
      $_SESSION['response']="Found Duplicate";
                    header('Location: ../index.php?accountid=roster_form');
    }
  else
    {
      if (!in_array($extensionctz, ['PDF', 'JPG','png', 'PNG','pdf','jpg','jpeg']) OR !in_array($extensioncv, ['PDF', 'JPG','png', 'PNG','pdf','jpg','jpeg']) OR !in_array($extensionqualification, ['PDF', 'JPG','png', 'PNG','pdf','jpg','jpeg']) OR !in_array($extensionphoto, ['PDF', 'JPG','png', 'PNG','pdf','jpg','jpeg']))
        {
          header('Location: ../error.php?msg= "Your file extension must be PDF, JPG वा PNG (Max 5MB"');
        }
      elseif ($sizectz > 5000000 OR $sizecv > 5000000 OR $sizequalification>5000000 OR $sizephoto>5000000)
        { // file shouldn't be larger than 1Megabyte
          header('Location: ../error.php?msg= "File to large"');
    	  }
      else
        {
          if (copy($ctz, $folderctz) and copy($filecv, $foldercv) and copy($filequalification, $folderqualification) and copy($photo, $folderphoto))
            {
              $sql = "INSERT INTO tbltrainee(traineename,
                 trainerengname,
                 trainergender,
                mobileno,
                email,
                traineeaddress,
                currentaddress,
                trainerpublish,
                qualification,
                position,
                workingoffice,
                citizenshipno,
                bankname,
                bankac,
                panno,
                trainingname,
                trainingsubject,
                citizenship,
                cvfilename,
                qualifilename,
                trainerphoto,
                remark) values('".$_POST['txtname']."',
                '".$_POST['txtengname']."',
                '".$_POST['optgender']."',
                '".$_POST['txtmobileno']."',
                '".$_POST['txtemail']."',
                '".$_POST['txtaddress']."',
                '".$_POST['txtcurrentaddress']."',
                '".$_POST['txtpublished']."',
                '',
                '',
                '',
                '".$citizen."',
                '',
                '',
                '',
                '',
                '',
                '".$ctz."',
                '".$cv."',
                '". $qualifile ."',
                '". $photo ."',
                '')";
                if (mysqli_query($conn, $sql))
                  {
                    $sql = "SELECT traineeid FROM tbltrainee where citizenshipno='".$citizen."'";
                    $result = mysqli_query($conn, $sql);       
                    if (mysqli_num_rows($result) > 0) 
                        {
                        if($row = mysqli_fetch_assoc($result))
                            {
                            $trainerid=$row["traineeid"];
                            }
                        }
                    if($trainerid>0)
                      {
                          $training=$_POST["txttraining"];
                          $period=$_POST["txtperiod"];
                          $org=$_POST["txttrainingorg"];
                          $tyear=$_POST["txttrainingyear"];
                          $i=0;
                          foreach($training as $trainings)
                            {
                                $trainingname[$i]=$trainings;
                                $i++;
                            }
                          $j=0;
                          foreach($period as $periods)
                            {
                                $trainingperiod[$j]=$periods;
                                $j++;
                            }
                          $k=0;
                          foreach($org as $orgs)
                            {
                              $trainingorg[$k]=$orgs;
                              $k++;
                            }
                          $l=0;
                          foreach($tyear as $tyears)
                            {
                                $trainingyear[$l]=$tyears;
                                $l++;
                            }
                          
                            for($d=0;$d<$k;$d++)
                                {
                                  mysqli_query($conn,"INSERT INTO tbltrainertraining(trainerid, trainingname, trainingperiod, organization, traiingyear, remark) values('".$trainerid."','".$trainingname[$d]."','".$trainingperiod[$d]."','".$trainingorg[$d]."','".$trainingyear[$d]."','')");
                                }

                        //Qualification

                        $qualification=$_POST["txtqualification"];
                          $subject=$_POST["txtsubject"];
                          $board=$_POST["txtboard"];
                          $qualiyear=$_POST["txtyear"];
                          $grade=$_POST["txtgrade"];
                          $i=0;
                          foreach($qualification as $qualifications)
                            {
                                $trainerquali[$i]=$qualifications;
                                $i++;
                            }
                          $j=0;
                          foreach($subject as $subjects)
                            {
                                $subs[$j]=$subjects;
                                $j++;
                            }
                          $k=0;
                          foreach($board as $boards)
                            {
                              $qualiboard[$k]=$boards;
                              $k++;
                            }
                          $l=0;
                          foreach($qualiyear as $qualiyears)
                            {
                                $qualificationyear[$l]=$qualiyears;
                                $l++;
                            }
                          $m=0;
                          foreach($grade as $grades)
                            {
                                $qualigrade[$m]=$grades;
                                $m++;
                            }
                            for($d=0;$d<$m;$d++)
                                {
                                  mysqli_query($conn,"INSERT INTO tbltrainerqualification(trainerid,qualification, trainersubject, university, passedyear, grade, remark) values('".$trainerid."','".$trainerquali[$d]."','".$subs[$d]."','".$qualiboard[$d]."','".$qualificationyear[$d]."','".$qualigrade."','')");
                                }
                        //Program
                        $program=$_POST["txtprogram"];
                          $roll=$_POST["txtroll"];
                          $programsubject=$_POST["txtprogramsubject"];
                          $programorg=$_POST["txtorg"];
                          $programyear=$_POST["txtprogramyear"];
                          $i=0;
                          foreach($program as $programs)
                            {
                                $trainerprogram[$i]=$programs;
                                $i++;
                            }
                          $j=0;
                          foreach($roll as $rolls)
                            {
                                $programroll[$j]=$rolls;
                                $j++;
                            }
                          $k=0;
                          foreach($programsubject as $programsubjects)
                            {
                              $psubject[$k]=$programsubjects;
                              $k++;
                            }
                          $l=0;
                          foreach($programorg as $programorgs)
                            {
                                $programorganization[$l]=$programorgs;
                                $l++;
                            }
                          $m=0;
                          foreach($programyear as $programyears)
                            {
                                $pyear[$m]=$programyears;
                                $m++;
                            }
                            for($d=0;$d<$m;$d++)
                                {
                                  mysqli_query($conn,"INSERT INTO tbltrainerprogram(trainerid,programname, rollinprogram, programsubject, organization, programyear, remark) values('".$trainerid."','".$trainerprogram[$d]."','".$programroll[$d]."','".$psubject[$d]."','".$programorganization[$d]."','".$pyear."','')");
                                }
                        //Specialist
                        $specialist=$_POST["optspecialist"];
                          $i=0;
                          foreach($specialist as $specialists)
                            {
                                $trainerspecialist[$i]=$specialists;
                                $i++;
                            }
                          for($d=0;$d<$i;$d++)
                                {
                                  mysqli_query($conn,"INSERT INTO tblspecialist(trainerid,specialist, remark) values('".$trainerid."','".$trainerspecialist[$d]."','')");
                                }
                      }

			              $_SESSION['response']="Save Successfully";
                    header('Location: ../index.php?accountid=roster_form');
                  }
                else
                  {
                    header('Location: ../error.php?msg='. die("Database Connection Error" .mysqli_error()));
                  }
              }
        }         
    }
mysqli_close($conn);
?>
