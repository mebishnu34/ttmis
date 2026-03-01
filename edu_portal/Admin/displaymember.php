<?php
include("header.php");
$dfrom=$_SESSION['dfrom'];
$dto=$_SESSION['dto'];
if($dfrom=="" && $dto=="")
{
	$sql="Select memberid, fname, gender, address, email, contact, memphoto, institute, level, faculty, lname, lpass, Remark from tblmember where remark='Approved'";
	$rownum=$conn_1->query($sql);
}
else
{
	$sql="Select memberid, fname, gender, address, email, contact, memphoto, institute, level, faculty, lname, lpass, Remark from tblmember where ondate>='$dfrom' and ondate<='$dto'";
	$rownum=$conn_1->query($sql);
}
$i=0;
?>
<body>

<table width="90%" border="0" align="center">
<tr>
<td align="left" colspan="10" bgcolor="#0000FF"><b><a href="index.php">Back</a></b></td>
</tr>

<tr>
<td align="center"><b>S.No</b></td>
<td align="center"><b>Name of Member</b></td>
<td align="center"><b>Gender</b></td>
<td align="center"><b>Address</b></td>
<td align="center"><b>E-mail</b></td>
<td align="center"><b>Contact No.</b></td>
<td align="center"><b>Level</b></td>
<td align="center"><b>Login Name</b></td>
<td align="center"><b>Password</b></td>
<td align="center"><b>Remark</b></td>
<td align="center"><b>Action</b></td>
</tr>
<?php
if($rownum->num_rows>0)
{
	$i=1;
	while($data=$rownum->fetch_assoc())
		{
			echo "</tr>";
			echo "<td align=center>" . $i . "</td>";
			echo "<td>" . $data["fname"]. "</td>";
			echo "<td>" . $data["gender"] . "</td>";
			echo "<td>" . $data["address"] . "</td>";
			echo "<td>" . $data["email"] . "</td>";
			echo "<td>" . $data["contact"] . "</td>";
			echo "<td>" . $data["level"] . "</td>";
			echo "<td>" . $data["lname"] . "</td>";
			echo "<td>" . $data["lpass"] . "</td>";
			echo "<td>" . $data["Remark"] . "</td>";
				echo "<td bgcolor=#0000FF><a href=../php/member_action.php?approve=" . $data["membe
				rid"]. ">Approve" 
		. "<a href=../php/member_action.php?remove=" . $data["memberid"]. "> Removed</td>";
			echo "</tr>";
			$i++;
}		}
?>
</table>
</body>
</html>
