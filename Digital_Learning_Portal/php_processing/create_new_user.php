<?php
ob_start();
//ini_set('display_errors',1);
//ini_set('display_startup_errors',1);
include("db_connection.php");
$uname=$_POST['username'];
$email=$_POST['useremail'];
$mobile=$_POST['usermobile'];
$address=$_POST['useraddress'];
//$province=$_POST['province'];
$province='Bagamati';
$district=$_POST['cmbdistrict'];
$lgov=$_POST['cmbmun'];
$ward=$_POST['cmbward'];
$utype=$_POST['usertype'];
$sql="Select * from tblmember  where contact='$mobile' and lname='$mobile'";
$rownum=$conn->query($sql);
        if($rownum->num_rows>0)
                {
                        header('Location: ../new_user.php?msg="Found Duplicate"');
                }
        else
                {
                        $sql="Insert into tblmember(fname,gender,memphoto,level,faculty,institute, email, contact, district, l_govern, wardno, address, memtype,lname,lpass, ondate, remark)values('$uname','None','','','','','$email','$mobile','$district','$lgov','$ward','$address','$utype','$mobile','$mobile',now(),'Active')";
                        if(!mysqli_query($conn,$sql))
                                {
                                        header('Location: ../new_user.php?msg=' . mysqli_error($conn));
                                        //echo mysqli_error($conn);
                                }

                        else
                                {
                                       header('Location: ../new_user.php?msg="Save Successfully"');
                                }
                }
ob_flush();
?>