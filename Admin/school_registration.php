<html>
<script>
function district1(str) {
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
        xmlhttp.open("GET","dropdistrict_1.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<?php
   include("title.htm");
   include("Processing/db_connection.php");
   $sqlid = "SELECT max(schoolcode) FROM tblschool";
   $resultid = $conn->query($sqlid);
         if ($resultid->num_rows > 0)
         {
    // output data of each row
	   while($row = $resultid->fetch_assoc())
               {
               $tid=$row['max(schoolcode)']+1;
                 }
   		}
?>
<body>
<form method="Post" action="Object/save_school_1.php">
<table width="100%" class="subtable" border="0" class="10">
<tr>
<td colspan="3" align="center"><font size="+2"><b>School Registration</b></font></td>
</tr>
<tr><td align="right">School Code</td>
<td>&nbsp;</td>
<td><input name="txtcode" type="Text" size="10" value="<?php echo $tid;?>"></td>
</tr>

<tr><td align="right">Name of School</td>
<td>&nbsp;</td>
<td><input name="txtname" type="Text" size="50" /></td>
</tr>

</tr>
<tr><td align="right">Ward No.</td>
<td>&nbsp;</td>
<td><input name="txtward" type="Text" size="5" /></td>
</tr>
<tr><td align="right">Tole</td>
<td>&nbsp;</td>
<td><input name="txtaddress" type="Text" size="60" /></td>
</tr>
<tr><td align="right">Web Site</td>
<td>&nbsp;</td>
<td><input name="txtwebsite" type="Text" size="50" /></td>
</tr>
<tr><td align="right">Email</td>
<td>&nbsp;</td>
<td><input name="txtemail" type="Text" size="20" /></td>
</tr>
<tr><td align="right">Phone No.</td>
<td>&nbsp;</td>
<td><input name="txtcontact" type="Text" size="20" /></td>
</tr>

<tr><td align="right">Name of HT</td>
<td>&nbsp;</td>
<td><input name="txtauthorize" type="Text" size="20" /></td>
</tr>
<tr><td align="right">Mobile No.*Eng.</td>
<td>&nbsp;</td>
<td><input name="txtmobile" type="Text" size="20" /></td>
</tr>
<tr>
<td colspan="3" align="Center"><input name="btnsave" type="Submit" value="Save" /></td>
</tr>

</table>
</form>
</body>

</html>
