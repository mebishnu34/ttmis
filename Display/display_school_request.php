<?php
   include("../Processing/db_connection.php");
//$filename = 'teacher_import.xls';
//include("export_class.php");
?>
<script src="../script/table2excel.js"></script>
<center>
<button id="downloadexcel">Save In Excel</button></center>
</center>
<table width="100%" class="dtable" border="1">
	<tr>
	<td align="center">S.No</td>
	<td align="center">Code</td>
	<td>Name of School</td>
	<td>Local Govern.</td>
	<td>District</td>
	<td>Subject</td>
	<td>Request</td>
	</tr>
<?php
$i=1;
	$sql="SELECT * FROM tblschoolrequest ORDER BY schoolcode";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result))
		{
			$scode=$row["schoolcode"];
			$sql1 = "SELECT * FROM tblschool where ID='$scode'";
  			$result1 = $conn->query($sql1);
         	if ($result1->num_rows > 0)
          	{
           	if($row1 = $result1->fetch_assoc())
             {
                $sname=$row1['schoolname'];
				$mun=$row1['munvdc'];
				$district=$row1['district'];
				  echo "<tr>";
		    	echo "<td align=center>".$i."</td>";
				echo "<td align=center>".$scode."</td>";
	    		echo "<td align=center>".$sname."</td>";
			   	echo "<td align=center>".$mun."</td>";
				echo "<td align=center>".$district."</td>";
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
