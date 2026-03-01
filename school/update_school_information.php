<html>
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
<?php
   include("title.htm");
  include("Processing/db_connection.php");
   $sql1 = "SELECT schoolname, address, munvdc, wardno, contact, mobileno, email, website, district, authorizeperson, loginname, spass, remark FROM tblschool where schoolcode='$_SESSION[code]'";
$result = $conn->query($sql1);

if ($result->num_rows > 0)
   {

    while($row = $result->fetch_assoc())
    {
         $tname=$row['schoolname'];

         $a=$row['address'];
         $email=$row['email'];
         $d=$row['district'];
         $vdc=$row['munvdc'];
         $ward=$row['wardno'];
         $tc=$row['contact'];
         $mobile=$row['mobileno'];
         $website=$row['website'];
         $authorize=$row['authorizeperson'];
         $ln=$row['loginname'];
         $pass=$row['spass'];
         }
  }

?>
<body>
<form method="Post" action="Object/update_school_info.php">
<table width="100%" class="subtable">
<tr>
<td colspan="3" align="center"><font size="+2"><b>Update School Information</b></font></td>
</tr>
<tr><td align="Right">Name of School</td>
<td>&nbsp;</td>
<td><input name="txtname" type="Text" size="50" value="<?php echo $tname;?>" /><input name="txtscode" type="hidden" size="50" value="<?php echo $_SESSION['code'];?>" /></td>
</tr>
<tr><td align="Right">Full Address</td>
<td>&nbsp;</td>
<td><input name="txtaddress" type="Text" size="60" value="<?php echo $a;?>"/></td>
</tr>
<tr><td align="Right">Ward No.</td>
<td>&nbsp;</td>
<td><input name="txtward" type="Text" size="5" value="<?php echo $ward;?>"/></td>
</tr>
<tr><td align="Right">Web Site</td>
<td>&nbsp;</td>
<td><input name="txtwebsite" type="Text" size="50" value="<?php echo $website;?>"/></td>
</tr>
<tr><td align="Right">Email</td>
<td>&nbsp;</td>
<td><input name="txtemail" type="Text" size="20" value="<?php echo $email;?>"/></td>
</tr>
<tr><td align="Right">Phone No.</td>
<td>&nbsp;</td>
<td><input name="txtcontact" type="Text" size="20" value="<?php echo $tc;?>"/></td>
</tr>
<tr><td align="Right">Mobile No.</td>
<td>&nbsp;</td>
<td><input name="txtmobile" type="Text" size="20" value="<?php echo $mobile;?>"/></td>
</tr>
<tr><td align="Right">Head Teacher</td>
<td>&nbsp;</td>
<td><input name="txtauthorize" type="Text" size="20"value="<?php echo $authorize;?>"/></td>
</tr>
<tr><td align="Right">Login Name*</td>
<td>&nbsp;</td>
<td><input name="txtloginname" type="Text" size="20" value="<?php echo $ln;?>"/></td>
</tr>

<tr><td align="Right">Password*</td>
<td>&nbsp;</td>
<td><input name="txtpass" type="Password" size="20" value="<?php echo $pass;?>"/></td>
</tr>

<tr>
<td colspan="3" align="Center"><input name="btnsave" type="Submit" value="Save" /></td>
</tr>

</table>
</form>
</body>

</html>
