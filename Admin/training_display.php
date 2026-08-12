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
<th>Name of Training</th>
<th>Duration</th>
<th>Remark</th>
</tr>
<?php
$q = $_GET['q'];
$sn=1;
include("../Processing/db_connection.php");
$sql = "SELECT * FROM tbltraining where remark=ongoing='Completed' ORDER BY trainingname";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
         echo "<tr>";
         echo "<td>". $sn . "</td>";
         echo "<td>" . $row["trainingname"] . "</td>";
         echo "<td>" . $row["duration"] . "</td>";
         echo "<td>" . $row["remark"] . "</td>";
         $sn++;
    }
}

?>
</BODY>
</HTML>
