<?php
class training
{
	function savetraining($tn, $d, $r)
	{
		global $ado;
		$date = date("Y-m-d");
		$sql = "INSERT INTO tbltraining(trainingname, duration,remark) values('$tn', '$d', '$r')";
		$ado->exec($sql);
		return true;
	}
	
	
function getAll()
	{
		global $ado;
		$sql = "SElECT * FROM tbltraining";
		$result = $ado->exec($sql);
		$row = $ado->count_row($result);
		return $result;
	}

	function getBytraining($tn)
	{
		global $ado;
		
		$sql = "SElECT * FROM tbltraining WHERE trainingname='$tn'";
		$result = $ado->exec($sql);
		$row=$ado->count_row($result);
		return $result;
	}
}


?>
