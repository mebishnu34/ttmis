<?php
include("../Processing/db_connection.php");
if (isset($_POST['search'])) 
{
$Name = $_POST['search'];
?>
<form action="../Object/update_teacher_code.php" method="Post">
<table id="details" class="dtable" class="dtable" style="white-space:nowarp;width:90%;" border="1" cellspacing="0" cellpadding="5" >
<tr>
<th>S.No</th>
<th>Code In Record</th>
<th>Code in TPD</th>
<th>Name of Teacher</th>
<th>Name of School</th>
<th>Local Government</th>
<th>District</th>
</tr>

<?php
$sn=1;
if($Name<>"")
	 {
        $Query = "SELECT tcode, tname, teacherlevel, schoolname, logov, district FROM tbltpd where tname LIKE '$Name%' ORDER BY tname";
	    $ExecQuery = MySQLi_query($conn, $Query);
	    while ($rowt = MySQLi_fetch_array($ExecQuery)) 
   		{
        echo "<tr>";
	    echo "<td align=center>". $sn . "</td>";
        echo "<td><input type=text name=txtrecordcode[]></td>";
        $teachercode=$rowt["tcode"];
	    echo "<td align=center> <input type=text name=txttpdcode[] value=" . $teachercode . " size=10></td>";
        echo "<td>" . $rowt["tname"] . "</td>";
		echo "<td>" . $rowt["schoolname"] . "</td>";
    	echo "<td>" . $rowt["logov"] . "</td>";
        echo "<td align=center>" . $rowt["district"] . "</td>";
        		echo "</tr>";
        $sn++;
		}
    
    }
}
?>
<tr>
    <td colspan="7" align="center"><input type="submit" value="Update" name="btnsubmit"></td>
</tr>
</table>
</form>

<?php
$count=0;
if (isset($_POST['search'])) {
   $Name = $_POST['search'];
 if($Name<>"")
 {
   $Query = "SELECT teacherid, teachercode, tname, tcontact,schoolname,munvdc,district FROM tblteacher WHERE tname LIKE '$Name%' LIMIT 100";
   $ExecQuery = MySQLi_query($conn, $Query);
   echo '
 <table width="100%">
   ';
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
       ?>
     <a>
	<tr>
<td onclick='fill("<?php echo $Result['teacherid']; ?>")'> 
    <?php echo $Result['teacherid']; ?>
   </td>
   <td onclick='fill("<?php echo $Result['teacherid']; ?>")'><?php echo $Result['tname']; ?></td>
<td onclick='fill("<?php echo $Result['teacherid']; ?>")'><?php echo $Result['tcontact']; ?> </td>
<td onclick='fill("<?php echo $Result['teacherid']; ?>")'><?php echo $Result['schoolname']; ?></td>
   <td onclick='fill("<?php echo $Result['teacherid']; ?>")'><?php echo $Result['munvdc']; ?></td>
<td onclick='fill("<?php echo $Result['teacherid']; ?>")'> <?php echo $Result['district']; ?></td>
   </tr>
   </a>
   <?php
   $count++;
}}
}
echo $count;
?>
