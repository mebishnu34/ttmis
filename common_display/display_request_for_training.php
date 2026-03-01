<?php
session_start();
?>
<HTML>
<HEAD>
<link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
 <?php
  include("../Processing/db_connection.php");
 if(isset($_GET['id']))
{
 $_SESSION['trainingid']=$_GET['id'];
}
$sql1 = "SELECT * from tblmuncipalityinfo where trainingid='$_SESSION[trainingid]' and remark='Request'";
$res = $conn->query($sql1);
 ?>
</HEAD>
<BODY class="bg">
<div align="center">
<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="..\Image\logo.svg" width="150" height="100"></td>
<td bgcolor="#FFFFFF" align="left" class="tdradius"><center><img src="..\Image\banner.jpg" width="800" height="150"></center></td>
</tr>
<tr>
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<form method="post" action="../Object/Save_participate_in_training.php">
<table width="100%">
<tr>
 <td>Group Number:
   <select name="cmbgnumber">
        <option>1</option>
         <option>2</option>
         <option>3</option>
         <option>4</option>
         <option>5</option>
         <option>6</option>
         <option>7</option>
         <option>8</option>
         <option>9</option>
         <option>10</option>
</select>
</td>
<td>Coordinator<input type="Text" name="txtcoordinator"></td>
<td colspan="3">Mobile No.<input type="Text" name="txtmobile"></td>
    
</td>

 </tr>
<tr>
<th align="center">S.No</th>
<th align="center">Teacher ID</th>
<th>Name of Teacher</th>
<th align="center">Contact</th>
<th>School Code</th>
<th>Municipality/Rural</th>
</tr>
<?php
$sn=1;
if ($res->num_rows > 0)
   {
    while($row = $res->fetch_assoc())
    {
    $teacherid=$row["teacherid"];
   
    $sql="SELECT * FROM tblteacher where teacherid='$teacherid'";
    $result1 = mysqli_query($conn,$sql);
    if($row1 = mysqli_fetch_array($result1))
    {
          echo "<tr>";
          echo "<td align=center>". $sn . "</td>";
          echo "<td align=center>". $teacherid . "</td>";
          echo "<td>" . $row1["tname"] . "</td>";
          echo "<td>" . $row1["tcontact"] . "</td>";
          echo "<td>" . $row1["schoolcode"] . "</td>";
          echo "<td>" . $row["munvdc"] . "</td>";
          echo "<td>"?>
          <input type="checkbox" name="rem[]" value="<?php echo $teacherid; ?>">
          <?php
          echo"</td>";
          echo "</tr>";
    $sn++;
    }
   }
}
?>

<tr>
<td colspan="7" align="center"><input type="Submit" value="Accept" class="button"></td>
</tr>
</table>
</BODY>
</HTML>
