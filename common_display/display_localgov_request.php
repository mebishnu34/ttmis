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
	<td>Name of Local Government</td>
	<td>District</td>
	<td>Subject</td>
	<td>Request</td>
	</tr>
<?php
$i=1;
	$sql="SELECT * FROM tbllocalgovrequest ORDER BY localgovid";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result))
		{
			$govid=$row["localgovid"];
			$sql1 = "SELECT * FROM tbldistrict where ID='$govid'";
  			$result1 = $conn->query($sql1);
         	if ($result1->num_rows > 0)
          	{
           	if($row1 = $result1->fetch_assoc())
             {
                $mun=$row1['munvdc'];
				$district=$row1['districtname'];
				  echo "<tr>";
		    	echo "<td align=center>".$i."</td>";
				echo "<td align=center>".$govid."</td>";
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
