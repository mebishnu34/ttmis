<?php
session_start();
//echo $_SESSION['training'];
//echo $_SESSION['level'];
//echo $_SESSION['subject'];
//echo $_SESSION['sdate'];
//echo $_SESSION['edate'];
//echo $_SESSION['remark'];
include("../Processing/db_connection.php");
$munid=$_POST['rem'];
//echo $_SESSION['trainingid'];
$sql2="SELECT coordinator, mobileno from tblruntraining where trainingid='$_SESSION[trainingid]'";
$result1=$conn->query($sql2);
if($result1->num_rows>0)
	{
		while($data=$result1->fetch_assoc())
			{
				$coordinator=$data["coordinator"];
				$mobileno=$data["mobileno"];
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
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="..\Image\logo.svg" width="200" height="180"></td>
<td align="left" bgcolor="#FFFFFF" class="tdradius"><center><img src="..\Image\banner.jpg" width="90%" height="180"></center></td>
</tr>
<tr>
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><a href="..\Input\school_code.php">Back</a></font></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<form method="Post" Action="../Object/Save_participate_in_training_1.php">
 <table width="100%" border="1">
 <tr>
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
</table>
<table width="100%" border="1" class="maintable">
<tr>
<td>S.No</td>
<TD>Local Govn. Name</TD>
<TD>Name of School</TD>
<td>Teacher ID</td>
<td>Name of Teacher</td>
<td>Contact</td>
<td>Tick</td>
<td>&nbsp;</td>
</tr>
<?php
$n=0;
$i=1;
foreach($munid as $muns)
	{
	  $munid[$n]=$muns;
			 //echo $dname[$n];
			//echo "</br>";
	  $sqlm="SELECT munvdc FROM tbldistrict where ID='$munid[$n]'";
      $resultm = mysqli_query($conn,$sqlm);
      while($rowm = mysqli_fetch_array($resultm))
                {
                   $mname=$rowm["munvdc"];
                }    
$sql1 = "SELECT teachercode, tname, tcontact,scode, schoolname FROM tblteacher where munvdc='$mname'";
$result1 = $conn->query($sql1);

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
<td align="Left"><?php echo $mname; ?></td>
<td align="Left"><?php echo $sname; ?><input type="Hidden" name="scode[]" value="<?php echo $scode; ?>" readonly="true" size="5"></td>
<td><?php echo $tname;?><input type="Hidden" name="tname1[]" value="<?php echo $tname;?>" readonly="True"><input size="10" readonly="True" type="Hidden" name="tid1[]" value="<?php echo $teacherid;?>"></td>
<td><?php echo $contact;?><input type="Hidden" name="tcon[]" value="<?php echo $contact;?>" readonly="True"></td>
<td><input type="checkbox" name="rem[]" value="<?php echo $teacherid;?>"></td>
<td bgcolor="#0000FF"><?php echo "<a href=../Input/teacher_update_1.php?tid=$teacherid target=_blank>Edit</a>";?></td>
<?php
  	echo "</tr>";
    	$i++;
  	}
 }
 	$n=$n+1;
 }
	
?>

<table width="100%">
<tr>
<td align="center"><input type="Submit" value="Save" class="button"> </td>
</tr>
</table>
</form>
</body>
</html>
