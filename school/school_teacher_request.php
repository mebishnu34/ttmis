<?php
session_start();
if(isset($_GET['id']))
{
 $_SESSION['trainingid']=$_GET['id'];
}

?>
<!DOCTYPE html>
<html>
<head>
<title>TTIMS</title>
<link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
</head>
<body class="bg">
<div align="center">
<table width="80%" class="maintable">
<tr>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td  valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130"></td>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr
><tr>
<td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+2" color="#FFFFFF"><b>Teacher Training Management System(TTMIS)</b></font></td>
<td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"><?php echo $_SESSION['uname'];?></font></td>
</tr>

</table>
<form method="Post" Action="../Object/save_training_request.php">
<table width="90%" bgcolor="#FFFFFF" border="1" cellspacing="0">
<tr>
<th>S.No</th>
<th>Teacher ID</th>
<th>Name of Teacher</th>
<th>Contact</th>
<th>Tick</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>
<?php
include("../Processing/db_connection.php");
$scode = $_SESSION['code'];
$i=1;
//$q = intval($_GET['q']); //for numerice value
$sql="SELECT * FROM tblteacher where scode='$scode' and (remark='Working' or remark='Approved') ORDER BY tname";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
{
      $teacherid=$row["teacherid"];
      $tname=$row["tname"];
      $contact=$row["tcontact"];

  ?>

 <tr>
<td align="center"><?php echo $i; ?></td>
<td align="center"><?php echo $teacherid;?></td>
<td><?php echo $tname;?></td>
<td align="center"><?php echo $contact;?></td>
<td align="center"><input type="checkbox" name="tid[]" value="<?php echo $teacherid;?>"></td>
 <?php
          echo"</td>";
		  $tsql = "SELECT trainingid from tblttraining where trainingid='$_SESSION[trainingid]' and teacherid='$teacherid'";
    	    $tresult = $conn->query($tsql);
		$msql = "SELECT trainingid from tblmuncipalityinfo where trainingid='$_SESSION[trainingid]' and teacherid='$teacherid'";
    	  $mresult = $conn->query($msql);
		  $sql2 = "SELECT trainingid from tbltrainingrequest where trainingid='$_SESSION[trainingid]' and teacherid='$teacherid'";
             $result2 = $conn->query($sql2);
			 if ($tresult->num_rows > 0)
                {
          			echo "<td align=center bgcolor=#006600>Selected for Training</td>";      
                 }
				elseif ($mresult->num_rows > 0)
                {
          			echo "<td align=center bgcolor=#006600>Accepted From Palika</td>";      
                 }
                elseif ($result2->num_rows > 0)
                {
          			echo "<td align=center bgcolor=#006600>Selected</td>";      
                 }
			else
				{
					echo "<td align=center>&nbsp;</td>";
				}
		?>
<td align="center" bgcolor="blue"><a href="teacher_details.php?tlinkid=<?php echo $teacherid;?>" target="blank">Details</a></td>
<?php
  	echo "</tr>";
  	$i++;
}
mysqli_close($conn);
?>
<tr>
<td colspan="7" align="center"><input type="Submit" value="Request" name='btnsave' class="button">&nbsp;&nbsp;<input type="Submit" value="Cancel" name='btncancel' class="button"></td>
</tr>
</table>
</form>
<?php
if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}

?>
</div>
</body>
</html>
