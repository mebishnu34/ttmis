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
   $sql1 = "SELECT * FROM tblteacher where teacherid='$_SESSION[tid]'";
   $result1 = $conn->query($sql1);

   if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
            $tname=$row['tname'];
            $gender=$row['gender'];
            $cast=$row['cast'];
            $mothertong=$row['mothertong'];
            $citizen=$row['citizenship'];
            $rollno=$row['sheetroll'];
            $stream=$row['stream'];
            $fathername=$row['fathername'];
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
            $scode=$row['scode'];
            $tlevel=$row['teachinglevel'];
            $qualification=$row['qualification'];
            $faculty=$row['faculty'];
            $msubject=$row['majorsubject'];
            $tsubject=$row['teachingsubject'];
           $apsubject=$row['subject'];
         }
      }

?>
<body>
<form method="POST" Action="Object\Save_Teacher_Request.php">
<table class="subtable">
<tr>
<td colspan="3" align="Center">Update Personal Information</td>
</tr>
<tr><td align="Right">Teacherid*</td>
<td>&nbsp;</td>
<td><input name="teacherid" type="Text" size="20" value="<?php echo $_SESSION['tid'];?>" Readonly="True" /></td>
</tr>

<tr><td  align="Right">Name of Teacher*</td>
<td>&nbsp;</td>
<td><input name="txtname" type="Text" size="50" value="<?php echo $tname;?>" Required/></td>
</tr>
<tr><td  align="Right">School Code*</td>
<td>&nbsp;</td>
<td><input name="txtcode" type="Text" size="20" value="<?php echo $scode;?>" /></td>
</tr>
<tr><td  align="Right">Gender</td>
<td>&nbsp;</td>
<td><input type="Radio" name="gender" value="पुरूष">Male&nbsp &nbsp <input type="Radio" name="gender" value="महिला">Female &nbsp &nbsp <input type="Radio" name="gender" value="Other">Other</td>
</tr>
<tr><td  align="Right">Date of Birth</td>
<td>&nbsp;</td>
<td><input name="txtdob" type="Text" size="20" value="<?php echo $dob;?>"></td>
</tr>
<tr><td  align="Right">Cast</td>
<td>&nbsp;</td>
<td><select name="cmbcast">
	<option><?php echo $cast;?></option>
	<option>जनजाति</option>
	<option>ब्राहमण/क्षेत्री</option>
	<option>दलित</option>
	<option>अन्य</option>
</select></td>
</tr>
<tr><td  align="Right">Mother Tong</td>
<td>&nbsp;</td>
<td><input name="txttong" type="Text" size="50" value="<?php echo $mothertong;?>"/></td>
</tr>
<tr><td align="right">Citizenship No.</td>
<td>&nbsp;</td>
<td><input name="txtcitizenshipno" type="Text" size="20" value="<?php echo $citizen;?>"></td>
</tr>

<tr><td align="right">Sheet Roll No.</td>
<td>&nbsp;</td>
<td><input name="txtsheetroll" type="Text" size="20" value="<?php echo $rollno;?>"></td>
</tr>
<tr><td  align="Right">Name of Father</td>
<td>&nbsp;</td>
<td><input name="txtfathername" type="Text" size="50" value="<?php echo $fathername;?>"/></td>
</tr>

<tr><td  align="Right">Permanent Address</td>
<td>&nbsp;</td>
<td><input name="txtaddress" type="Text" size="50" value="<?php echo $a;?>"/></td>
</tr>
<tr><td  align="Right">Email Address</td>
<td>&nbsp;</td>
<td><input name="txtemail" type="Text" size="50" value="<?php echo $email;?>"/></td>
</tr>
<tr><td  align="Right">Ward No. </td>
<td>&nbsp;</td>
<td><input name="txtwn" type="Text" size="20" value="<?php echo $ward;?>"/></td>
</tr>
<tr><td  align="Right">Mobile No.*</td>
<td>&nbsp;</td>
<td><input name="txtcontact" type="Text" size="20" value="<?php echo $tc;?>"/></td>
</tr>
<tr><td  align="Right">Stream</td>
<td>&nbsp;</td>
<td><input name="txtstream" type="Text" size="50" value="<?php echo $stream;?>"/></td>
</tr>

<tr><td  align="Right">Appointment Date*</td>
<td>&nbsp;</td>
<td><input name="txtad" type="Text" size="20" value="<?php echo $adate;?>" /></td>
</tr>
<tr><td  align="Right">Appointment Type</td>
<td>&nbsp;</td>
<td><select name="cmbtype">
            <option><?php echo $atype;?></option>
         <option>स्थायी</option>
         <option>अस्थायी</option>
         <option>करार</option
        ><option>राहत</option>
         <option>वालविकास केन्द्र सहयोगी</option>
         <option>अन्य</option>
</select>
</td>
</tr>
<tr><td  align="Right">Appointment Level*</td>
<td>&nbsp;</td>
<td>
<select name="cmblevel">
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
<tr><td  align="Right">Appointment Subject*</td>
<td>&nbsp;</td>
<td><select name="cmbapsubject">
            <option><?php echo $apsubject;?></option>
       <?php
$sql = "SELECT DISTINCT subname from tblsubject ORDER BY subname";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
				$cid=$row["id"];
?>
         <option><?php echo $row["subname"];?></option>
<?php
	}
	}
 ?>  
</select>
</td>
</tr>
<tr><td  align="Right">Teaching Level</td>
<td>&nbsp;</td>
<td>
<select name="cmbteachinglevel">
        <option><?php echo $tlevel;?></option>
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

<tr><td  align="Right">Qualification</td>
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
<tr><td  align="Right">Faculty</td>

<td>&nbsp;</td>
<td>
<select name="cmbfaculty">
        <option><?php echo $faculty;?></option>
         <option>शिक्षा</option>
         <option>मानविकी</option>
         <option>व्यवस्थापन</option>
         <option>विज्ञान </option>
         <option>अन्य </option>
</select>
</td>
<tr><td  align="Right">Major Subject</td>
<td>&nbsp;</td>
<td><select name="cmbmajorsubject">
            <option><?php echo $msubject;?></option>
         <?php
$sql = "SELECT DISTINCT subname from tblsubject ORDER BY subname";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
				$cid=$row["id"];
?>
         <option><?php echo $row["subname"];?></option>
<?php
	}
	}
 ?>  


</select>
</td>
</tr>
<tr><td  align="Right">Teaching Subject</td>
<td>&nbsp;</td>
<td><select name="cmbteachingsubject">
            <option><?php echo $tsubject;?></option>
        <?php
$sql = "SELECT DISTINCT subname from tblsubject ORDER BY subname";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
				$cid=$row["id"];
?>
         <option><?php echo $row["subname"];?></option>
<?php
	}
	}
 ?>  
</select>
</td>
</tr>
<tr><td align="Right">Login Name*</td>
<td>&nbsp;</td>
<td><input name="txtlogin" type="Text" size="20" value="<?php echo $_SESSION['memlname'];?>" required/></td>
</tr>

<tr><td align="Right">Password*</td>
<td>&nbsp;</td>
<td><input name="txtpassword" type="Password" size="20" value="<?php echo $_SESSION['password'];?>" required/></td>
</tr>
<tr><td align="Right">Confirm Password*</td>
<td>&nbsp;</td>
<td><input name="txtconfirmpass" type="Password" size="20" value="<?php echo $_SESSION['password'];?>" required/></td>
</tr>

<tr>
<td colspan="3" align="center"><input name="btnsave" type="Submit" value="Update" class="button"></td>
</tr>
</table>
</form>
</body>

</html>
