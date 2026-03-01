<HTML>
<HEAD>
 <TITLE>New Document</TITLE>

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
        xmlhttp.open("GET","dropmunicipality.php?q="+str,true);
        xmlhttp.send();
    }
}

function schoolmun(str) {
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
        xmlhttp.open("GET","school_display_municipality.php?m="+str,true);
        xmlhttp.send();
    }
}
</script>

</HEAD>
<BODY>
<table width="100%">
<tr>
<td width="20%">
<?php include("../district_list_1.htm");?>
</td>
<td align="left" width="20%">
<div id="txtHint">Municipality</div></td>
<td>&nbsp;</td>
</tr>
</table>
<table width="100%">
<tr>
<td>
<div id="txtHint1">Municipality</div></td>
</td>
</tr>
</table>

<form name="export" action="../export/display_teacher.php" method="post">
				<input type="submit" value="Save In Excel" name="teacher">
		</form>

</BODY>
</HTML>
