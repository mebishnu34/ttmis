<?php
session_start();
if($_SESSION['token']<>"Run")
{
header('Location: ../admin_login.php?msg= "Please Login"');
}
?>
<HTML>
<HEAD>
 <TITLE>TTMIS</TITLE>
 <link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
</HEAD>
<BODY>
<table width="100%" class="table_design">
<tr>
<th align="center">S.No</th>
<th align="center">Teacher ID</th>
<th>Name of Teacher</th>
<th>Contact</th>
<th>Email</th>
<th></th>
</tr>
<?php
$sn=1;
include("../Processing/db_connection.php");
$d = $_GET['t'];
$array=array();
$sql1 = "SELECT * FROM tblteacher where tname like '$d%'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    echo "<tr>";
    echo "<td align=center>". $sn . "</td>";
   echo "<td align=center>" . $row["teacherid"] . "</td>";
    echo "<td>" . $row["tname"] . "</td>";
    echo "<td>" . $row["tcontact"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td align=center><a href=teacher_details.php?tid=$row[teacherid] target=_blank>Details</a></td>";
    $sn++;
    }
   }

?>
</BODY>
</HTML>
