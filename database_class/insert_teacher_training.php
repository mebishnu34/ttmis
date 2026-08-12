<?php
class teachertraining
{
	function saveteachertraining($tid, $traid, $tn, $sd, $ed, $r)
	{
		global $ado;
		$date = date("Y-m-d");
		$sql = "INSERT INTO tblttraining(teacherid, trainingid, trainingnumber, startdate, enddate, remark) values('$tid', '$traid', '$tn', '$sd','$ed', '$r')";
		$ado->exec($sql);
		return true;
	}
	
	
function getAll()
	{
		global $ado;
		$sql = "SElECT * FROM tblttraining";
		$result = $ado->exec($sql);
		$row = $ado->count_row($result);
		return $result;
	}

	function getByteacherid($tid)
	{
		global $ado;
		
		$sql = "SElECT * FROM tblttraining WHERE teacherid = '$tid'";
		$result = $ado->exec($sql);
		$row=$ado->count_row($result);
		return $result;
	}
}


?>
