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
</script>

 <TITLE>TTIMS</TITLE>
 <link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
</HEAD>
<BODY class="bg">
<div align="center">
<table width="95%" border="1" class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="..\Image\logo.svg" width="150" height="100"></td>
<td bgcolor="#FFFFFF" align="left" class="tdradius"><center><img src="..\Image\banner.jpg" width="800" height="150"></center></td>
</tr>
<tr>
<td bgcolor="#0852FA" align="Right"></font></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
 </table>
<?php
if($_GET['tlinkid'])
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
}
?>
<form method="Post" action="../Object/update_school_info_1.php">
<table width="80%" align="center">
<tr>
<td colspan="3" align="center">Update School Information( <?php echo $scode;?>)<input name="txtcode" type="hidden" size="50" value="<?php echo $scode;?>" /></td>
</tr>
<tr><td>Name of School</td>
<td>&nbsp;</td>
<td><input name="txtname" type="Text" size="50" value="<?php echo $tname;?>" /></td>
</tr>
<tr><td>Full Address</td>
<td>&nbsp;</td>
<td><input name="txtaddress" type="Text" size="60" value="<?php echo $a;?>"/></td>
</tr>
<tr>
<td>District</td>
<td>&nbsp;</td>
<td>
<select name="cmbdistrict" onchange="district(this.value)">
        <option><?php echo $d;?></option>
        <option>Select District</option>
           <option>भक्तपुर</option>
           <option>चितवन</option>
            <option>धादिंग</option>
           <option>दोलखा </option>
           <option>काठमाण्डौ</option>
           <option>काभ्रेपलाञ्चोक </option>
           <option>ललितपुर</option>
           <option>मकवानपुर</option>
           <option>नुवाकोट </option>
           <option>रामेछाप</option>
           <option>रसुवा</option>
           <option>सिन्धुली</option>
           <option>सिन्धुपाल्चोक</option>
</select>
</td>
</tr>
</tr>
<tr><td>Rural/Municipality</td>
<td>&nbsp;</td>
<td>
<div id="txtHint">Municipality/Rural</div>
</td>
</tr>
<tr><td>Ward No.</td>
<td>&nbsp;</td>
<td><input name="txtward" type="Text" size="5" value="<?php echo $ward;?>"/></td>
</tr>
<tr><td>Web Site</td>
<td>&nbsp;</td>
<td><input name="txtwebsite" type="Text" size="50" value="<?php echo $website;?>"/></td>
</tr>
<tr><td>Email</td>
<td>&nbsp;</td>
<td><input name="txtemail" type="Text" size="20" value="<?php echo $email;?>"/></td>
</tr>
<tr><td>Phone No.</td>
<td>&nbsp;</td>
<td><input name="txtcontact" type="Text" size="20" value="<?php echo $tc;?>"/></td>
</tr>
<tr><td>Mobile No.</td>
<td>&nbsp;</td>
<td><input name="txtmobile" type="Text" size="20" value="<?php echo $mobile;?>"/></td>
</tr>
<tr><td>Head Teacher</td>
<td>&nbsp;</td>
<td><input name="txtauthorize" type="Text" size="20"value="<?php echo $authorize;?>"/></td>
</tr>
<tr><td>Login Name*</td>
<td>&nbsp;</td>
<td><input name="txtloginname" type="Text" size="20" value="<?php echo $ln;?>"/></td>
</tr>

<tr><td>Password*</td>
<td>&nbsp;</td>
<td><input name="txtpass" type="Password" size="20" value="<?php echo $pass;?>"/></td>
</tr>

<tr>
<td colspan="3" align="Center"><input name="btnsave" type="Submit" value="Update" /></td>
</tr>

</table>
</form>
</body>

</html>
