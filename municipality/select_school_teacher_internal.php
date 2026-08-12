<?php
ob_start();
session_start();
//echo $_SESSION['training'];
//echo $_SESSION['level'];
//echo $_SESSION['subject'];
//echo $_SESSION['sdate'];
//echo $_SESSION['edate'];
//echo $_SESSION['remark'];
include("../Processing/db_connection.php");
include("../Processing/db_palika_connection.php");
//echo $_SESSION['trainingid'];
$sql2="SELECT coordinator, mobileno from tblruntraining where trainingid='$_SESSION[trainingid]'";
$result1=$palikaconn->query($sql2);
if($result1->num_rows>0)
	{
		while($data=$result1->fetch_assoc())
			{
				$coordinator=$data["coordinator"];
				$mobileno=$data["mobileno"];
			}
	}
if(isset($_POST['btnschool']))
	{
		$schoolname=$_POST['cmbschool'];
		if($_POST['cmbschool']=="All")
		{
			$sql1 = "SELECT teachercode, tname, tcontact,scode, schoolname FROM tblteacher where munvdc='$_SESSION[uname]' and (remark='Working' or remark='Approved') ORDER BY schoolname, tname";
			$result1 = $conn->query($sql1);
		}
		else
		{
			$sql1 = "SELECT schoolcode,schoolname FROM tblschool where schoolname='$schoolname'";
			$result = $conn->query($sql1);
			if ($result->num_rows > 0)
   				{
			    if($row = $result->fetch_assoc()) 
					{
					$scode=$row["schoolcode"];
					$sname=$row["schoolname"];
					}
				}
			$_SESSION['schoolcode']=$scode;
			$sql1 = "SELECT teacherid,teachercode, tname, tcontact,scode, schoolname FROM tblteacher where scode='$scode' and (remark='Working' or remark='Approved') ORDER BY tname";
		 	$result1 = $conn->query($sql1);
		}
	
	}
	 
?>

<!DOCTYPE html>
<html>
<head>
<title>TTMIS</title>
<link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
</head>
<body>
<table class="maintable">
<tr>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="../Input/../Image/logo.jpg" width="150" height="130"></td>
<td width="80%" valign="top" bgcolor="#FFFFFF"><img src="../Input/../Image/banner.jpg" height="130"></td>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="../Input/../Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
    <td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"><a href="school_teacher.php">Back</a></font></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1" color="#FFFFFF"><b>Teacher Training Management System(TTMIS)</b></font></td>
<td bgcolor="#0000FF"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<form method="Post" Action="../Object/Save_palikainternal_in_training.php">
 <table width="100%" border="1">
 <tr>
 <td>Name of School</td>
 <td><?php echo $sname; ?><input type="Hidden" name="txtscode" value="<?php echo $scode; ?>" readonly="true" size="20">
</td>
<td>Group Number:
   <select name="cmbgnumber">
        <option>1</option>
         <option>2</option>
         <option>3</option>
         <option>4</option>
         <option>5</option>
         <option>6</option>
         <option>7</option>
         <option>8</option>
         <option>9</option>
         <option>10</option>
</select>
</td>
<td>Coordinator:<?php echo $coordinator;?><input type="Hidden" name="txtcoordinator" value="<?php echo $coordinator;?>"></td>
<td>Mobile No.:<?php echo $mobileno;?><input type="Hidden" name="txtmobile" value="<?php echo $mobileno;?>" size="10"></td>
<td colspan="2">
SMS<Select name="optsms">
<option selected>NOSMS</option>
<option>YESSMS</option>
</select>
</td>
 </tr>
<tr>
<td>S.No</td>
<TD>Name of School</TD>
<td>Teacher Code</td>
<td>Name of Teacher</td>
<td>Contact</td>
<td>Tick</td>
</tr>
<?php
$i=1;
//$q = intval($_GET['q']); //for numerice value
	
      if ($result1->num_rows > 0)
      {
         while($row1 = $result1->fetch_assoc())
         {
		 $scode=$row1["scode"];
		 $sname=$row1["schoolname"];
		 $tcode=$row1["teachercode"];
		 $teacherid=$row1["teacherid"];
         $tname=$row1["tname"];
         $contact=$row1["tcontact"];
  ?>

 <tr>
<td align="center"><?php echo $i; ?><input type="Hidden" name="id" value="<?php echo $i; ?>" readonly="true" size="5"></td>
<td align="Left"><?php echo $sname; ?><input type="Hidden" name="scode[]" value="<?php echo $scode; ?>" readonly="true" size="5"></td>
<td align="center"><?php echo $tcode;?><input size="10" readonly="True" type="hidden" name="tid1[]" value="<?php echo $tcode;?>"></td>
<td><?php echo $tname;?><input type="Hidden" name="tname1[]" value="<?php echo $tname;?>" readonly="True"></td>
<td><?php echo $contact;?><input type="Hidden" name="tcon[]" value="<?php echo $contact;?>" readonly="True"></td>
<td><input type="checkbox" name="rem[]" value="<?php echo $teacherid;?>"></td>
<?php
  	echo "</tr>";
    	$i++;
  	}
  
    }
	
?>


<tr>
<td colspan="5" align="center"><input type="Submit" value="Save" class="button"> </td>
</tr>
</table>
</form>
</body>
</html>
