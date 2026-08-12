<?php
class data
{
	var $connection;
	function data($host, $dbuser, $dbpassword, $database)
	{
		$this->connection = @mysql_connect($host, $dbuser, $dbpassword);
		mysql_select_db($database, $this->connection);
	}
	
	function exec($sql)
	{
		$sql = str_replace("++--","\'",$sql);
		$sql = str_replace("@@))","\"",$sql);
		$sql = str_replace("**&&"," ",$sql);
		$result = mysql_query($sql,$this->connection);
		if($result)
		{
			return $result;
		}
		else
		{
			echo $sql."<br>";
			echo mysql_error();
		}
	}

	function fetch_array($result)
	{
		return mysql_fetch_array($result);
	}
	
	function count_row($result)
	{
		return mysql_num_rows($result);
	}
	
	function insert_id()
	{
		return mysql_insert_id();
	}
}

?>
