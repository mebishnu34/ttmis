
<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
</HEAD>
<BODY>
<table width="100%">
<tr>
<th>S.No</th>
<th>Name of Teacher</th>
<th>Contact</th>
<th>Name of Training</th>
<th>Level</th>
<th>Subject</th>
<th>Start Date</th>
<th>End Date</th>
</tr>
<?php
$sn=1;
include("Processing/db_connection.php");
$sql1 = "SELECT * FROM tblttraining where schoolcode='$_SESSION[code]' ORDER BY trainingid,teacherid";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    $teacherid=$row["teacherid"];
    $trainingid=$row["trainingid"];
  $training="";
  $level="";
  $sub="";
  $sdate="";
  $edate="";
    $sql1 = "SELECT * FROM tblruntraining where id='$trainingid'";
      $result2 = $conn->query($sql1);
      if ($result2->num_rows > 0)
      {
         if($row2 = $result2->fetch_assoc())
         {
         $training=$row2["trainingname"]; 
         $level=$row2["level"]; 
         $sub=$row2["subject"];
         $sdate=$row2["startdate"];
         $edate=$row2["enddate"];
         }
      }
      
      $sql1 = "SELECT * FROM tblteacher where teacherid='$teacherid'";
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0)
      {
         if($row1 = $result1->fetch_assoc())
         {
          echo "<tr>";
          echo "<td>". $sn . "</td>";
          echo "<td>" . $row1["tname"] . "</td>";
          echo "<td>" . $row1["tcontact"] . "</td>";
           echo "<td>" . $training . "</td>";
           echo "<td>" . $level . "</td>";
           echo "<td>" . $sub . "</td>";
           echo "<td>" . $sdate . "</td>";
           echo "<td>" . $edate . "</td>";
            $sn++;
           }
      }
    }
   }
?>
</BODY>
</HTML>
