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
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><BODY>
<form method="Post" Action="../Display/tpd_allteacher_report_result.php" target="_blank">
    <table class="subtable"  cellpadding="10">
           <tr>
          <td colspan="2" align="center">Teacher Subject TPD Result</td>
        </tr>
              <tr>
               <td align="right">Name of Training*</td>
               <td>
                <Select name="cmbtraining" onchange="training(this.value)" class="normaltext">
                 <option>शिक्षक पेशागत विकास</option>
                        <option>पुनर्ताजगी</option>
                        <option>नेतृत्व तथा व्यवस्थापन</option>
                </select>
                </td>
           </tr>
           <tr>
    <td align="right">Training Level*</td>
    <td><select name="cmblevel" onchange="level(this.value)" class="normaltext">
        <option>Select Level</option>
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
    <td><div id="txtHint">Subject</div>
     </td>
    </tr>
    <tr>
               <td colspan="2" align="center"><input type="submit" value="Display" name="btndisplay" class="button"></td>
       </tr>
    </table>
</form>
</BODY>
</HTML>
