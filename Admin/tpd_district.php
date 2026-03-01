<HTML>
<HEAD>
 <?php
  include("../Processing/db_connection.php");
 ?>

<script>
function district(str) {
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
        xmlhttp.open("GET","../Display/tpd_district_report.php?t="+str,true);
        xmlhttp.send();
    }
}
</script>
<link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
</HEAD>
<BODY>
<form method="post" action="../export/export_teacher_district.php">
<table width="100%" class="subtable">
<tr>
<td>
<?php include("../district_list.htm");?></td>
<td></td>
</tr>
</table>
<div id="txtHint1">&nbsp;</div>
<div><input type="submit" value="Export In Excel" name="teacherdistrict"></div>
</form>
</BODY>
</HTML>
