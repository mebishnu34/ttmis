<HTML>
<HEAD>
 <?php
  include("../Processing/db_connection.php");
 ?>
   <script>
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
</HEAD>
<BODY>
<form method="post">
<table width="100%">
<tr>
 <td>Search By<input type="Text" onchange="teacherall(this.value)"></td>
</tr>
</table>
</form>
<div id="txtHint1"></div>
<table width="100%">
<tr>
<th align="center">S.No</th>
<th align="center">Teacher ID</th>
<th>Name of Teacher</th>
<th align="center">Contact</th>
<th>Email</th>
</tr>
<?php
$sn=1;
include("..\Processing\db_connection.php");
$sql1 = "SELECT * FROM tblteacher ORDER BY district,munvdc,tname";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    echo "<tr>";
    echo "<td align=center>". $sn . "</td>";
   echo "<td align=center><a href=teacher_details.php?tid=$row[teacherid] target=_blank>" . $row["teacherid"] . "</a></td>";
    echo "<td>" . $row["tname"] . "</td>";
    echo "<td>" . $row["tcontact"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    $sn++;
    }
   }

?>
<form name="export" action="../export/display_teacher_export.php" method="post">
				<input type="submit" value="Save In Excel">
		</form>

</BODY>
</HTML>
