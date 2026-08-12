<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
</HEAD>
<BODY>
<table width="100%">
<tr>
<th>S.No</th>
<th>Teacher ID</th>
<th>Name of Teacher</th>
<th>Contact</th>
<th>School Code</th>
</tr>
<?php
$sn=1;
include("../Processing/db_connection.php");
$sql1 = "SELECT teacherid FROM tblttraining where startdate='$_SESSION[sdate]' and enddate='$_SESSION[edate]' and trainingname='$_SESSION[training]' and subject='$_SESSION[subject]' ORDER BY teacherid";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    $teacherid=$row["teacherid"];
      $sql1 = "SELECT * FROM tblteacher where teacherid='$teacherid'";
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0)
      {
         if($row1 = $result1->fetch_assoc())
         {
          echo "<tr>";
          echo "<td>". $sn . "</td>";
          echo "<td>".$teacheerid."</td>";
          echo "<td>" . $row1["tname"] . "</td>";
          echo "<td>" . $row1["tcontact"] . "</td>";
           echo "<td>" . $row1["schoolcode"] . "</td>";
            $sn++;
           }
      }
    }
   }
?>
</BODY>
</HTML>
