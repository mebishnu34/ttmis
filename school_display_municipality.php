<?php
session_start();
if($_SESSION['token']<>"Run")
{
header('Location: common_login.php?msg= "Please Login"');
}
?>
<table  border="1" align="center" cellpadding="5">
<tr>
<th>S.No</th>
<th>Name of School</th>
<th>Code</th>
<th>Address</th>
<th>Contact</th>
<th>Email</th>
<th>Head Teacher</th>
<th>Login Name</th>
<th>Password</th>
<th></th>
</tr>
<?php
$sn=1;
include("Processing/db_connection.php");
$m = $_GET['m'];
$_SESSION['district1']=$m;
if($m=="All")
{
$sql1 = "SELECT * FROM tblschool ORDER BY district,munvdc,ID";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    echo "<tr>";
    echo "<td>". $sn . "</td>";
   echo "<td>". $row["schoolname"] . "</td>";
    echo "<td>" . $row["ID"] . "</td>";
    echo "<td>" . $row["address"] . "</td>";
    echo "<td>" . $row["contact"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td>" . $row["authorizeperson"] . "</td>";
    echo "<td>" . $row["loginname"] . "</td>";
    echo "<td>" . $row["spass"] . "</td>";
    echo "<td bgcolor=blue><a href=school/school_details.php?tid=$row[ID] target=_blank>Details</a></td>";
    $sn++;
    }
 }
}
else
{
$sql1 = "SELECT * FROM tblschool where munvdc='$m' ORDER BY ID";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    echo "<tr>";
    echo "<td>". $sn . "</td>";
   echo "<td>". $row["schoolname"] . "</td>";
    echo "<td>" . $row["ID"] . "</td>";
    echo "<td>" . $row["address"] . "</td>";
    echo "<td>" . $row["contact"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td>" . $row["authorizeperson"] . "</td>";
    echo "<td>" . $row["loginname"] . "</td>";
    echo "<td>" . $row["spass"] . "</td>";
    echo "<td bgcolor=blue><a href=school/school_details.php?tid=$row[ID] target=_blank>Details</a></td>";
   $sn++;
    }
 }

}

?>
</table>
