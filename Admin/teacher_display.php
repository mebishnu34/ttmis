<?php
session_start();
if($_SESSION['token']<>"Run")
{
header('Location: ../admin_login.php?msg= "Please Login"');
}
?>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
<tr>
<th align="center">S.No</th>
<th align="center">Teacher Code</th>
<th>Name of Teacher</th>
<th align="center">Contact</th>
<th>Email</th>
<th></th>
</tr>
<?php
$sn=1;
include("../Processing/db_connection.php");
$d = $_GET['t'];
$_SESSION['district']=$d;
if($d=="All District")
{
$sql1 = "SELECT * FROM tblteacher ORDER BY district,munvdc,tname";
$result = $conn->query($sql1);

 }
 else
 {
 $sql1 = "SELECT * FROM tblteacher where district='$d' ORDER BY tname";
 $result = $conn->query($sql1);
 
 }
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    echo "<tr>";
    echo "<td align=center>". $sn . "</td>";
   echo "<td align=center>" . $row["teachercode"] . "</td>";
    echo "<td>" . $row["tname"] . "</td>";
    echo "<td>" . $row["tcontact"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
     echo "<td align=center bgcolor=blue><a href=teacher_details.php?tid=$row[teacherid] target=_blank>Details</a></td>";
    $sn++;
    }
   }

?>
