<?php
//$dbuser="ttmisbagamatigov_bishnu";
//$dbpassword=")eSfJe,TtUGB";
//$database="ttmisbagamatigov_digitallearning_db";
$dbuser="root";
$dbpassword="";
$database="bagamati_portaldb";
$host = "localhost";

//$ado=new data($host,$dbuser,$dbpassword,$database);
$conn = mysqli_connect($host, $dbuser, $dbpassword, $database);
// Check connection
//echo "Initial character set is: " . $conn -> character_set_name();
// Change character set to utf8
$conn -> set_charset("utf8");
//echo "Current character set is: " . $conn -> character_set_name();

if (!$conn) 
{
  die("Connection failed: " . mysqli_connect_error());
}
/*
else
{
    mysqli_set_charset( $conn, 'UTF-8');
}
*/

?>
