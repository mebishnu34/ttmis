<?php
session_start();
include("../Processing/db_connection.php");
$receipient=$_POST['txtreceipent'];
$receipient1 = explode(",", $receipient);
$title=$_POST['txttitle'];
$sms=$_POST['txtsms'];
$group=$_POST['cmbgroup'];
if($receipient=="" and $group=='None')
    {
    $munvdc=$_POST['cmbmv'];
    }
if($sms=="")
    {
     header('Location: ../Admin/create.php?msg= "Fields Are Required"');
    }
else
{
		if($receipient=="" and $group<>"None")
  			{
			 $sql1 = "SELECT * FROM tblcontact where ctype='$group'";
    		$result = $conn->query($sql1);
     			if ($result->num_rows > 0)
       			{	
		         while($row = $result->fetch_assoc())
        			 {
			           $receipient=$row['mobileno'];
           				$sql = "INSERT INTO tblsms(receipient, smstitle,sms, usms, ondate, sendby) values('$receipient', '$title','','$sms', now(), '$_SESSION[lname]')";
			           if (mysqli_query($conn, $sql))
            			  {
              				$args = http_build_query(array(
			              	'token' => 'v2_Xjrhjs7Ws3vjpRa4AvGNDrPIqr1.GIY8',
            			  	'from'  => 'InfoSMS',
              			  	'to'    => $receipient,
              			  	'text'  => 'Education Training Center,Dhulikhel::'.$title.':'.$sms));
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
           					header('Location: ../Admin/create.php?msg= "Message Send Successfully"');
                			}
                		else
                			{
                			$message= "save_sms" . $sql . "<br>" . mysqli_error($conn);
		  					$mobileno="9851001482";
		  					include("sms_code.php");
		   				header('Location: ../Admin/create.php?msg= "Sorry,Try Later..."');
		   				//	echo $message;
                			}
           				}
   			 		}
					
				}
			elseif($group=="None" and $receipient=="")
     			{
					$sql1 = "SELECT * FROM tblschool where munvdc='$munvdc'";
    				$result = $conn->query($sql1);
     				if ($result->num_rows > 0)
       					{
         					while($row = $result->fetch_assoc())
         						{
          						 $receipient=$row['mobileno'];
           						$sql = "INSERT INTO tblsms(receipient, smstitle, sms,usms, ondate,sendby) values('$receipient', '$title','','$sms', now(), '$_SESSION[lname]')";
           						if (mysqli_query($conn, $sql))
              						{
              						$args = http_build_query(array(
              						'token' => 'v2_Xjrhjs7Ws3vjpRa4AvGNDrPIqr1.GIY8',
              						'from'  => 'InfoSMS',
              						'to'    => $receipient,
              						'text'  => 'Education Training Center,Dhulikhel::'.$title.':'.$sms));
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
           							header('Location: ../Admin/create.php?msg= "Message Send Successfully"');
                					}
               					 else
                					{
                					$message= "save_sms" . $sql . "<br>" . mysqli_error($conn);
		  							$mobileno="9851001482";
		 							 include("sms_code.php");
		   							header('Location: ../Admin/create.php?msg= "Sorry,Try Later..."');
		   							//echo $message;
                					}
           						}
   			 				}
							
						}
 			else
  				{
  				    
  				    
		foreach($receipient1 as $mobileno)
            {
                //echo $var. "<br/>";
                
               
        $sql = "INSERT INTO tblsms(receipient, smstitle, sms,usms, ondate,sendby) values('$mobileno', '$title','','$sms',now(), '$_SESSION[lname]')";
            if (mysqli_query($conn, $sql))
          		{
          		   
            			$args = http_build_query(array(
            			'token' => 'v2_Xjrhjs7Ws3vjpRa4AvGNDrPIqr1.GIY8',
              			'from'  => 'InfoSMS',
            			'to'    => $mobileno,
            			'text'  => 'Education Training Center,Dhulikhel::'.$title.':'.$sms));
            			$url = "https://api.sparrowsms.com/v2/sms/";
            			# Make the call using API.
           				$ch = curl_init();
           				curl_setopt($ch, CURLOPT_URL, $url);
           				//print("2");
          				 curl_setopt($ch, CURLOPT_POST, 1);
          				 //print("3");
           				curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
           				//print("4");
           				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                       // print("5");
            			// Response
             			$response = curl_exec($ch);
             			print($rsponse);
             			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            			 curl_close($ch);
    			//	echo $response;
           				header('Location: ../Admin/create.php?msg= "Message Send Successfully"');
           				
           			//echo "sms ughghjghgt";
           				           	}
         		
         		else
          			{
          				$message= "save_sms" . $sql . "<br>" . mysqli_error($conn);
		  				$mobileno="9851001482";
		  				include("sms_code.php");
		  				 header('Location: ../Admin/create.php?msg= "Sorry,Try Later..."');
		  				 //echo $message;
          			}
          			
          			
				}
					
    				//echo sizeof($receipient1);
					
  			}
	}
mysqli_close($conn);
?>
