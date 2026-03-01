<?php
class mark
{
	function savemark($tra, $tn, $e, $t, $om, $od)
	{
		global $ado;
		$date = date("Y-m-d");
		$sql = "INSERT INTO tblmarkdetails(trainingid, traingnumber, examid, teacherid, obtmark, examdate) values('$tra', '$tn', '$e', '$t','$om', '$od')";
		$ado->exec($sql);
		return true;
	}
	
	
function getAll()
	{
		global $ado;
		$sql = "SElECT * FROM tblmarkdetails";
		$result = $ado->exec($sql);
		$row = $ado->count_row($result);
		return $result;
	}

	function getByteacher($traid, $tn, $t)
	{
		global $ado;
		
		$sql = "SElECT * FROM tblmarkdetails WHERE trainingid = '$traid' and trainingnumber='$tn' and teacherid='$t'";
		$result = $ado->exec($sql);
		$row=$ado->count_row($result);
		return $result;
	}
}


?>
