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
$i=1;
	$sql="SELECT * FROM tblteacherrequest ORDER BY teacherid";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result))
		{
			$tid=$row["teacherid"];
			$sql1 = "SELECT * FROM tblteacher where teacherid='$tid'";
  			$result1 = $conn->query($sql1);
         	if ($result1->num_rows > 0)
          	{
           	if($row1 = $result1->fetch_assoc())
             {
                $tname=$row1['tname'];
				$scode=$row1['schoolcode'];
				$sql2 = "SELECT * FROM tblschool where ID='$scode'";
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
