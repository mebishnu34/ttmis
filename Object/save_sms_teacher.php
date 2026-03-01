<?php
include("../Processing/db_connection.php");
$tid=$_POST['tid'];
$title=$_POST['txttitle'];
$sms=$_POST['txtsms'];
if($sms=="")
{
 header('Location: ../Admin/create.php?msg= "Fields Are Required"');
}
else
{

		 $sql1 = "SELECT teacherid FROM tblttraining where trainingid='$tid'";
    		$result = $conn->query($sql1);
     			if($result->num_rows > 0)
       			{	
		         while($row = $result->fetch_assoc())
        			 {
					 $teacherid=$row['teacherid'];
					 $sql1 = "SELECT tcontact FROM tblteacher where teacherid='$teacherid'";
    					$result1 = $conn->query($sql1);
     					if($result1->num_rows > 0)
       					{	
		         			while($row1 = $result1->fetch_assoc())
        			 		{
							echo $tid;
					     	 $receipient=$row1['tcontact'];
           					 $sql = "INSERT INTO tblsms(receipient, smstitle, sms, ondate) values('$receipient', '$title','$sms', now())";
			           			if (mysqli_query($conn, $sql))
            			  		{
								$message="TTMIS::" .$title.":" .$sms;
								$mobileno=$receipient;
								include("sms_code.php");
								/*
              					$args = http_build_query(array(
			              		'token' => 'b291DNQVdErPcaVzjhOT',
            			  		'from'  => 'InfoSMS',
              			  		'to'    => $receipient,
              			  		'text'  => 'TTMIS::'.$title.':'.$sms));
               			  		$url = "http://api.sparrowsms.com/v2/sms/";
       						# Make the call using API.
              					$ch = curl_init();
              					curl_setopt($ch, CURLOPT_URL, $url);
              					curl_setopt($ch, CURLOPT_POST, 1);
              					curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
              					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                			// Response
              					$response = curl_exec($ch);
              					$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
              					curl_close($ch);
    						//echo $response;
							*/
           						//header('Location: ../Input/send_sms_teacher.php?msg= "Message Send Successfully"');
								
                			}
                		else
                			{
                			$message= "save_sms" . $sql . "<br>" . mysqli_error($conn);
		  					$mobileno="9851001482";
		  					include("sms_code.php");
		   					echo "Sorry, Try Later";
                			}
           				}
   			 		}
					
				}
			}
}
echo "<script>window.close();</script>";
mysqli_close($conn);
?>
