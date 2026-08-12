<!DOCTYPE html>
<html>
<head>
<title>EDUTC</title>
</head>
<body>
<?php
$q = $_GET['q'];
//echo $q;
if($q=="Basic")
{
?>
<select name="cmbbasic">
<option>ECD</option>
<option>1 To 5</option>
<option>6 To 8</option>
</select>
<?php
}
elseif($q=="Secondary")
{
?>
<select name="cmbbasic">
<option>9 To 10</option>
<option>11 To 12</option>
</select>
<?php
}
?>
</body>
</html>
