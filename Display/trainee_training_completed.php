<?php
session_start();
   include("../Processing/db_connection.php");
if($_SESSION['token']<>"Run")
{
header('Location: ../admin_login.php?msg= "Please Login"');
}
?>
<HTML>
<HEAD>
 <TITLE>TTMIS</TITLE>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <link rel="stylesheet" href="../CSS/main_table.css">
  <link rel="stylesheet" href="../CSS/sidemenu.css">
  <link rel="stylesheet" href="../CSS/table_css.css">
  <link rel="stylesheet" type="text/css" href="../CSS/div_column.css">
</HEAD>
<BODY class="bg">
<div align="center">
<table class="maintable">
<tr>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td  valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130" width="100%"></td>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
</table>
<?php 
if(isset($_GET['id']))
   {
      $tcode=$_GET['id'];
      $sqlt = "SELECT tname,tcontact,district, munvdc,loginname, tpass FROM tblteacher where teachercode='".$tcode."'";
		$resultt = $conn->query($sqlt);
		if($resultt->num_rows > 0)
   		{
    	if($rowt = $resultt->fetch_assoc())
    	   {
		   $contact=$rowt["tcontact"];
		   $tname=$rowt["tname"];
         }
         }
?>
<div align="center">
   <br>
<div style="background-color:#FFFFFF; padding: 10px;">
   शिक्षककाे नाम : <?php echo $tname;?> // माेबाइल नम्बर : <?php echo $contact;?> // काेड नम्बर : <?php echo $tcode;?>
</div>
<p><h1>Compledted Training</h1></p>
<table width="100%" class="table_design">
<tr>
<th>S.No</th>
<th>Name of Training</th>
<th>Level</th>
<th>Subject</th>
<th>Start Date</th>
<th>End Date</th>
<th>Printed On </th>
<th></th>
</tr>
<?php
$i=1;
$sql = "SELECT ID,teacherid,schoolcode,sdate,edate,trainingid,runid FROM tblttraining where teacherid='".$tcode."'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
			$schoolcode=$row["schoolcode"];
         $_SESSION['teacherid']=$row["teacherid"];
      $csql = "SELECT trainingname,level, subject, startdate, enddate,coordinator FROM tblruntraining where id='".$row["trainingid"]."' or id='".$row["runid"]."'";
		$cresult=$conn->query($csql);
      if ($cresult->num_rows > 0)
         {
         if($crow = $cresult->fetch_assoc())
               {
                  $trainingname=$crow["trainingname"];
                  $level=$crow["level"];
                  $subject=$crow["subject"];
                  $coordinate=$crow["coordinator"];
                  $sdate=$crow["startdate"];
                  $edate=$crow["enddate"];
               }
         }
         $pdate="";
         $psql = "SELECT printdate FROM tblprintdetails where trainingid='".$row["ID"]."'";
         $presult = mysqli_query($conn, $psql);
         if($prow = mysqli_fetch_assoc($presult)) 
	         {
               $pdate=$prow['printdate'];
	         }

				 echo "<td align=center>". $i . "</td>";
                 echo "<td>". $trainingname. "-". $coordinate ."</td>";
                 echo "<td align=center>". $level ."</td>";
                 echo "<td align=center>". $subject ."</td>";
                 echo "<td align=center>". $sdate."</td>";
                 echo "<td align=center>". $edate."</td>";
                 echo "<td align=center>". $pdate."</td>";
                 echo "<td align=center bgcolor=blue><a href=../Input/update_certificate_number.php?tid=".$row["ID"]. " target=blank>C.Number</a></td>";
                 echo "<td align=center bgcolor=blue><a href=../Display/select_certificate_2.php?tid=".$row["ID"]. " target=blank>Certificate</a></td>";
              	$i++;
                echo "</tr>";
                }
     }
				?>
    </table>
</div>
<?php
   }
   ?>
<body>
</html>