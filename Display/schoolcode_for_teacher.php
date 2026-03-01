<html>
<head>
<script>
function district1(str) {
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
        xmlhttp.open("GET","dropdistrict_1.php?q="+str,true);
        xmlhttp.send();
    }
}
function schoolmun(str) {
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
        xmlhttp.open("GET","dropschool.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
</head>
</html>
 <form action="../Display/display_school_teacher.php" method="Post" target="_blank">
  <table>
  <tr><td align="right">District of School*</td>
<td>&nbsp;</td>
<td>
<?php include("../district_list_1.htm");?>
</td>
</tr>
<tr><td align="right">Rural/Mun of School*</td>
<td>&nbsp;</td>
<td>
<div id="txtHint1">Municipality/Rural</div>
</td>
</tr>
<tr><td align="right">Name of School*</td>
<td>&nbsp;</td>
<td>
<div id="txtHint2">Name of School</div>
</td>
</tr>
<tr>
<td colspan="3" align="center"><input name="btnsave" type="Submit" value="Display" class="button"></td>
</tr>
  </table>
  </form>

