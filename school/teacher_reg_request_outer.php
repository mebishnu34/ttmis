<?php
$scode=$_SESSION['code'];
?>

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
function district1(str) {
    if (str == "") {
        document.getElementById("txtHint1").innerHTML = "";
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
                document.getElementById("txtHint1").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","dropdistrict_1.php?q="+str,true);
        xmlhttp.send();
    }
}
function schoolmun(str) {
    if (str == "") {
        document.getElementById("txtHint2").innerHTML = "";
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
                document.getElementById("txtHint2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","dropschool.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<?php
   include("Processing/db_connection.php");
   include("title.htm");
   $sqlid = "SELECT max(teachercode) FROM tblteacher";
   $resultid = $conn->query($sqlid);
         if ($resultid->num_rows > 0)
         {
    // output data of each row
	   while($row = $resultid->fetch_assoc())
               {
               $tid=$row['max(teachercode)']+1;
                 }
   		}

?>
<body>
<form method="POST" Action="Object/Save_School_Teacher_Outer.php">
<table cellpadding="5" width="95%" class="subtable">
<tr>
<td colspan="3" align="Center"><font size="+2"><b>Teacher Registration</b></font></td>
</tr>
<tr><td align="right">Teacher Code*</td>
<td>&nbsp;</td>
<td><input name="txtcode" type="Text" size="20" value="<?php echo $tid;?>"  readonly="True"/></td>
</tr>

<tr><td align="right">Name of Teacher*</td>
<td>&nbsp;</td>
<td><input name="txtname" type="Text" size="50" /></td>
</tr>
<tr><td align="right">Gender</td>
<td>&nbsp;</td>
<td><input type="Radio" name="gender" value="पुरूष">Male&nbsp &nbsp <input type="Radio" name="gender" value="महिला">Female &nbsp &nbsp <input type="Radio" name="gender" value="Other">Other</td>
</tr>
<tr><td align="right">Cast</td>
<td>&nbsp;</td>
<td><select name="cmbcast">
	<option>जनजाति</option>
	<option>ब्राहमण/क्षेत्री</option>
	<option>दलित</option>
	<option>अन्य</option>
</select></td>
</tr>
<tr><td align="right">Mother Tong</td>
<td>&nbsp;</td>
<td><input name="txttong" type="Text" size="20"></td>
</tr>
<tr><td align="right">Citizenship No.</td>
<td>&nbsp;</td>
<td><input name="txtcitizenshipno" type="Text" size="20"></td>
</tr>

<tr><td align="right">Sheet Roll No.</td>
<td>&nbsp;</td>
<td><input name="txtsheetroll" type="Text" size="20"></td>
</tr>
<tr><td align="right">School Code</td>
<td>&nbsp;</td>
<td>
<input type="text" name="txtscode" value="<?php echo $scode; ?>" readonly="True"></td>
</tr>

<tr><td align="right">Date of Birth</td>
<td>&nbsp;</td>
<td><input name="txtdob" type="Text" size="20"></td>
</tr>
<tr><td align="right">Father's Name</td>
<td>&nbsp;</td>
<td><input name="txtfathername" type="Text" size="40"></td>
</tr>
<tr><td align="right">Permanent Address</td>
<td>&nbsp;</td>
<td><input name="txtaddress" type="Text" size="50" /></td>
</tr>
<tr><td align="right">Email Address</td>
<td>&nbsp;</td>
<td><input name="txtemail" type="Text" size="50" /></td>
</tr>
<tr><td align="right">District*</td>
<td>&nbsp;</td>
<td>
<?php include("district_list.htm");?>
</td>
</tr>
<tr><td align="right">Rural/Municipality*</td>
<td>&nbsp;</td>
<td>
<div id="txtHint">Municipality/Rural</div>
</td>
</tr>
<tr><td align="right">Ward No. *</td>
<td>&nbsp;</td>
<td><input name="txtwn" type="Text" size="20" /></td>
</tr>
<tr><td align="right">Mobile No.*Eng.</td>
<td>&nbsp;</td>
<td><input name="txtcontact" type="Text" size="20" /></td>
</tr>

<tr><td align="right">Appointment Date</td>
<td>&nbsp;</td>
<td><input name="txtad" type="Text" size="20" /></td>
</tr>
<tr><td align="right">Appointment Type</td>
<td>&nbsp;</td>
<td><select name="cmbtype">
         <option>स्थायी</option>
         <option>अस्थायी</option>
        <option>राहत</option>
         <option>वालविकास केन्द्र सहयोगी</option>
         <option>अन्य</option>

</select>
</td>
</tr>
<tr><td align="right">Appointment Level</td>
<td>&nbsp;</td>
<td>
<select name="cmblevel">
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
<tr><td align="right">Appointment Subject*</td>
<td>&nbsp;</td>
<td><select name="cmbapsubject">
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

<tr><td align="right">Teaching Level</td>
<td>&nbsp;</td>
<td>
<select name="cmbteachinglevel">
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

<tr><td align="right">Qualification</td>
<td>&nbsp;</td>
<td>
<select name="cmbqualification">
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
<tr><td align="right">Faculty</td>

<td>&nbsp;</td>
<td>
<select name="cmbfaculty">
         <option>शिक्षा</option>
         <option>मानविकी</option>
         <option>व्यवस्थापन</option>
         <option>विज्ञान </option>
</select>
</td>
<tr><td align="right">Major Subject</td>
<td>&nbsp;</td>
<td><select name="cmbmajorsubject">
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
<tr><td align="right">Teaching Subject</td>
<td>&nbsp;</td>
<td><select name="cmbteachingsubject">
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
</tr>
 <td colspan="3" align="center"><input name="btnsave" type="Submit" value="Save" class="button"></td>
</tr>
</table>
</form>
</body>

</html>
