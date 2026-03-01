<?php
session_start();
$tid=$_POST['txtcode'];
$_SESSION['teacherid']=$tid;
$sn=1;
include("../Processing/db_connection.php");
$sqlt = "SELECT * FROM tblteacher where teachercode='$tid'";
$teacher = $conn->query($sqlt);
if ($teacher->num_rows > 0)
   {
    if($rowt = $teacher->fetch_assoc())
    {
        $tname=$rowt["tname"];
        $gender=$rowt["gender"];
        $address=$rowt["address"];
        $scode=$rowt["scode"];
        $contact=$rowt["tcontact"];
    }
    
   }
   else
    {
     $tname="";
        $gender="";
        $address="";
        $scode="";
        $contact="";   
    }
?>
<HTML>
<HEAD>
 <TITLE>TTMIS:Bagamati</TITLE>
 <link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
</HEAD>
<BODY>
<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="..\Image\logo.svg" width="150" height="100"></td>
<td bgcolor="#FFFFFF" align="left" class="tdradius"><center><img src="..\Image\banner.jpg" width="800" height="150"></center></td>
</tr>
<tr>
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><a href="..\Admin\report.php">Back</a></font></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<table width="100%" class="dtable">
<tr>
<td colspan="6">Name of Teacher:-<?Php echo $tname; ?> (<?php echo $tid;?>) Gender:-<?php echo $gender;?> Address :-<?php echo $address; ?> Contact No.:-<?php echo $contact;?> School Code:-<?php echo $scode;?></td>
</tr>
<tr>
<th>S.No</th>
<th>Name of Training</th>
<th>Training</th>
<th>Subject</th>
<th>Start Date</th>
<th>End Date</th>
</tr>
<form method="Post" action="certificate_display.php">
<?php
$sql = "SELECT * FROM tblttraining where teacherid='$tid'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
        $id=$row["trainingid"];
		$subject1=$row["training"];
        $sql1 = "SELECT id, trainingname, level, subject, startdate, enddate,venue from tblruntraining where trainingid='$id' and remark='Completed' ORDER BY trainingname";
        $res = $conn->query($sql1);
        if ($res->num_rows > 0)
         {    
            if($row1 = $res->fetch_assoc())
                {
    		    $training= $row1["trainingname"];
                 $level=$row1["level"];
                 $subject=$row1["subject"];
                 $sdate= $row1["startdate"];
                 $edate= $row1["enddate"];
                 $venue=$row1["venue"];
                 echo "<tr>";
         echo "<td align=center>". $sn . "</td>";
         echo "<td align=center>" . $training . "</td>";
		 echo "<td align=center>" . $subject1 . "</td>";
         //echo "<td align=center>" . $level . "</td>";
         echo "<td align=center>" . $subject . "</td>";
         echo "<td align=center>" . $sdate . "</td>";
         echo "<td align=center>" . $edate . "</td>";
         echo "<td align=center bgcolor=blue><a href=certificate_display.php?trainingid=". $row["trainingid"]. " target=blank>Certificate</a></td>";
         echo "</tr>";
         $sn++;
                 }
         }
         
    }
}

?>
</table>
</BODY>
</HTML>
