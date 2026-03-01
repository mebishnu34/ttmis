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
$sql1 = "SELECT * from tblmuncipalityinfo where trainingid='$_SESSION[trainingid]'";
$res = $conn->query($sql1);
 ?>
</HEAD>
<BODY class="bg">
<div align="center">
<table class="maintable">
<tr>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td width="80%" valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130"></td>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
    <td bgcolor="#0000FF" align="Right"></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+2" color="#FFFFFF"><b>Teacher Training Management Information System(TTMIS)</b></font></td>
<td bgcolor="#0000FF"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
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
<td>Mobile No.<input type="Text" name="txtmobile"></td>
    
</td>

 </tr>
 </table>
<table width="100%" bgcolor="#FFFFFF" border="1"> 
<tr>
<th align="center">S.No</th>
<th align="center">Teacher Code</th>
<th>Name of Teacher</th>
<th align="center">Contact</th>
<th>Name of School</th>
<th>Municipality/Rural</th>
<th></th>
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
        $sqls = "SELECT schoolname FROM tblschool where schoolcode='$row1[scode]'";
        	$results = $conn->query($sqls);
		    if($results->num_rows > 0)
   		        {
    	        if($sdata = $results->fetch_assoc())
    	            {
    	                $schoolname=$sdata["schoolname"];
    	            }
   		        }
          echo "<tr>";
          echo "<td align=center>". $sn . "</td>";
          echo "<td align=center>". $row1["teachercode"] . "</td>";
          echo "<td>" . $row1["tname"] . "</td>";
          echo "<td>" . $row1["tcontact"] . "</td>";
          echo "<td>" . $schoolname . "</td>";
          echo "<td>" . $row["munvdc"] . "</td>";
          echo "<td align=center>"?>
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
