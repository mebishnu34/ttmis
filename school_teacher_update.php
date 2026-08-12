<html>
<head>
<script>
function district(str) {
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
        xmlhttp.open("GET","dropdistrict.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<?php
   include("Processing/db_connection.php");
   include("title.htm");
   $sql1 = "SELECT * FROM tblteacher where teacherid='$teacherid'";
   $result1 = $conn->query($sql1);

   if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         $tname=$row['tname'];
         $gender=$row['gender'];
         $dob=$row['dob'];
         $a=$row['address'];
         $email=$row['email'];
         $d=$row['district'];
         $vdc=$row['munvdc'];
         $ward=$row['wardno'];
         $tc=$row['tcontact'];
         $adate=$row['appointdate'];
         $atype=$row['appointtype'];
         $level=$row['workinglevel'];
         $scode=$row['schoolcode'];
         $tlevel=$row['teachinglevel'];
         $qualification=$row['qualification'];
         $faculty=$row['faculty'];
         $msubject=$row['majorsubject'];
         $tsubject=$row['teachingsubject'];

         }
      }

?>
<body>
<form method="POST" Action="Object\update_school_teacher.php">
<table width="100%" class="subtable" align="center">
<tr>
<td colspan="3" align="Center">Update Personal Information</td>
</tr>
<tr><td>Teacherid*</td>
<td>&nbsp;</td>
<td><input name="teacherid" type="Text" size="20" value="<?php echo $_SESSION['tid'];?>" Readonly="True" /></td>
</tr>

<tr><td>Name of Teacher*</td>
<td>&nbsp;</td>
<td><input name="txtname" type="Text" size="50" value="<?php echo $tname;?>" /></td>
</tr>
<tr><td>School Code*</td>
<td>&nbsp;</td>
<td><input name="txtcode" type="Text" size="20" value="<?php echo $scode;?>" /></td>
</tr>
<tr><td>Gender</td>
<td>&nbsp;</td>
<td><input type="Radio" name="gender" value="पुरूष">Male&nbsp &nbsp <input type="Radio" name="gender" value="महिला">Female &nbsp &nbsp <input type="Radio" name="gender" value="Other">Other</td>
</tr>
<tr><td>Date of Birth</td>
<td>&nbsp;</td>
<td><input name="txtdob" type="Text" size="20" value="<?php echo $dob;?>"></td>
</tr>
<tr><td>Permanent Address</td>
<td>&nbsp;</td>
<td><input name="txtaddress" type="Text" size="50" value="<?php echo $a;?>"/></td>
</tr>
<tr><td>Email Address</td>
<td>&nbsp;</td>
<td><input name="txtemail" type="Text" size="50" value="<?php echo $email;?>"/></td>
</tr>
<tr><td>District*</td>
<td>&nbsp;</td>
<td>
<?php include("district_list.htm");?></td>
</tr>
<tr><td>Rural/Municipality*</td>
<td>&nbsp;</td>
<td>
<div id="txtHint">Municipality/Rural</div>
</td>
</tr>
<tr><td>Ward No. *</td>
<td>&nbsp;</td>
<td><input name="txtwn" type="Text" size="20" value="<?php echo $ward;?>"/></td>
</tr>
<tr><td>Mobile No.*</td>
<td>&nbsp;</td>
<td><input name="txtcontact" type="Text" size="20" value="<?php echo $tc;?>"/></td>
</tr>

<tr><td>Appointment Date</td>
<td>&nbsp;</td>
<td><input name="txtad" type="Text" size="20" value="<?php echo $adate;?>" /></td>
</tr>
<tr><td>Appointment Type</td>
<td>&nbsp;</td>
<td><select name="cmbtype">
            <option><?php echo $atype;?></option>
         <option>Permanent</option>
         <option>Temporarry</option>
        <option>Relief(Rahat)</option>
         <option>ECD Facilitator</option>
         <option>Others</option>

</select>
</td>
</tr>
<tr><td>Appointment Level</td>
<td>&nbsp;</td>
<td>
<select name="cmblevel">
        <option><?php echo $level;?></option>
         <option>Basic-ECD</option>
         <option>Basic(1-5)</option>
         <option>Basic(6-8)</option>
         <option>Secondary(9-10)</option>
         <option>Secondary(11-12)</option>
</select>
</td>
</tr>
<tr><td>Teaching Level</td>
<td>&nbsp;</td>
<td>
<select name="cmbteachinglevel">
        <option><?php echo $tlevel;?></option>
         <option>Basic-ECD</option>
         <option>Basic(1-5)</option>
         <option>Basic(6-8)</option>
         <option>Secondary(9-10)</option>
         <option>Secondary(11-12)</option>
</select>
</td>
</tr>

<tr><td>Qualification</td>
<td>&nbsp;</td>
<td>
<select name="cmbqualification">
        <option><?php echo $qualification;?></option>
         <option>SEE</option>
         <option>SEE/SLC</option>
         <option>SLC/+2</option>
         <option>PCL</option>
         <option>Bachelor</option>
         <option>Master</option>
         <option>MPhil</option>
</select>
</td>
</tr>
</tr>
<tr><td>Faculty</td>

<td>&nbsp;</td>
<td>
<select name="cmbfaculty">
        <option><?php echo $faculty;?></option>
         <option>Education</option>
         <option>Humanities</option>
         <option>Management</option>
         <option>Science</option>
</select>
</td>
<tr><td>Major Subject</td>
<td>&nbsp;</td>
<td><select name="cmbmajorsubject">
            <option><?php echo $msubject;?></option>
         <option>English</option>
         <option>Math</option>
         <option>Nepali</option>
         <option>Population</option>
        <option>Science</option>
         <option>Social</option>


</select>
</td>
</tr>
<tr><td>Teaching Subject</td>
<td>&nbsp;</td>
<td><select name="cmbteachingsubject">
            <option><?php echo $tsubject;?></option>
         <option>English</option>
         <option>Math</option>
         <option>Nepali</option>
         <option>Population</option>
        <option>Science</option>
         <option>Social</option>


</select>
</td>
</tr>
<tr>
<td colspan="3" align="center"><input name="btnsave" type="Submit" value="Save" class="button"></td>
</tr>
</table>
</form>
</body>

</html>
