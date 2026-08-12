<?php
session_start();
?>

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
<th>Email</th>
</tr>
<?php
$sn=1;
include("../Processing/db_connection.php");
$n = $_GET['t'];
$tn=$_SESSION['tid'];
$sql = "SELECT * FROM tblttraining where trainingid='$tn' and trainingnumber='$n' ORDER BY teacherid";
$result = $conn->query($sql);
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
         echo "";
         echo "<td><a href=teacher_details.php?tid=$row1[teacherid]>" . $row1["teacherid"] . "</a></td>";
         echo "<td>" . $row1["tname"] . "</td>";
         echo "<td>" . $row1["tcontact"] . "</td>";
         echo "<td>" . $row1["email"] . "</td>";
         $sn++;
         }
      }
   }
}

?>
</BODY>
</HTML>
