<HTML>
<HEAD>
<?php
   include("title.htm")
?>
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
</HEAD>
<BODY>
    <form method="POST" Action="../Object/save_contact.php">
    <table class="subtable" cellpadding="10">
    <tr>
    <td colspan="2" align="center">Municipality/Rural</td>
    </tr>
    <tr>
    <td align="right">Name of District*</td>
    <td width="70%"><?php include("../district_list.htm");?>
</td>
    </tr>
        <tr>
    <td align="right">Municipality/VDC Name*</td>
    <td><div id="txtHint">Municipality/Rural</div> </td>
    </tr>
    <tr>
    <td align="right">Name of Office*</td>
    <td><input type="text" name="txtofficename" size="40" class="normaltext"> </td>
    </tr>
    <tr>
    <td align="right">Phone No.</td>
    <td><input type="text" name="txtphone" size="20" class="normaltext"> </td>
    </tr>
      <tr>
    <tr>
    <td align="right">Mobile No.*</td>
    <td><input type="text" name="txtmobile" size="20" class="normaltext"> </td>
    </tr>
      <tr>
    <td align="right">Email</td>
    <td><input type="text" name="txtemail" size="20" class="normaltext"> </td>
    </tr>
    <tr>
    <td align="right">Contact Group*</td>
    <td width="60%">
    <select name="cmbgroup" class="normaltext">
           <option>Organization</option>
           <option>Staff</option>
    </select>
</td>
    </tr>
   <tr>
    <td align="right">Authorized Person</td>
    <td><input type="text" name="txthead" size="20" class="normaltext"> </td>
    </tr>
   <tr>
    <td colspan="2" align="center"><input type="submit" name="btnsave" value="Save" class="button"></td>
    </tr>
    </table>
    </form>
</BODY>
</HTML>
