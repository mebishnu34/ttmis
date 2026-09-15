<?php
ob_start();
session_start();
error_reporting(E_ALL);
ini_set('display_error',1);
include("../Processing/db_connection.php");
$trainingid=$_SESSION['trainingid'];
$rnid=$_SESSION['trunid'];
$gn=$_POST['cmbgnumber'];
$coordinator=$_POST['txtcoordinator'];
$mobileno=$_POST['txtmobile'];
$sms=$_POST['optsms'];
$fyear=$_SESSION['financialyear'];
//echo $trainingid;
//exit;
$sql = "SELECT trainingid, trainingname, level, subject, startdate, enddate,venue,coordinator, mobileno, starttime from tblruntraining where id='$rnid' and remark='Running'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    if($row = $result->fetch_assoc())
      {
    		    $training= $row["trainingname"];
                $level=$row["level"];
                $subject=$row["subject"];
                $sdate=$row["startdate"];
                $edate=$row["enddate"];
                $venue=$row["venue"];
                $coordinator=$row["coordinator"];
                $mobileno=$row["mobileno"];
                $time=$row["starttime"];
				//echo $trainingid=$row["trainingid"];
                              
         }
     }

if($trainingid=="")
{
 header('Location: ../Admin/create.php?msg="Select Training"');
}
else
{
$i=0;
$k=0;
$rem=$_POST['rem'];
//echo $rem;
//echo "hell4o";    
foreach($rem as $rems)
	{
	$teacherid[$k]=$rems;
  //  echo $teacherid[$k];
    //echo "<br>";
	$k++;
	}
//echo $k;
//exit;
for($d=0; $d<$k;$d++)
	{
	if($teacherid[$d]<>"")
        {
			$appid = $teacherid[$d];
			   $sql = "SELECT appid,tname,gender,citizenshipno,fathername,email,district,munvdc,wardno,mobileno,appointdate,appointlocallevel,appointsubject,province
            	FROM tblapplication WHERE appid = ? LIMIT 1";
    			$stmt = $conn->prepare($sql);
    			$stmt->bind_param("s", $appid);
    			$stmt->execute();
			    $result = $stmt->get_result();
			    if ($result->num_rows == 0) 
					{
        			throw new Exception("Application not found.");
    				}
			    $app = $result->fetch_assoc();
			    $mobileno    = trim($app['mobileno']);
    			$ctzno       = trim($app['citizenshipno']);
    			$munvdc      = trim($app['munvdc']);
				 /*
			* 2. Find existing teacher
			*
			* Match by mobile OR citizenship number.
			*/
			$sql = "SELECT teachercode, scode, munvdc FROM tblteacher WHERE tcontact = ? OR citizenship = ?	LIMIT 1";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("ss", $mobileno, $ctzno);
			$stmt->execute();
			$teacherResult = $stmt->get_result();
			/*
			* 3. Update existing teacher
			*/
			if ($teacherResult->num_rows > 0) 
				{
				$teacher = $teacherResult->fetch_assoc();
				$tcode = $teacher['teachercode'];
				$scode = $teacher['scode'];
				$munvdc = $teacher['munvdc'];
				$sql = "UPDATE tblteacher
						SET
							tname          = ?,
							gender         = ?,
							citizenship    = ?,
							fathername     = ?,
							email          = ?,
							wardno         = ?,
							tcontact       = ?,
							appointdate    = ?,
							subject        = ?,
							teachinglevel  = ?,
							teachingsubject = ?,
							loginname      = ?,
							tpass          = ?
						WHERE teachercode = ?";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param(
					"ssssssssssssss",
					$app['tname'],
					$app['gender'],
					$app['citizenshipno'],
					$app['fathername'],
					$app['email'],
					$app['wardno'],
					$app['mobileno'],
					$app['appointdate'],
					$app['appointsubject'],
					$app['appointsubject'],
					$app['appointsubject'],
					$app['mobileno'],
					$app['mobileno'],
					$tcode
				);
				$stmt->execute();
			} 
			else 
			{

				/*
				* 4. Insert new teacher
				*/
				$sql = "INSERT INTO tblteacher
						(
							teachercode,
							tname,
							gender,
							cast,
							mothertong,
							citizenship,
							sheetroll,
							subject,
							loginname,
							tpass,
							dob,
							fathername,
							address,
							email,
							district,
							munvdc,
							wardno,
							tcontact,
							appointdate,
							appointtype,
							workinglevel,
							scode,
							schoolname,
							schooladdress,
							province,
							category,
							teachinglevel,
							qualification,
							faculty,
							majorsubject,
							teachingsubject,
							remark,
							importno,
							username
						)
						VALUES
						(
							?, ?, ?, '', '', ?, '', '',
							?, ?, '', ?, '',
							?, ?, ?, ?, ?, ?, '',
							?, '', 'School Name', 'School Address',
							?, '', ?, '', '', ?,
							?, 'Teacher', '0', 'TTMIS'
						)";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param(
					"ssssssssssssssssss",
					$app['appid'],
					$app['tname'],
					$app['gender'],
					$app['citizenshipno'],
					$app['mobileno'],
					$app['mobileno'],
					$app['fathername'],
					$app['email'],
					$app['district'],
					$app['munvdc'],
					$app['wardno'],
					$app['mobileno'],
					$app['appointdate'],
					$app['appointlocallevel'],
					$app['province'],
					$app['appointlocallevel'],
					$app['appointsubject'],
					$app['appointsubject']
				);
				$stmt->execute();
				/*
				* New teacher code is appid
				*/
				$tcode = $app['appid'];
				$scode = '';
			}
			/*
			* 5. Get municipality ID
			*/
			$munid = "";
			$sql = "SELECT ID FROM tbldistrict	WHERE munvdc = ? LIMIT 1";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("s", $munvdc);
			$stmt->execute();
			$munResult = $stmt->get_result();
			if ($munResult->num_rows > 0) 
				{
					$munRow = $munResult->fetch_assoc();
					$munid = $munRow['ID'];
				}

			/*
			* 6. Check whether teacher is already
			*    registered for this training run.
			*/
			$sql = "SELECT 1 FROM tblttraining	WHERE runid = ?	AND teacherid = ? LIMIT 1";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("ss", $rnid, $tcode);
			$stmt->execute();
			$trainingResult = $stmt->get_result();

			/*
			* 7. Insert teacher into training
			*/
			if ($trainingResult->num_rows == 0) 
				{
				$sql = "INSERT INTO tblttraining
						(
							teacherid,
							trainingid,
							runid,
							schoolcode,
							munid,
							gnumber,
							coordinator,
							mobileno,
							sdate,
							edate,
							remark,
							certificate,
							certificatenumber,
							registernumber,
							prepairedby,
							checkby,
							approvedby
						)
						VALUES
						(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Running',
								'', '', '', '', '', '')";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param(
					"ssssssssss",
					$tcode,
					$trainingid,
					$rnid,
					$scode,
					$munid,
					$gn,
					$coordinator,
					$mobileno,
					$sdate,
					$edate
				);
				$stmt->execute();
			}

			/*
			* 8. Mark application as selected
			*/
			$sql = "UPDATE tblapplication SET remark = 'Selected',runtrainingid = ?,groupnumber = ?	WHERE appid = ?";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("sss", $rnid, $gn, $appid);
			$stmt->execute();

			/*
			* 9. Everything successful
			*/
			$conn->commit();
			$_SESSION['response']="छनोट भयो";
			//header('Location: ../Input/applicant_list.php?msg=Saved Successfully');
			?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'success',
        title: 'छनोट',
        text: 'तालिमको लागि शिक्षकहरु छनोट भयो',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.close();
        }
    });
});
</script>
			
<?php
		}
}
}
?>
