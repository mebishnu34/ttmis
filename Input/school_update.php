<HTML>
<HEAD>
 <TITLE>TTMIS Bagamati</TITLE>
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<link rel="stylesheet" href="../CSS/main_table.css">
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
        xmlhttp.open("GET","dropdistrict_1.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</HEAD>
<?php
include("../Processing/db_connection.php");
if(isset($_GET['scode']))
{
$code = $_GET['scode'];
$sql1 = "SELECT * FROM tblschool where ID='$code'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0)
      {
      if($row = $result1->fetch_assoc())
         {
        $school= $row['schoolname'];
        $scode= $row['schoolcode'];
		$address= $row['address'];
		$district= $row['district'];
		$mun= $row['munvdc'];
		$ward= $row['wardno'];
		$contact= $row['contact'];
		$mobileno=$row['mobileno'];
		$email= $row['email'];
		$website= $row['website'];
		$head= $row['authorizeperson']; 
          }
   }
?>

<BODY class="bg">
<form method="Post" action="../Object/update_school.php">
<table width="100%" class="subtable" border="0" class="10" cellpadding="5">
<tr>
<td colspan="3" align="center">School Update</td>
</tr>
<tr><td align="right">Name of School</td>
<td>&nbsp;</td>
<td><input name="txtname" type="Text" size="50" value="<?php echo $school;?>" /></td>
</tr>
<tr><td align="right">School Code</td>
<td>&nbsp;</td>
<td><input name="txtscode" type="Text" size="20" value="<?php echo $scode;?>"><input name="txtcode" type="hidden" size="20" value="<?php echo $code;?>"  readonly="True"/></td>
</tr>
<tr>
<td align="right">District</td>
<td>&nbsp;</td>
<td>
<?php echo $district;?> (Select District*)
<?php include("../district_list_1.htm");?></td>
</tr>
</tr>
<tr><td align="right">Rural/Municipality</td>
<td>&nbsp;</td>
<td>
<?php echo $mun;?> (Select Local Government*)
<div id="txtHint">Municipality/Rural</div>
</td>
</tr>
<tr><td align="right">Ward No.</td>
<td>&nbsp;</td>
<td><input name="txtward" type="Text" size="5" value="<?php echo $ward;?>" /></td>
</tr>
<tr><td align="right">Tole</td>
<td>&nbsp;</td>
<td><input name="txtaddress" type="Text" size="60" value="<?php echo $address;?>" /></td>
</tr>
<tr><td align="right">Web Site</td>
<td>&nbsp;</td>
<td><input name="txtwebsite" type="Text" size="50" value="<?php echo $website;?>" /></td>
</tr>
<tr><td align="right">Email</td>
<td>&nbsp;</td>
<td><input name="txtemail" type="Text" size="20" value="<?php echo $email;?>" /></td>
</tr>
<tr><td align="right">Phone No.</td>
<td>&nbsp;</td>
<td><input name="txtcontact" type="Text" size="20" value="<?php echo $contact;?>" /></td>
</tr>

<tr><td align="right">Name of HT</td>
<td>&nbsp;</td>
<td><input name="txtauthorize" type="Text" size="20" value="<?php echo $head;?>" /></td>
</tr>
<tr><td align="right">Mobile No.*Eng.</td>
<td>&nbsp;</td>
<td><input name="txtmobile" type="Text" size="20" value="<?php echo $mobileno;?>" /></td>
</tr>
<tr>
<td colspan="3" align="Center"><input name="btnupdate" type="Submit" value="Update" /></td>
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
