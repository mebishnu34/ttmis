<?php
session_start();
   include("../Processing/db_connection.php");
   include("../title.htm");
   $uname1=$_POST['cmbuser'];
   $dfrom=$_POST['txtdfrom'];
   $dto=$_POST['txtdto'];
?>
<HTML>
<HEAD>
 <TITLE>TTMIS</TITLE>
  <link rel="stylesheet" href="../CSS/main_table.css">
  <link rel="stylesheet" href="../CSS/sidemenu.css">
</HEAD>
<BODY class="bg">
<div align="center">
<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="..\Image\logo.svg" width="200" height="180"></td>
<td align="left" bgcolor="#FFFFFF" class="tdradius"><center><img src="..\Image\banner.jpg" width="90%" height="180"></center></td>
</tr>
<tr>
<td colspan="0" bgcolor="#0852FA" align="Right"><a href="../Admin/report.php">Back</a></td>
<td colspan="0" bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><?php echo $_SESSION['uname'];?></font></td>

</tr>

</table>

<table width="100%" class="dtable">
<?php
$i=1;
if($dfrom=="" and $dto=="")
{
	if($uname1=="All")
	{
?>
	<tr>
	<td align="center">S.No</td>
	<td>Mobile No.</td>
	<td align="center">SMS</td>
	<td>ondate</td>
	<td>Send By</td>
	</tr>
<?php
	$sql="SELECT * FROM tblsms ORDER BY ondate DESC";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result))
		{
	    echo "<tr>";
    	echo "<td align=center>".$i."</td>";
	    echo "<td align=center>".$row["receipient"]."</td>";
    	echo "<td align=center>".$row["sms"]."</td>";
	    echo "<td align=center>".$row["ondate"]."</td>";
		echo "<td align=center>".$row["sendby"]."</td>";
         $i++;
    	echo "</tr>";
		}
	}
	else
	{
?>
	<tr>
	<td align="center">S.No</td>
	<td>Mobile No.</td>
	<td align="center">SMS</td>
	<td>ondate</td>
	</tr>
	<?php
	$sql="SELECT * FROM tblsms where sendby='$uname1' ORDER BY ondate DESC";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result))
		{
	    echo "<tr>";
    	echo "<td align=center>".$i."</td>";
	    echo "<td align=center>".$row["receipient"]."</td>";
    	echo "<td align=center>".$row["sms"]."</td>";
	    echo "<td align=center>".$row["ondate"]."</td>";
         $i++;
    	echo "</tr>";
		}
	}	
}
else
{
if($uname1=="All")
	{
?>
	<tr>
	<td align="center">S.No</td>
	<td>Mobile No.</td>
	<td align="center">SMS</td>
	<td>ondate</td>
	<td>Send By</td>
	</tr>
	<?php
	$sql="SELECT * FROM tblsms where DATE_FORMAT(ondate,'%Y-%m-%d')>='$dfrom' and DATE_FORMAT(ondate,'%Y-%m-%d')<='$dto' ORDER BY ondate DESC";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result))
		{
	    echo "<tr>";
    	echo "<td align=center>".$i."</td>";
	    echo "<td align=center>".$row["receipient"]."</td>";
    	echo "<td align=center>".$row["sms"]."</td>";
	    echo "<td align=center>".$row["ondate"]."</td>";
		echo "<td align=center>".$row["sendby"]."</td>";
         $i++;
    	echo "</tr>";
		}
	}
	else
	{
?>
	<tr>
	<td align="center">S.No</td>
	<td>Mobile No.</td>
	<td align="center">SMS</td>
	<td>ondate</td>
	</tr>
<?php
	$sql="SELECT * FROM tblsms where sendby='$uname1' and DATE_FORMAT(ondate,'%Y-%m-%d')>='$dfrom' and DATE_FORMAT(ondate,'%Y-%m-%d')<='$dto' ORDER BY ondate DESC";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result))
		{
	    echo "<tr>";
    	echo "<td align=center>".$i."</td>";
	    echo "<td align=center>".$row["receipient"]."</td>";
    	echo "<td align=center>".$row["sms"]."</td>";
	    echo "<td align=center>".$row["ondate"]."</td>";
         $i++;
    	echo "</tr>";
		}
	}
}
?>
</table>

