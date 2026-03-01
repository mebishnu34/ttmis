<?php
class attendance
{
	function saveattendance($tra, $tn, $t, $r, $od)
	{
		global $ado;
		$date = date("Y-m-d");
		$sql = "INSERT INTO tblattendance(trainingid,trainingnumber, teacherid, remark, ondate) values('$tra', '$tn', '$t', '$r', '$od')";
		$ado->exec($sql);
		return true;
	}
	
	
function getAll()
	{
		global $ado;
		$sql = "SElECT * FROM tblattendance";
		$result = $ado->exec($sql);
		$row = $ado->count_row($result);
		return $result;
	}

	function getBytrainingid($traid, $tn)
	{
		global $ado;
		
		$sql = "SElECT * FROM tblattendance WHERE trainingid = '$traid' and trainingnumber='$tn'";
		$result = $ado->exec($sql);
		$row=$ado->count_row($result);
		return $result;
	}
}


?>
