<HTML>
<HEAD>
 <?php
  include("../Processing/db_connection.php");
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

function teachermun(str) {
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
        xmlhttp.open("GET","../Display/tpd_localgov_report.php?t="+str,true);
        xmlhttp.send();
    }
}
function teacherall(str) {
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
        xmlhttp.open("GET","teacher_display_all.php?t="+str,true);
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
<td>
<?php include("../district_list.htm");?></td>
<td>
<div id="txtHint">Municipality</div></td>
<td>Search By<input type="Text" onchange="teacherall(this.value)"></td>
</tr>

</table>
</form>
<div id="txtHint1">Teacher Display</div>
</BODY>
</HTML>
