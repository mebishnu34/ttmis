<?php
session_start();
?>
<HTML>
<HEAD>
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
        xmlhttp.open("GET","../Admin/dropdistrict.php?q="+str,true);
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
        xmlhttp.open("GET","../dropdistrict_1.php?q="+str,true);
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
        xmlhttp.open("GET","../dropschool.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
 <TITLE>TTIMS</TITLE>
 <link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
</HEAD>
<BODY class="bg">
<div align="center">
<table width="95%" border="1" class="maintable">
<tr>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td  valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130"></td>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr
><tr>
<td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1" color="#FFFFFF"><b>Teacher Training Management Information System(TTMIS)</b></font></td>
<td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"><?php echo $_SESSION['uname'];?></font></td>
</tr>
 </table>
<?php
$scode="";
$tname="";
$a="";
if(isset($_GET['tlinkid']))
{
$scode=$_GET['tlinkid'];
include("../title.htm");
include("../Processing/db_connection.php");
   $sql1 = "SELECT schoolname, address, munvdc, wardno, contact, mobileno, email, website, district, authorizeperson, loginname, spass, remark FROM tblschool where schoolcode='$scode'";
$result = $conn->query($sql1);

if ($result->num_rows > 0)
   {

    while($row = $result->fetch_assoc())
    {
         $tname=$row['schoolname'];

         $a=$row['address'];
         $email=$row['email'];
         $d=$row['district'];
         $vdc=$row['munvdc'];
         $ward=$row['wardno'];
         $tc=$row['contact'];
         $mobile=$row['mobileno'];
         $website=$row['website'];
         $authorize=$row['authorizeperson'];
         $ln=$row['loginname'];
         $pass=$row['spass'];
         }
  }
?>
<form method="Post" action="../Object/update_palika.php">
<table width="70%" align="center" class="subtable">
<tr>
<td colspan="3" align="center"><font size="+2"><b>Change Palika( <?php echo $scode;?>)</b></font><input name="txtcode" type="hidden" size="50" value="<?php echo $scode;?>" /></td>
</tr>
<tr><td align="Right">School Code</td>
<td>&nbsp;</td>
<td><input name="txtcode" type="Text" size="50" value="<?php echo $scode;?>" readonly="true" /></td>
</tr>
<tr><td align="Right">Name of School</td>
<td>&nbsp;</td>
<td><input name="txtname" type="Text" size="50" value="<?php echo $tname;?>" readonly="true" /></td>
</tr>
<tr><td align="Right">Full Address</td>
<td>&nbsp;</td>
<td><input name="txtaddress" type="Text" size="60" value="<?php echo $a;?>"/></td>
</tr>
<tr><td align="right">District*</td>
<td>&nbsp;</td>
<td>
<?php echo $_SESSION['dname'];?></td>
</tr>
<tr><td align="right">Palika</td>
<td>&nbsp;</td>
<td><?php echo $_SESSION['uname'];?></td>
</tr>
<tr><td align="right">Ward No.</td>
<td>&nbsp;</td>
<td><input name="txtwn" type="Text" size="20" /></td>
</tr>
<tr><td align="Right">Remark</td>
<td>&nbsp;</td>
<td><select name="cmbremark">
<option selected>Running</option>
<option>Close</option>
<option>Merge</option>
<option>Palika Change</option>
</select></td>
</tr>
<tr>
<td colspan="3" align="Center"><input name="btnsave" type="Submit" value="Update" /></td>
</tr>

</table>
</form>
</html>
<?php
}
if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
?>

</body>


