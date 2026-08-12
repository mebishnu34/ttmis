<?php
/*$dbuser="ttmisbagamatigov_bishnu";
$dbpassword=")eSfJe,TtUGB";
$database=ttmisbagamatigov_portaldb;
$host = "localhost";
*/
//$ado=new data($host,$dbuser,$dbpassword,$database);
$dbuser="root";
$dbpassword="";
$database="ttmisdb";

$host = "localhost";

$conn_1 = mysqli_connect($host, $dbuser, $dbpassword, $database);
// Check connection
//echo "Initial character set is: " . $conn -> character_set_name();
// Change character set to utf8
$conn_1 -> set_charset("utf8");

//echo "Current character set is: " . $conn -> character_set_name();

if (!$conn_1) 
{
    die("Connection failed: " . mysqli_connect_error());
}
/*
else
{
    mysqli_set_charset( $conn_1, 'UTF-8');
}
*/
?>
