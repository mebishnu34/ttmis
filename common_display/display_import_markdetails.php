<?php
include("../Processing/db_connection.php");
 if(isset($_GET['importno']))
	{
		$impno= $_GET['importno'];
		$sn=1;
		$sql="Select * FROM tblmarkdetails where importno='".$impno."'";
		$result=mysqli_query($conn,$sql);
		$html="<table border='1'>";
		$html.="<tr>";
				$html.='<th>S.No.</th>';
				$html.='<th>Entry Date</th>';
				$html.='<th>Training ID</th>';
				$html.='<th>Teacher ID</th>';
				$html.='<th>Present</th>';
				$html.='<th>Dicipline</th>';
				$html.='<th>Activeness</th>';
				$html.='<th>Objective</th>';
				$html.='<th>Subjective</th>';
				$html.='<th>Reporting</th>';
				$html.='<th>Remark</th>';
				$html.='</tr>';
		while($row = mysqli_fetch_array($result))
      {
				$html.="<tr>";
				$html.='<td>'.$sn.'</td>';
				$html.='<td>'.$row['entrydate'].'</td>';
				$html.='<td>'.$row['trainingid'].'</td>';
				$html.='<td>'.$row['teacherid'].'</td>';
				$html.='<td>'.$row['present'].'</td>';
				$html.='<td>'.$row['dicipline'].'</td>';
				$html.='<td>'.$row['activeness'].'</td>';
				$html.='<td>'.$row['objective'].'</td>';
				$html.='<td>'.$row['subjective'].'</td>';
				$html.='<td>'.$row['reporting'].'</td>';
				$html.='<td>'.$row['remark'].'</td>';
				$html.='</tr>';
				$sn++;
		
	}
	$html.='</table>';
echo $html;
}
?>
