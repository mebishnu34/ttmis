<?php
session_start();
if(isset($_GET['id']))
{
 $_SESSION['trainingid']=$_GET['id'];
}

?>
<HTML>
<HEAD>
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
 <TITLE>TTMIS</TITLE>
 <link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
</HEAD>
<BODY>
<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="..\Image\logo.svg" width="200" height="180"></td>
<td align="left" bgcolor="#FFFFFF" class="tdradius"><center><img src="..\Image\banner.jpg" width="90%" height="180"></center></td>
</tr>
<tr>
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><a href="..\Admin\create.php">Back</a></font></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
  <form action="school_teacher.php" method="Post">
   <table align="center">
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
<td colspan="3" align="center"><input name="btnschool" type="Submit" value="School Teacher" class="button"> <input name="btnmun" type="Submit" value="Gov. Teacher" class="button"></td>
</tr>
  </table>
  </form>
</BODY>

</HTML>
