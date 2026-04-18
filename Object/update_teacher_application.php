<?php
session_start();
error_reporting(E_ALL);
ini_set('display_error',1);
//include("object_include.php");
include("../Processing/db_connection.php");
$teachercode=$_POST["txtcode"];
if($_POST['cmbprioritymode']=="अनलाइन")
  {
$mode2="आमनेसामने";
  }
else
  {
    $mode2="अनलाइन";
  }
$sql = "UPDATE tblapplication 
              SET
                tname='".$_POST['txtteacherName']."',
                teachercode='".$teachercode."',
                fathername='".$_POST['txtfatherName']."',
                province='".$_POST['cmbprovince']."',
                district='".$_POST['cmbdistrictnp']."',
                munvdc='".$_POST['cmbmunnp']."',
                wardno='".$_POST['txtward']."',
                mobileno='".$_POST['txtmobileNo']."',
                email='".$_POST['txtemail']."',
                issuedistrict='".$_POST['cmbctzissuedistrict']."',
                appointdate='".$_POST['txtappointdate']."',
                appointmonth='".$_POST['cmbappointmonth']."',
                appointday='".$_POST['txtday']."',
                appointdistrict='".$_POST['cmbappointdistrict']."',
                appointlocallevel='".$_POST['cmbappointlevel']."',
                appointsubject='".$_POST['cmbappointsubject']."',
                bankname='".$_POST['txtbankname']."',
                bankacno='".$_POST['txtbankacno']."',
                panno='".$_POST['txtpanNo']."',
                schoolname='".$_POST['txtschoolname']."',
                schoolprovince='".$_POST['cmbschoolprovince']."',
                schooldistrict='".$_POST['cmbdistrictbagamati']."',
                schoollocallevel='".$_POST['cmbmunbagamati']."',
                schoolward='".$_POST['txtschoolward']."',
                trainingcategory='".$_POST['cmbtrainingcategory']."',
                trainingsubject='".$_POST['cmbsubject']."',
                priority1model='".$_POST['cmbprioritymode']."',
                priority2model='".$mode2."'
                where citizenshipno='".$_POST['txtcitizenshipNo']."' and financialyear='".$_POST['txtfyear']."'";
                if (mysqli_query($conn, $sql))
                  {
                        $filename = $_FILES['fileletter']['name'];
                    $temp_file=$citizen .'_' . $filename;
                    $letter=$temp_file;
                    $folderletter = '../application_document/' . $temp_file;
                    $extensionletter = pathinfo($filename, PATHINFO_EXTENSION);
                    $fileletter = $_FILES['fileletter']['tmp_name'];
                    $sizeletter = $_FILES['fileletter']['size'];
                    if($filename<>"")
                      {
                        if (!in_array($extensionletter, ['PDF', 'JPG','png', 'PNG','pdf','jpg','jpeg']))
                          {
                            header('Location: ../error.php?msg= "Your file extension must be PDF, JPG वा PNG (Max 5MB"');
                            }
                        elseif ($sizeletter > 5000000)
                          { // file shouldn't be larger than 1Megabyte
                            header('Location: ../error.php?msg= "File to large"');
                          }
                          else
                            {
                              if(copy($fileletter, $folderletter))
                                {
                                  mysqli_query($conn,"Update tblapplication set  appointletter='".$letter."' where teachercode='".$teachercode."'");
                                }
                            }
                      }

                      $filenamectz = $_FILES['filecitizenship']['name'];
                      $temp_file=$citizen .'_' . $filenamectz;
                      $citizenship=$temp_file;
                      $folderctz = '../application_document/' . $temp_file;
                      $extensionctz = pathinfo($filenamectz, PATHINFO_EXTENSION);
                      $filectz = $_FILES['filecitizenship']['tmp_name'];
                      $sizectz = $_FILES['filecitizenship']['size'];

                    if($filenamectz<>"")
                      {
                          if(!in_array($extensionctz, ['PDF', 'JPG','png', 'PNG','pdf','jpg','jpeg']))
                            {
                             header('Location: ../error.php?msg= "Your file extension must be PDF, JPG वा PNG (Max 5MB"');
                            }
                        elseif ($sizectz>5000000)
                              { // file shouldn't be larger than 1Megabyte
                                header('Location: ../error.php?msg= "File to large"');
                              }
                          else
                            {
                              if(copy($filectz, $folderctz))
                                {
                                  mysqli_query($conn,"Update tblapplication set  citizenship='".$citizenship."' where teachercode='".$teachercode."'");
                                }
                            }
                      }
                      $filenamerecomend = $_FILES['fileschoolrecommend']['name'];
                      $temp_file=$citizen .'_' . $filenamerecomend;
                      $recommend=$temp_file;
                      $folderrecomend = '../application_document/' . $temp_file;
                      $extensionrecomend = pathinfo($filenamerecomend, PATHINFO_EXTENSION);
                      $filerecomend = $_FILES['fileschoolrecommend']['tmp_name'];
                      $sizerecomend = $_FILES['fileschoolrecommend']['size'];               
                    if($filenamectz<>"")
                        {
                          if(!in_array($extensionrecomend, ['PDF', 'JPG','png', 'PNG','pdf','jpg','jpeg']))
                            {
                              header('Location: ../error.php?msg= "Your file extension must be PDF, JPG वा PNG (Max 5MB"');
                            }
                          elseif ($sizerecomend>5000000)
                            { // file shouldn't be larger than 1Megabyte
                              header('Location: ../error.php?msg= "File to large"');
                            }
                          else
                            {
                            if(copy($filerecomend,$folderrecomend))
                              {
                                mysqli_query($conn,"Update tblapplication set  schoolrecommend='".$recommend."' where teachercode='".$teachercode."'");
                              }
                            }
                        }
                        mysqli_query($conn,"UPDATE tblteacher t1
								        JOIN tblapplication t2 
								        ON (t1.teachercode = t2.teachercode)
								            SET
                            t1.tname = t2.tname,
                            t1.gender = t2.gender,
                            t1.citizenship = t2.citizenshipno,
                            t1.fathername = t2.fathername,
                            t1.email = t2.email,
                            t1.wardno = t2.wardno,
                            t1.tcontact = t2.mobileno,
                            t1.appointdate = t2.appointdate,
                            t1.subject = t2.appointsubject,
                            t1.teachinglevel = t2.appointsubject,
                            t1.teachingsubject = t2.appointsubject,
                            t1.loginname = t2.mobileno,
                            t1.tpass = t2.mobileno");
                 		    $_SESSION['response']="Update Successfully";
                        header('Location: ../application.php');
                  }
            else
                  {
                    //header('Location: ../error.php?msg='. die("Database Connection Error" .mysqli_error()));
                    echo mysqli_error();
                  } 
mysqli_close($conn);
?>
