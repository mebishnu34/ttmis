<HTML>
<HEAD>
<link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
</HEAD>
<BODY class="bg">
<div align="center">
<table width="100%">
<tr>
<th align="center">S.No</th>
<th>Name of Teacher</th>
<th align="center">Contact</th>
<th>School Code</th>
<th>Municipality/Rural</th>
</tr>
<?php
$sn=1;
       $sql="SELECT * FROM tblregrequest where remark='Request' ";
    $result1 = mysqli_query($conn,$sql);
    while($row1 = mysqli_fetch_array($result1))
    {
          echo "<tr>";
          echo "<td align=center>". $sn . "</td>";
          echo "<td>" . $row1["tname"] . "</td>";
          echo "<td>" . $row1["tcontact"] . "</td>";
          echo "<td>" . $row1["schoolcode"] . "</td>";
          echo "<td>" . $row1["munvdc"] . "</td>";
          echo "<td><a href=../Input/request_registration.php?linkid=". $row1["id"] ." target=blank>Accept<a> <a href=../Input/remark_for_rejection.php?linkid=". $row1["id"] ." target=blank>Reject</a></td>";
          echo "</td>";
          echo "</tr>";
    $sn++;
    }

?>
</table>
</BODY>
</HTML>
