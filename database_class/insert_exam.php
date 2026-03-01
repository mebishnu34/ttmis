<?php
class exam
{
	function saveexam($e, $et, $mo)
	{
		global $ado;
		$date = date("Y-m-d");
		$sql = "INSERT INTO tblexam(examname,examtype,markof) values('$e', '$et', '$mo')";
		$ado->exec($sql);
		return true;
	}
	
	
function getAll()
	{
		global $ado;
		$sql = "SElECT * FROM tblexam";
		$result = $ado->exec($sql);
		$row = $ado->count_row($result);
		return $result;
	}

	function getByexam($e)
	{
		global $ado;
		
		$sql = "SElECT * FROM tblexam WHERE examname='$e'";
		$result = $ado->exec($sql);
		$row=$ado->count_row($result);
		return $result;
	}
}


?>
