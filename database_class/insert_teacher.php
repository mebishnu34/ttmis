<?php
class teacher
{
	function saveteacher($tname, $gender,$dob,$a,$d, $vdc, $ward,$tc, $adate,$atype,$level,$sname,$sa, $sc)
	{
		global $ado;
		$date = date("Y-m-d");
		$sql = "INSERT INTO tblteacher(tname, gender,dob, address,district, munvdc, wardno,tcontact, appointdate, appointtype,workinglevel, schoolname, contact) values('$tname', '$gender','$dob','$a','$d','$vdc', '$ward','$tc', '$adate','$atype','$level','$sname','$sa', '$sc')";
		$ado->exec($sql);
		return true;
	}
	
	
function getAll()
	{
		global $ado;
		$sql = "SElECT * FROM tblteacher";
		$result = $ado->exec($sql);
		$row = $ado->count_row($result);
		return $result;
	}

	function getByteacher($teacher)
	{
		global $ado;
		
		$sql = "SElECT * FROM tblteacher WHERE tname = '$teacher'";
		$result = $ado->exec($sql);
		$row=$ado->count_row($result);
		return $result;
	}
}


?>
