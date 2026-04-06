<?php
include("../Processing/db_connection.php");
include("title.htm");
include("../Processing/db_connection.php");
?>
<form method="Post" Action="../Object/save_training_mark.php">
 <table width="100%" border="1" bgcolor="#FFFFFF" cellpadding="2" cellspacing="0">
<tr>
<th>S.No</th>
<th>शिक्षककाे नाम</th>
<th>माेबाइल न‌‍</th>
<th>तालिमकाे नाम</th>
<th>मिति</th>
<th>अ‌क</th>
</tr>
<?php
$i=1;
$sql1 = "SELECT appid,tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,runtrainingid FROM tblapplication where remark='Selected' ORDER BY appid";
$result1 = $conn->query($sql1);
  if ($result1->num_rows > 0)
      {
        while($row1 = $result1->fetch_assoc())
         {
            $teacherid=$row1["appid"];
		$tname=$row1["tname"];
		 $contact=$row1["mobileno"];
         $ctnno= $row1["citizenshipno"];
         $school=$row1["schoolname"];
         $applicantdate=$row1["appointdate"];
         $subject=$row1["appointsubject"];
        $sql2="SELECT coordinator, mobileno,startdate, enddate,subject from tblruntraining where id='".$row1["runtrainingid"]."'";
        $result=$conn->query($sql2);
        if($result->num_rows>0)
	            {
		        if($data=$result->fetch_assoc())
			        {
				        $sdate=$data["startdate"];
				        $edate=$data["enddate"];
                        $subject=$data["subject"];
			        }
                }
	    
  

  ?>

 <tr>
<td align="center"><?php echo $i; ?><input type="Hidden" name="id" value="<?php echo $i; ?>" readonly="true" size="5">
<input size="10" readonly="True" type="hidden" name="teacherid[]" value="<?php echo $teacherid;?>">
<input size="10" readonly="True" type="hidden" name="trainingid[]" value="<?php echo $row1["runtrainingid"];?>">
</td>
<td><?php echo $tname;?></td>
<td><?php echo $contact;?></td>
<td><?php echo $subject;?></td>
<td align="center">मिति <?php echo $sdate . " देखि ". $edate. " सम्म";?></td>
<td align="center"><input type="text" name="obtmark[]" size="5"></td>
<!--<td bgcolor="#0000FF"><?php //echo "<a href=../Input/teacher_update_1.php?tid=$teacherid target=_blank>Edit</a>";?></td>-->
<?php
  	echo "</tr>";
    	$i++;
  
         }
    }
	
?>


<tr>
<td colspan="6" align="center"><input type="Submit" value="Save" class="button"> </td>
</tr>
</table>
</form>
</body>
</html>
