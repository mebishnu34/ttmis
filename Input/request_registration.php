<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="../CSS/main_table.css">
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
   include("../Processing/db_connection.php");
   include("title.htm");
   if(isset($_GET['linkid']))
   {
   $id=$_GET['linkid'];
   //echo $id;
   $sql="SELECT * FROM tblregrequest where id='$id'";
   $result1 = mysqli_query($conn,$sql);
   while($row = mysqli_fetch_array($result1))
    {
    $tid=$row['teacherid'];
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
    $up=$row['upass'];
     }
   }
?>
<body>
<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="..\Image\logo.svg" width="150" height="100"></td>
<td bgcolor="#FFFFFF" align="left" class="tdradius"><img src="..\Image\banner.jpg" width="800" height="150"></td>
</tr>
<tr>
<td colspan="0" bgcolor="#0852FA" align="Right"><a href="admin_application.php">Home</a></td>
<td colspan="0" bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><?php echo $_SESSION['uname'];?></font></td>
</tr>
</table>
<form method="POST" Action="../Object/approved_teacher_request.php">
<table class="maintable">
<tr>
<td colspan="3" align="Center">Teacher Approve</td>
</tr>
<tr><td>Teacher Request ID*</td>
<td>&nbsp;</td>
<td><input name="teacherid" type="hidden" size="20" value="<?php echo $tid;?>" /><input name="reqid" type="Text" size="20" value="<?php echo $id;?>" /></td>
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
<td>
    <?php
    if($gender=='पुरूष')
    {
        ?>
    <input type="Radio" name="gender" value="पुरूष" checked>Male&nbsp &nbsp <input type="Radio" name="gender" value="महिला">Female &nbsp &nbsp <input type="Radio" name="gender" value="अन्य">Other
    <?php
    }
    elseif($gender=='महिला')
    {
        ?>
       <input type="Radio" name="gender" value="पुरूष">Male&nbsp &nbsp <input type="Radio" name="gender" value="महिला" checked>Female &nbsp &nbsp <input type="Radio" name="gender" value="अन्य">Other  
    <?php
    }
        else
    {
        ?>
         <input type="Radio" name="gender" value="पुरूष">Male&nbsp &nbsp <input type="Radio" name="gender" value="महिला">Female &nbsp &nbsp <input type="Radio" name="gender" value="अन्य" checked>Other
    <?php
    }
    ?>
    </td>
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
<input type="text" name="district" size="50" value="<?php echo $d;?>"></td>
</tr>
<tr><td>Rural/Municipality*</td>
<td>&nbsp;</td>
<td>
<input type="text" name'Munvdc" size="50" value="<?php echo $vdc;?>">
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
        <option><?php echo $atype;?></optiion>
         <option>स्थायी</option>
         <option>अस्थायी</option>
        <option>राहत</option>
         <option>वालविकास केन्द्र सहयोगी</option>
         <option>अन्य</option>

</select>
</td>
</tr>
<tr><td>Appointment Level</td>
<td>&nbsp;</td>
<td>
<select name="cmblevel">
        <option><?php echo $level;?></optiion>
         <option>वालविकास केन्द्र</option>
         <option>आधारभूत (१ –५)</option>
         <option>आधारभूत (६ –८)</option>
         <option>माध्यमिक(९ –१०)</option>
         <option>माध्यमिक(११ –१२)</option>
         <option>शिक्षक प्रमुख</option>
         <option>अन्य</option>
</select>
</td>
</tr>
<tr><td>Teaching Level</td>
<td>&nbsp;</td>
<td>
<select name="cmbteachinglevel">
        <option><?php echo $tlevel;?></optiion>
         <option>वालविकास केन्द्र</option>
         <option>आधारभूत (१ –५)</option>
         <option>आधारभूत (६ –८)</option>
         <option>माध्यमिक(९ –१०)</option>
         <option>माध्यमिक(११ –१२)</option>
         <option>शिक्षक प्रमुख</option>
         <option>अन्य</option>
</select>
</td>
</tr>

<tr><td>Qualification</td>
<td>&nbsp;</td>
<td>
<select name="cmbqualification">
        <option><?php echo $qualification;?></optiion>
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
        <option><?php echo $faculty;?></optiion>
         <option>शिक्षा</option>
         <option>मानविकी</option>
         <option>व्यवस्थापन</option>
         <option>विज्ञान </option>
</select>
</td>
<tr><td>Major Subject</td>
<td>&nbsp;</td>
<td><select name="cmbmajorsubject">
        <option><?php echo $msubject;?></optiion>
         <option>अंग्रजी</option>
         <option>हिसाब</option>
         <option>नेपाली</option>
         <option>जनसंख्या</option>
        <option>विज्ञान </option>
         <option>सामाजिक</option>


</select>
</td>
</tr>
<tr><td>Teaching Subject</td>
<td>&nbsp;</td>
<td><select name="cmbteachingsubject">
        <option><?php echo $tsubject;?></optiion>
         <option>अंग्रजी</option>
         <option>हिसाब</option>
         <option>नेपाली</option>
         <option>जनसंख्या</option>
        <option>विज्ञान </option>
         <option>सामाजिक</option>


</select>
</td>
</tr>
<tr>
<td colspan="3" align="center"><input name="btnsave" type="Submit" value="Save" class="button"></td>
</tr>
<tr><td></td>
<td>&nbsp;</td>
<td><input name="txtpass" type="hidden" size="20" value="<?php echo $up;?>" /></td>
</tr>
</table>
</form>
</body>

</html>
