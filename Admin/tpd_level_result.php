<HTML>
<HEAD>

 <?php
  include("../Processing/db_connection.php");
 ?>

<script>
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
        xmlhttp.open("GET","level_subject.php?l="+str,true);
        xmlhttp.send();
    }
}
function subjects(str) {
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
        xmlhttp.open("GET","tpd_step.php?s="+str,true);
        xmlhttp.send();
    }
}

function trainingstep(str) {
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
        xmlhttp.open("GET","../Display/tpd_level_report_1.php?step="+str,true);
        xmlhttp.send();
    }
}
</script>
	<link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
</HEAD>
<BODY>
<form method="post">
<table width="100%" class="subtable">
<tr>
    <td align="right">Level:</td>
    <td align="Left">
    <select name="cmblevel" onchange="level(this.value)" class="normaltext">
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
    
<td align="Right">Subject: </td>
<td align="Left">
    <div id="txtHint">Subject</div>
</td>
<td align="Right">Training Step:</td>
<td align="Left">
<div id="txtHint1">Training Step</div>
</td>
</tr>

</table>
</form>
<div id="txtHint2">Teacher Display</div>
</BODY>
</HTML>
