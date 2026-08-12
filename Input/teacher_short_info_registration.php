<html>
<head>
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
<?php
   include("../Processing/db_connection.php");
   include("title.htm");
   $sqlid = "SELECT max(teacherid) FROM tblteacher";
   $resultid = $conn->query($sqlid);
         if ($resultid->num_rows > 0)
         {
    // output data of each row
	   while($row = $resultid->fetch_assoc())
               {
               $tid=$row['max(teacherid)']+1;
                 }
   		}

?>
<body>
<form method="POST" Action="../Object/save_short_info_teacher.php">
<table bgcolor="#FFFFFF" cellpadding="5" width="95%">
<tr>
<td colspan="3" align="Center"><font size="+2" color="Blue"><u>Teacher Registration</u></font></td>
</tr>
<tr><td align="right">Teacher Code*</td>
<td>&nbsp;</td>
<td><input name="txtcode" type="Text" size="20" value="<?php echo $tid;?>"  readonly="True"/></td>
</tr>

<tr><td align="right">Name of Teacher*</td>
<td>&nbsp;</td>
<td><input name="txtname" type="Text" size="50" /></td>
</tr>
<tr><td align="right">Mobile No.*Eng.</td>
<td>&nbsp;</td>
<td><input name="txtcontact" type="Text" size="20" /></td>
</tr>
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
</tr>
 <td colspan="3" align="center"><input name="btnsave" type="Submit" value="Save" class="button"></td>
</tr>
</table>
</form>
</body>

</html>
