<?php
ob_start();
session_start();
include("../database/db_connection.php");
//if($_SESSION['Admin']=="")
//	{
//		header('Location: ../index.php');
//	}
?>
<html>
<head><link rel="stylesheet" type="text/css" href="../css/body.css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>OTS:Portal</title>
</head>
<body>
<table width="100%" align="center" bgcolor="#000066">
<tr>
<td><img src="../image/banner.jpg" width="95%"></td>
<td height="100" width="250"><font size="+2" color="#FFFFFF"><?php echo $_SESSION['fname'] . "<br>" . $_SESSION['utype'];?></font></td>

</tr>
</table>
