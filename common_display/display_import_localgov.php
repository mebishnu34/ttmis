<?php
include("../Processing/db_connection.php");
 if(isset($_GET['importno']))
	{
		$impno= $_GET['importno'];
		$sn=1;
		$sql="Select * FROM tbldistrict where importno='".$impno."'";
		$result=mysqli_query($conn,$sql);
		$html="<table border='1'>";
		$html.="<tr>";
				$html.='<th>S.No.</th>';
				$html.='<th>Name of District</th>';
				$html.='<th>Name of Local Government</th>';
				$html.='<th>Number of Wards</th>';
				$html.='<th>Mobile No.</th>';
				$html.='<th>Login Name</th>';
				$html.='<th>Password</th>';
				$html.='</tr>';
		while($row = mysqli_fetch_array($result))
      {
				$html.="<tr>";
				$html.='<td>'.$sn.'</td>';
				$html.='<td>'.$row['districtname'].'</td>';
				$html.='<td>'.$row['munvdc'].'</td>';
				$html.='<td>'.$row['noofward'].'</td>';
				$html.='<td>'.$row['mobileno'].'</td>';
				$html.='<td>'.$row['mobileno'].'</td>';
				$html.='<td>'.$row['mpass'].'</td>';
				$html.='</tr>';
				$sn++;
		
	}
	$html.='</table>';
echo $html;
}
?>
