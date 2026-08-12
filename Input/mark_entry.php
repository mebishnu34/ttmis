<?php
session_start();
?>
<HTML>
<?php
   include("title.htm");
   include("../Processing/db_connection.php");
   $sql = "SELECT id, trainingname, level, subject, startdate, enddate,venue from tblruntraining where id='$_SESSION[trainingid]' and remark='Running' ORDER BY trainingname";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    if($row = $result->fetch_assoc())
    {
    		    $training= $row["trainingname"];
                 $level=$row["level"];
                 $subject=$row["subject"];
                 $sdate= $row["startdate"];
                 $edate= $row["enddate"];
                 $venue=$row["venue"];
                 }
     }
?>
<head>
<link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
</head>
<BODY>
<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="../Image/logo.svg" width="200" height="180"></td>
<td align="left" bgcolor="#FFFFFF" class="tdradius"><center><img src="../Image/banner.jpg" width="90%" height="180"></center></td>
</tr>
<tr>
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><a href="../Input/teacher_training_running.php">Back</a></font></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<?php
if(isset($_GET['tid']))
{
$teacherid=$_GET['tid'];
      $sql1 = "SELECT * FROM tblteacher where teacherid='$teacherid'";
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0)
      {
         if($row1 = $result1->fetch_assoc())
         {
         $tname=$row1["tname"];
         $contact=$row1["tcontact"];
         }
      }
}
?>
<form action="../Object/Save_Mark.php" method="Post">
    <table class="maintable">
    <tr>
    <td colspan="2" align="center">Mark Entry</td>
    </tr>
    <tr>
               <td colspan="2" width="80%">Date:<?php echo $_SESSION['$tdate'];?></td>
           </tr>
                 <tr>
               <td  colspan="2"> <input type="hidden" name="txtid" value="<?php echo $teacherid;?>" size="5">
             Name of Teacher:<?php echo $tname; ?> / Mobile No.: <?php echo $contact; ?></td>
                </tr>
                         <tr>
               <td  cospan="2">Name of Training:<?php echo $training;?>
                / Training Level:<?php echo $level;?> / Subject: <?php echo $subject;?></td>
           </tr>

           <tr>
               <td  colspan="2">Start Date:- <?php echo $sdate;?> End Date:- <?php echo $edate;?></td>
           </tr>
           <tr>
           <td colspan="2" align="center">
           <table width="100%">
           <tr>
           <th>Mark on Present</th>
           <th>Mark on Discipline</th>
           <th>Mark on Activeness</th>
           <th>Mark on Objective</th>
           <th>Mark on Subjective</th>
           <th>Mark on Reporting</th>
           </tr>
           <tr>
           <td align="center"><input type="text" name="present" size="10"></td>
           <td align="center"><input type="text" name="discipline" size="10"></td>
           <td align="center"><input type="text" name="activeness" size="10"></td>
           <td align="center"><input type="text" name="objective" size="10"></td>
           <td align="center"><input type="text" name="subjective" size="10"></td>
           <td align="center"><input type="text" name="reporting" size="10"></td>
           </tr>
           </table>
           </td>
           <tr>
               <td colspan="2" align="center"><input type="submit" value="Save" class="button"></td>
           </tr>
    </table>
</form>
</BODY>
</HTML>
