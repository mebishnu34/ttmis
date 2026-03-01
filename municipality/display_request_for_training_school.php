<?php
session_start();
?>
<HTML>
<HEAD>
<link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
 <?php
  include("../Processing/db_connection.php");
 if(isset($_GET['id']))
{
 $_SESSION['trainingid']=$_GET['id'];
}
$sql1 = "SELECT * from tbltrainingrequest where trainingid='$_SESSION[trainingid]' and govname='$_SESSION[uname]' and remark='Request'";
$res = $conn->query($sql1);
 ?>
</HEAD>
<BODY class="bg">
<div align="center">
<table class="maintable">
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
<form method="post" action="../Object/Save_participate_from_munvdc.php">
<table width="100%" bgcolor="#FFFFFF" border="1" cellspacing="0">
<tr>
<th align="center">S.No</th>
<th>Name of Teacher</th>
<th align="center">Contact</th>
<th>Name of School</th>
<th align="center">Remark</th>
<th>Tick</th>
<th>From School</th>
<th>To Center</th>
</tr>
<?php
$sn=1;
if ($res->num_rows > 0)
   {
    while($row = $res->fetch_assoc())
    {
    $teacherid=$row["teacherid"];
    $sql="SELECT teachercode,tname, tcontact,scode FROM tblteacher where teacherid='$teacherid'";
    $result1 = mysqli_query($conn,$sql);
    while($row1 = mysqli_fetch_array($result1))
    {
		$sql1="SELECT schoolname FROM tblschool where schoolcode='$row1[scode]'";
        $result = mysqli_query($conn,$sql1);
        if($sdata = mysqli_fetch_array($result))
        {
            $schoolname=$sdata["schoolname"];
        }
          echo "<tr>";
          echo "<td align=center>". $sn . "</td>";
          echo "<td>" . $row1["tname"] . "</td>";
          echo "<td align=center>" . $row1["tcontact"] . "</td>";
          echo "<td align=center>" . $schoolname . "</td>";
          //echo "<td align=center>" . $row1["munvdc"] . "</td>";
          echo "<td align=center>"?>
          <input type="checkbox" name="rem[]" value="<?php echo $teacherid; ?>">
          <?php
          echo"</td>";
		  $tsql = "SELECT trainingid from tblttraining where trainingid='$_SESSION[trainingid]' and teacherid='$teacherid'";
    	  $tresult = $conn->query($tsql);
		  $sql2 = "SELECT * FROM tblmuncipalityinfo where trainingid='$_SESSION[trainingid]' and teacherid='$teacherid'";
             $result2 = $conn->query($sql2);
                if ($tresult->num_rows > 0)
                {
          			echo "<td align=center bgcolor=#006600>Selected For Training</td>";      
                 }
				elseif ($result2->num_rows > 0)
                {
          			echo "<td align=center bgcolor=#006600>Accepted</td>";      
                 }
			else
				{
					echo "<td align=center></td>";
				}
				 echo "<td bgcolor=blue align=center> <a href=create_letter_3.php?tid=$row[tnumber]; target=_blank>Letter</a></td>";
				 echo "<td bgcolor=blue align=center> <a href=training_palika_letter_to_center.php?linkid=$row[trainingid]; target=_blank>Letter</a></td>";
		  
          echo "</tr>";
    $sn++;
    }
   }
}
?>

<tr>
<td colspan="7" align="center"><input type="Submit" value="Accept and Send" name="btnaccept">&nbsp;&nbsp;<input type="Submit" value="Cancel" name="btncancel"></td>
</tr>
</table>
</BODY>
</HTML>
