<HTML>
<?php
   include("title.htm");
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

<BODY>
<form method="Post" Action="../Object/save_sms.php">
    <table class="subtable" cellpadding="0">
           <tr>
           <td align="Right">To</td>
           <td><input type="text" name="txtreceipent" size="50"></td>
           </tr>
		   <tr>
           <td align="Center" colspan="2">OR</td>
           <tr>
            <td align="Right">To Group</td>
             <td width="70%">
              <select name="cmbgroup">
			  		<option>None</option>
                   <option>Organization</option>
                      <option>Staff</option>
					  <option>School</option>
					  <option>Local Government</option>
					  <option>Municipality</option>
					  <option>Gaunpalika</option>
               </select>
             </td>
    </tr>
	<tr>
           <td align="Center" colspan="2">OR</td>
           <tr>
	<tr>
    <td align="right">Name of District*</td>
    <td width="70%"><?php include("../district_list.htm");?>
</td>
    </tr>
	<tr>
    <td align="right">Send SMS To School Of</td>
    <td><div id="txtHint">Municipality/Rural</div> </td>
    </tr>
           <tr>
               <td align="Right">Title</td>
               <td><input type="text" name="txttitle" size="20"></td>
           </tr>
           <tr>
               <td align="Right">Message*</td>
               <td><textarea name="txtsms" cols="70" rows="5"></textarea></td>
           </tr>

           <tr>
               <td colspan="2" align="center"><input type="submit" value="Send" class="button"></td>
           </tr>
    </table>
</form>
</BODY>
</HTML>
