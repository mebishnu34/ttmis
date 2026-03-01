<?php
session_start();
include("../Processing/db_connection.php");
if(isset($_GET['id']))
{
 $_SESSION['trunid']=$_GET['id'];
 $sql = "SELECT trainingid from tblruntraining where id='$_SESSION[trunid]'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
	$_SESSION['trainingid']= $row["trainingid"];
	}
	}
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
<td colspan="3" align="center"><input name="btnschool" type="Submit" value="By School" class="button">&nbsp;&nbsp;&nbsp; <input name="btnmun" type="Submit" value="By Palika" class="button">&nbsp;&nbsp;&nbsp; <input name="btndistrict" type="Submit" value="By EDCU" class="button"></td>
</tr>
  </table>
  </form>
  <font color="red" size="+2"><b>
  <ul>
    <li>विद्यालयबाट शिक्षकहरु छान्नको लागि विद्यालयसम्म छानेर By School मा Click गर्नुहोस ।</li>
    <li>स्थानिय तहबाट शिक्षकहरु छान्नको लागि स्थानिय तहसम्मको नाम छानेर By Palika मा  Click गर्नुहोस ।</li>
    <li>जिल्लाबाट शिक्षकहरु छान्नको लागि जिल्लामात्र छानेर By EDCU मा Click गर्नुहोस ।</li>
</ul>
</b>
</font>
</BODY>

</HTML>
