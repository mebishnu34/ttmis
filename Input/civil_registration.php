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
</head>
<?php
   include("../Processing/db_connection.php");
   include("title.htm");
?>
<body>
<form method="POST" Action="..\Object\Save_Civil.php">
<table class="maintable">
<tr>
<td colspan="3" align="Center">Personnel Registration</td>
</tr>
<tr><td>Name of Personnel</td>
<td>&nbsp;</td>
<td><input name="txtname" type="Text" size="50" /></td>
</tr>
<tr><td>Gender</td>
<td>&nbsp;</td>
<td><input type="Radio" name="gender" value="Male">Male &nbsp &nbsp<input type="Radio" name="gender" value="Female">Female &nbsp &nbsp<input type="Radio" name="gender" value="Other">Other</td>
</tr>
<tr><td>Date of Birth</td>
<td>&nbsp;</td>
<td><input name="txtdob" type="Text" size="20"></td>
</tr>
<tr><td>Full Address</td>
<td>&nbsp;</td>
<td><input name="txtaddress" type="Text" size="50" /></td>
</tr>
<tr><td>Email Address</td>
<td>&nbsp;</td>
<td><input name="txtemail" type="Text" size="50" /></td>
</tr>
<tr><td>District</td>
<td>&nbsp;</td>
<td>
<?php include("../district_list.htm");?></td>
</tr>
<tr><td>Rural/Municipality</td>
<td>&nbsp;</td>
<td>
<div id="txtHint">Municipality/Rural</div>
</td>
</tr>
<tr><td>Ward No.</td>
<td>&nbsp;</td>
<td><input name="txtwn" type="Text" size="20" /></td>
</tr>
<tr><td>Contact</td>
<td>&nbsp;</td>
<td><input name="txtcontact" type="Text" size="20" /></td>
</tr>

<tr><td>Appointment Date</td>
<td>&nbsp;</td>
<td><input name="txtad" type="Text" size="20" /></td>
</tr>
<tr><td>Appointment Type</td>
<td>&nbsp;</td>
<td><select name="cmbtype">
         <option>Permanent</option>
         <option>Temporarry</option>
         <option>Others</option>

</select>
</td>
</tr>
<tr><td>Level</td>
<td>&nbsp;</td>
<td><select name="cmblevel">
         <option>Level 1</option>
         <option>Level 2</option>
</select></td>
</tr>
<tr><td>Name of Office</td>
<td>&nbsp;</td>
<td><input name="txtsname" type="Text" size="50" /></td>
</tr>
<tr><td>Address of Office</td>
<td>&nbsp;</td>
<td><input name="txtsaddress" type="Text" size="50" /></td>
</tr>
<tr><td>Office Contact</td>
<td>&nbsp;</td>
<td><input name="txtscontact" type="Text" size="20" /></td>
</tr>
<tr>
<td>Password</td>
<td>&nbsp;</td>
<td><input type="Password" name="txtpass"></td>
</tr>
<tr>
<td colspan="3" align="center"><input name="btnsave" type="Submit" value="Save" class="button"></td>
</tr>
</table>
</form>
</body>

</html>
