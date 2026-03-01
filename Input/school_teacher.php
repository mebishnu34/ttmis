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
//echo $_SESSION['trainingid'];
$sql2="SELECT coordinator, mobileno from tblruntraining where id='$_SESSION[trunid]'";
$result1=$conn->query($sql2);
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
$sql1 = "SELECT schoolcode,schoolname FROM tblschool where schoolname='$schoolname'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc()) 
		{
		$scode=$row["schoolcode"];
		$sname=$row["schoolname"];
	}
	}
$_SESSION['schoolcode']=$scode;
 $sql1 = "SELECT teachercode, tname, tcontact,scode, schoolname FROM tblteacher where scode='$scode'";
	 }
	if(isset($_POST['btnmun'])) 
	{
		$sql1 = "SELECT teachercode, tname, tcontact,scode, schoolname FROM tblteacher where munvdc='$_POST[cmbmv1]'";
	}
	if(isset($_POST['btndistrict'])) 
	{
		$sql1 = "SELECT teachercode, tname, tcontact,scode, schoolname FROM tblteacher where district='$_POST[cmbdistrict1]'";
	}
      $result1 = $conn->query($sql1);
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
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td width="80%" valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130"></td>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
    <td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"><a href="..\admin_login.php">Log Off</a></font></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+3" color="#FFFFFF"><b>Teacher Training Management System(TTMIS)</b></font></td>
<td bgcolor="#0000FF"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<form method="Post" Action="../Object/Save_participate_in_training_1.php">
 <table width="100%" border="1">
 <tr>
<?php
 if(isset($_POST['btnschool']))
	{
	
?>
 <td>School Code</td>
 <td><?php echo $sname; ?><input type="Hidden" name="txtscode" value="<?php echo $scode; ?>" readonly="true" size="20">
</td>
<?php
	    
	 }
	if(isset($_POST['btnmun'])) 
	{
?>
<td>Local Government</td>
 <td><?php echo $_POST['cmbmv1']; ?><input type="Hidden" name="txtmun" value="<?php echo $_POST['cmbmv1']; ?>" readonly="true" size="20"></td>
<?php
		
	}
if(isset($_POST['btndistrict'])) 
	{
	$_SESSION['district']=$_POST['cmbdistrict1'];
	echo $_SESSION['district'];
	 header('Location: training_participate_lgov.php');
	 exit;
	}
?>

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
<td>Teacher ID</td>
<td>Name of Teacher</td>
<td>Contact</td>
<td>Tick</td>
<td>&nbsp;</td>
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
		 $teacherid=$row1["teachercode"];
         $tname=$row1["tname"];
         $contact=$row1["tcontact"];


  ?>

 <tr>
<td align="center"><?php echo $i; ?><input type="Hidden" name="id" value="<?php echo $i; ?>" readonly="true" size="5"></td>
<td align="Left"><?php echo $sname; ?><input type="Hidden" name="scode[]" value="<?php echo $scode; ?>" readonly="true" size="5"></td>
<td align="center"><?php echo $teacherid;?><input size="10" readonly="True" type="hidden" name="tid1[]" value="<?php echo $teacherid;?>"></td>
<td><?php echo $tname;?><input type="Hidden" name="tname1[]" value="<?php echo $tname;?>" readonly="True"></td>
<td><?php echo $contact;?><input type="Hidden" name="tcon[]" value="<?php echo $contact;?>" readonly="True"></td>
<td><input type="checkbox" name="rem[]" value="<?php echo $teacherid;?>"></td>
<td bgcolor="#0000FF"><?php echo "<a href=../Input/teacher_update_1.php?tid=$teacherid target=_blank>Edit</a>";?></td>
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
