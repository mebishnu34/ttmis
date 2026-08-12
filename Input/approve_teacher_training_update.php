<HTML>
<head>
<script>
function training(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","subject.php?t="+str,true);
        xmlhttp.send();
    }
}
function level(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","subject.php?l="+str,true);
        xmlhttp.send();
    }
}
</script>
<?php
   include("../Processing/db_connection.php");
   include("title.htm");
   if(isset($_GET['linkid']))
   {
   $traid=$_GET['linkid'];
   $sql="SELECT * FROM tblttrainingrequest where ID='$traid'";
   $training = mysqli_query($conn,$sql);
   while($row1 = mysqli_fetch_array($training))
		    {
			$traid=$row1["trainingid"];
			$sql="SELECT * FROM tbltraining where ID='$traid'";
	      	$training = mysqli_query($conn,$sql);
		  	while($row4 = mysqli_fetch_array($training))
		    	{
				$trainingname=$row4["trainingname"];
				$level=$row4["level"];
				$subject=$row4["subject"];
				}
			$groupno=$row1["gnumber"];
			$coordinator=$row1["coordinator"];
			$mobile=$row1["mobileno"];
			$sdate=$row1["sdate"];
			$edate=$row1["edate"];
			$days=$row1["duration"];
			$div=$row1["division"];
			$venue=$row1["organization"];
			}
   }
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><BODY>
<form method="Post" Action="../Object/approve_teacher_training.php">
    <table  cellpadding="5" align="center">
           <tr>
          <td colspan="2" align="center">Teacher Training Details</td>
        </tr>
              <tr>
               <td align="right">Name of Training*</td>
               <td>
                <Select name="cmbtraining" onchange="training(this.value)" class="normaltext">
				<option><?php echo $trainingname;?></option>
                 <option>शिक्षक पेशागत विकास</option>
                        <option>पुनर्ताजगी</option>
                        <option>नेतृत्व तथा व्यवस्थापन</option>
                </select>
                </td>
           </tr>
           <tr>
    <td align="right">Training Level*</td>
    <td><select name="cmblevel" onchange="level(this.value)" class="normaltext">
		
        <option><?php echo $level;?></option>
         <option>वालविकास केन्द्र</option>
         <option>आधारभूत (१ –५)</option>
         <option>आधारभूत (६ –८)</option>
         <option>माध्यमिक(९ –१०)</option>
         <option>माध्यमिक(११ –१२)</option>
         <option>प्रधानाध्यापक (आधारभूत)</option>
          <option>प्रधानाध्यापक (माध्यमिक)</option>
		  <option>अन्य</option>
</select>
     </td>
    </tr>
    <tr>
    <td align="right">Training Subject*</td>
    <td><input type="text" name="txtsubject" class="normaltext" value="<?php echo $subject;?>">
	 </td>
    </tr>
               <tr>
               <td align="right">Start Date*</td>
               <td><input type="text" name="txtsdate" class="normaltext" value="<?php echo $sdate;?>"> End Date*<input type="text" name="txtedate" class="normaltext" value="<?php echo $edate;?>"></td>
           </tr>
            <tr>
               <td align="right">Number of Days*</td>
               <td><input type="text" name="txtdays" class="normaltext" value="<?php echo $days;?>"></td>
           </tr>
           <tr>
               <td align="right">Training Venue*</td>
               <td><input type="text" name="txtvenu" size="60" class="normaltext" value="<?php echo $venue;?>"></td>
           </tr>
		   <tr>
               <td align="right">Group Number</td>
               <td><input type="text" name="txtgnumber" size="5" class="normaltext" value="<?php echo $groupno;?>"></td>
           </tr>
               <tr>
               <td align="right">Co-Ordinator</td>
               <td><input type="text" name="txtcoordinator" size="60" class="normaltext" value="<?php echo $coordinator;?>"></td>
           </tr>
		   <tr>
               <td align="right">Mobile No.</td>
               <td><input type="text" name="txtmobile" size="20" class="normaltext" value="<?php echo $mobile;?>"></td>
           </tr>  
		   <tr>
               <td align="right">Division</td>
               <td><input type="text" name="txtdivision" size="40" class="normaltext" value="<?php echo $div;?>"></td>
           </tr> 
           <tr>
               <td colspan="2" align="center"><input type="submit" value="Approved" name="btnapproved" class="button"> &nbsp;&nbsp;&nbsp;
			   <input type="submit" value="Reject" name="btnreject" class="button">
			   </td>
           </tr>
    </table>
</form>
</BODY>
</HTML>
