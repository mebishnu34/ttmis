<HTML>
<HEAD>
 <TITLE>TTMIS</TITLE>
 <link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
</HEAD>
<BODY>
<table width="100%" class="table_design">
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
//$d = $_GET['t'];
$array=array();
$sql1 = "SELECT * FROM tblteacher";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    echo "<tr>";
    echo "<td>". $sn . "</td>";
   echo "<td>" . $row["teacherid"] . "</td>";
    echo "<td>" . $row["tname"] . "</td>";
    echo "<td>" . $row["tcontact"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td><a href=teacher_details.php?tid=$row[teacherid] target=_blank>Details</a></td>";
    $sn++;
    }
   }

?>
</BODY>
</HTML>
