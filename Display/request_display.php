<HTML>
<HEAD>
 <?php
  include("../Processing/db_connection.php");
  $sql1 = "SELECT * FROM tblregrequest where category='Teacher'";
  $result = $conn->query($sql1);
 ?>
</HEAD>
<BODY>
<form method="post">
<table width="100%">
<tr>
 <td>Search By<input type="Text" onchange="teacherall(this.value)"></td>
</tr>
</table>
</form>
<table width="100%">
<tr>
<th align="center">S.No</th>
<th align="center">Teacher ID</th>
<th>Name of Teacher</th>
<th align="center">Contact</th>
<th>Email</th>
<th>Remark</th>
</tr>
<?php
$sn=1;
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    echo "<tr>";
    echo "<td align=center>". $sn . "</td>";
   echo "<td align=center>". $row["requestid"] . "</td>";
    echo "<td>" . $row["tname"] . "</td>";
    echo "<td>" . $row["tcontact"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td><form><input type=Submit value=Approved><input type=Submit value=Reject></td>";
    $sn++;
    }
   }

?>
</BODY>
</HTML>
