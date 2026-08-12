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
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1" color="#FFFFFF"><b>Teacher Training Management System(TTMIS)</b></font></td>
<td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"><?php echo $_SESSION['uname'];?></font></td>
</tr>
 </table>
<?php
   include("../Processing/db_connection.php");
   include("../title.htm");
if(isset($_GET['tlinkid']))
{
	$tid=$_GET['tlinkid'];
   $sql1 = "SELECT tname, teachercode,munvdc, schoolname FROM tblteacher where teacherid='$tid'";
   $result1 = $conn->query($sql1);

   if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         $tname=$row['tname'];
		 $tcode=$row['teachercode'];
		 $schoolname=$row['schoolname'];
		 $palika=$row['munvdc'];
         }
      }
?>
<form method="POST" Action="../Object/change_palikateacher_school.php">
<table class="maintable">
<tr>
<td colspan="3" align="Center">Update Teacher Information</td>
</tr>
<tr><td align="Right">Teacher Code</td>
<td>&nbsp;</td>
<td><?php echo $tcode;?><input name="teacherid" type="hidden" size="20" value="<?php echo $tid;?>" Readonly="True" /></td>
</tr>

<tr><td align="Right">Name of Teacher</td>
<td>&nbsp;</td>
<td><?php echo $tname;?><input name="txtname" type="hidden" size="50" value="<?php echo $tname;?>" readonly="true"/></td>
</tr>
<tr><td align="Right">Name of School</td>
<td>&nbsp;</td>
<td><?php echo $schoolname;?></td>
</tr>
<tr><td align="Right">Palika</td>
<td>&nbsp;</td>
<td><?php echo $palika;?></td>
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

<tr><td align="right">Name of School*</td>
<td>&nbsp;</td>
<td>
<?php 
$sql="SELECT * FROM tblschool where munvdc='$_SESSION[uname]' and (remark='Running' or remark='Registered')";
$result = mysqli_query($conn,$sql);
echo "<Select name=cmbschool>";
while($row = mysqli_fetch_array($result))
      {
      echo "<option>" . $row['schoolname'] . "</option>";
     }
echo "</select>";
?>
</td>
</tr>
<tr><td align="Right">Remark</td>
<td>&nbsp;</td>
<td><select name="cmbremark">
         <option selected>Working</option>
         <option>Leave</option>
		 <option>Transfer</option>
		 <option>Reassign</option>
		 <option>Demise</option>
		 <option>Other</option>

</select>
</td>
</tr>
<tr>
<td colspan="3" align="center"><input name="btnsave" type="Submit" value="Change" class="button"></td>
</tr>
</table>
</form>
<?php
}
if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
?>
</body>

</html>
