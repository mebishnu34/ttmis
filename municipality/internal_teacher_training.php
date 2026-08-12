<script type="text/javascript" src=".script/subject.js"></script>
<div class="row">
	<div class="column1">
				Training: <Select id="cmbtraining" class="normaltext" onChange="selecttraining()">
                 <option>सबै</option>
				 <option>शिक्षक पेशागत विकास</option>
                        <option>पुनर्ताजगी</option>
                        <option>नेतृत्व तथा व्यवस्थापन</option>
                </select>
	</div>
	<div class="column_gap">
	&nbsp;
	</div>
	<div class="column2">
		Level:<select id="cmblevel" class="normaltext" onChange="selectlevel()">
		<option>सबै</option>
         <option>वालविकास केन्द्र</option>
         <option>आधारभूत (१ –५)</option>
         <option>आधारभूत (६ –८)</option>
         <option>माध्यमिक(९ –१०)</option>
         <option>माध्यमिक(११ –१२)</option>
         <option>प्रधानाध्यापक (आधारभूत)</option>
          <option>प्रधानाध्यापक (माध्यमिक)</option>
		  <option>अन्य</option>
		</select>
	</div>
	<div class="column_gap">
	&nbsp;
	</div>
	<div class="column3">
		<div id="displaydata"></div> 
			</div>
	</div>
<div id="displayreport"></div>
<!--
<table width="100%"  class="subtable" bgcolor="#FFFFFF">
<tr>
<th align="center">S.No</th>
<th align="center">Teacher Code</th>
<th>Name of Teacher</th>
<th>Name of School</th>
<th>Name Of Training</th>
<th>Subject</th>
<th>Start Date</th>
<th>End Date</th>
<th>Remark</th>
<th></th>
</tr>
-->
<?php
/*
$sn=1;
include("Processing/db_connection.php");
$d = $_SESSION['uname'];
$sql1 = "SELECT * FROM tblteacher where munvdc='$d' ORDER BY teachercode";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
	$tcode=$row["teachercode"];
	$sqlt = "SELECT * FROM tblttraining where teacherid='$tcode' ORDER BY trainingid";
	$resultt = $conn->query($sqlt);
		if($resultt->num_rows > 0)
   		{
    	while($rowt = $resultt->fetch_assoc())
    	   {
    	       $sqls = "SELECT schoolname FROM tblschool where schoolcode='$rowt[schoolcode]'";
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
		    echo "<td align=center>" . $rowt["teacherid"] . "</td>";
    		echo "<td>" . $row["tname"] . "</td>";
			echo "<td>" . $schoolname . "</td>";
			$trainingid=$rowt["trainingid"];
			$sqltr = "SELECT * FROM tbltraining where ID='$trainingid'";
			$resulttr = $conn->query($sqltr);
			if($resulttr->num_rows > 0)
   				{
    			if($rowtr = $resulttr->fetch_assoc())
    	   			{
					echo "<td>" . $rowtr["trainingname"] . "</td>";
					echo "<td>" . $rowtr["subject"] . "</td>";
					}
				}
			 echo "<td>" . $rowt["sdate"] . "</td>";
    		echo "<td>" . $rowt["edate"] . "</td>";
			echo "<td>" . $rowt["training"] . "</td>";
		    $sn++;
		   }
		}
    }
  }
*/
?>
