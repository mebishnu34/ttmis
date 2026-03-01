
<?php
   include("../Processing/db_connection.php");
   $utype=$_POST['cmbtype'];
  ?>
 <html>
<head>
<title>TTMIS</title>
<link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
</head>
<body>
<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="..\Image\logo.svg" width="200" height="180"></td>
<td align="left" bgcolor="#FFFFFF" class="tdradius"><center><img src="..\Image\banner.jpg" width="90%" height="180"></center></td>
</tr>
<tr>
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><a href="..\Admin\report.php">Back</a></font></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<table width="100%" class="dtable">
	<tr>
	<td align="center">S.No</td>
	<td align="center">Name of User</td>
	<td align="center">Login Name</td>
	<td align="center">Date/Time</td>
</tr>
<?php
if($utype=="All")
{
$i=1;
	$sql="SELECT * FROM tbllogin ORDER BY ID";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result))
		{
	    echo "<tr>";
    	echo "<td align=center>".$i."</td>";
	    echo "<td align=center>".$row["username"]."</td>";
    	echo "<td align=center>".$row["loginuser"]."</td>";
	    echo "<td align=center>".$row["ldate"]."</td>";
        $i++;
    	echo "</tr>";
		}
}
else
{
$i=1;
	$sql="SELECT * FROM tbllogin where loginuser='$utype' ORDER BY ID";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result))
		{
	    echo "<tr>";
    	echo "<td align=center>".$i."</td>";
	    echo "<td align=center>".$row["username"]."</td>";
    	echo "<td align=center>".$row["loginuser"]."</td>";
	    echo "<td align=center>".$row["ldate"]."</td>";
        $i++;
    	echo "</tr>";
		}
}
?>
</table>
</body>
</html>
