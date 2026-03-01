<?php
   include("../Processing/db_connection.php");
   include("../title.htm");
 ?>
<script src="../script/table2excel.js"></script>
<center>
<button id="downloadexcel">Save In Excel</button></center>
</center>
<table width="100%" class="dtable" border="1">
	<tr>
	<td align="center">S.No</td>
	<td align="center">Code</td>
	<td>Name of Teacher</td>
	<td align="center">Name of School</td>
	<td>Local Govern.</td>
	<td>District</td>
	<td>Level</td>
	<td>Subject</td>
	<td>Request</td>
	</tr>
<?php
$level=$_POST['cmblevel'];
$district=$_POST['cmbdistrict1'];
$mun=$_POST['cmbmv1'];
//echo $district;
//echo $mun;
$i=1;
$sql="";
if($level=="All")
	{
	$sql="SELECT * FROM tblteacherrequest ORDER BY teacherid";
	$result = mysqli_query($conn,$sql);
	}
	else
	{
	$sql="SELECT * FROM tblteacherrequest where level='$level' ORDER BY teacherid";
	$result = mysqli_query($conn,$sql);
	}
	while($row = mysqli_fetch_array($result))
		{
			$tid=$row["teacherid"];
			if($mun=="All")
			{
			$sql1 = "SELECT * FROM tblteacher where teachercode='$tid' and district='$district'";
  			$result1 = $conn->query($sql1);
			}
			else
			{
			$sql1 = "SELECT * FROM tblteacher where teachercode='$tid' and district='$district' and munvdc='$mun'";
  			$result1 = $conn->query($sql1);
			}
         	if ($result1->num_rows > 0)
          	{
           	if($row1 = $result1->fetch_assoc())
             {
                $tname=$row1['tname'];
				$scode=$row1['scode'];
				$sname="";
				$sql2 = "SELECT * FROM tblschool where schoolcode='$scode'";
  				$result2 = $conn->query($sql2);
         		if ($result2->num_rows > 0)
          		{
           		if($row2 = $result2->fetch_assoc())
            	 {
               	 $sname=$row2['schoolname'];
				  }
				}
				$mun=$row1['munvdc'];
				$district=$row1['district'];
				$level=$row1['workinglevel'];
			    echo "<tr>";
		    	echo "<td align=center>".$i."</td>";
				echo "<td align=center>".$tid."</td>";
	    		echo "<td align=center>".$tname."</td>";
			   	echo "<td align=center>".$sname."</td>";
			    echo "<td align=center>".$mun."</td>";
				echo "<td align=center>".$district."</td>";
				echo "<td align=center>".$level."</td>";
				echo "<td align=center>".$row['subject']."</td>";
				echo "<td align=center>".$row['message']."</td>";
		        $i++;
    			echo "</tr>";
				}
			}
		}
	
?>
</table>

<center>
<script>
      var table2excel = new Table2Excel();
      document.getElementById('downloadexcel').addEventListener('click', function() {
        table2excel.export(document.querySelectorAll('table'));
      });
   </script>
