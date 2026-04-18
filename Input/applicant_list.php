<?php
ob_start();
session_start();
   include("../Processing/db_connection.php");
   include("title.htm");
if(isset($_GET['id']))
{
 $_SESSION['trunid']=$_GET['id'];
 $sql = "SELECT trainingid from tblruntraining where id='$_SESSION[trunid]'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
	$_SESSION['trainingid']= $row["trainingid"];
	}
	}
}
include("../Processing/db_connection.php");
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
<td width="80%" valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130" width="100%"></td>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
    <td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"><a href="..\admin_login.php">Log Off</a></font></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1" color="#FFFFFF"><b>Teacher Training Management System(TTMIS)</b></font></td>
<td bgcolor="#0000FF"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<form method="Post" Action="../Object/save_applicant_from_application.php">
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
<table class="tablestyle_1" border="1">
 <tr>
<th>सि.नं.</th>
<th>शिक्षककाे नाम</th>
<th>माेबाइल न‌‍</th>
<th>तह</th>
<th>विषय</th>
<th>बिद्यालय</th>
<th>Tick</th>
</tr>
<?php
$i=1;
//$q = intval($_GET['q']); //for numerice value
$sql1 = "SELECT appid,tname, mobileno, citizenshipno, schoolname, appointdate,appointlocallevel,appointsubject FROM tblapplication where remark<>'Selected' ORDER BY appid";
$result1 = $conn->query($sql1);	
      if ($result1->num_rows > 0)
      {
         while($row1 = $result1->fetch_assoc())
         {
            $teacherid=$row1["appid"];
		$tname=$row1["tname"];
		 $contact=$row1["mobileno"];
        $level=$row1["appointlocallevel"];
         $ctnno= $row1["citizenshipno"];
         $school=$row1["schoolname"];
         $applicantdate=$row1["appointdate"];
         $subject=$row1["appointsubject"];


  ?>

 <tr>
<td align="center"><?php echo $i; ?><input type="Hidden" name="id" value="<?php echo $i; ?>" readonly="true" size="5"><input size="10" readonly="True" type="hidden" name="tid1[]" value="<?php echo $teacherid;?>"></td>
<td><?php echo $tname;?><input type="Hidden" name="tname1[]" value="<?php echo $tname;?>" readonly="True"></td>
<td><?php echo $contact;?><input type="Hidden" name="tcon[]" value="<?php echo $contact;?>" readonly="True"></td>
<td><?php echo $level;?>
<td><?php echo $subject;?>
<td><?php echo $school;?></td>
<td align="center"><input type="checkbox" name="rem[]" value="<?php echo $teacherid;?>"></td>
<!--<td bgcolor="#0000FF"><?php echo "<a href=../Input/teacher_update_1.php?tid=$teacherid target=_blank>Edit</a>";?></td>-->
<?php
  	echo "</tr>";
    	$i++;
  	}
  
    }
	
?>


</table>
<center><input type="Submit" value="Save" class="button"> </center>
</form>
</body>
</html>
