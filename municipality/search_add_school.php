<?php
include("Processing/db_connection.php");
$count=0;
?>
<HTML>
<HEAD>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <!-- Including our scripting file. -->
<script type="text/javascript" src="script/searchschool.js"></script>
<script type="text/javascript" src="script/searchschool1.js"></script>
   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
 <TITLE>TTMIS</TITLE>
 <link rel="stylesheet" href="CSS/main_table.css">
    <link rel="stylesheet" href="CSS/sidemenu.css">
	<link rel="stylesheet" type="text/css" href="CSS/table_css.css">
</HEAD>
<BODY>
<form action="" method="Post">
  <table width="100%">
  <tr>
    <td valign="top">Search By Name: <input type="text" id="search" placeholder="Search by Name" /></td>
	<td>Search By Code: <input type="text" id="search1" placeholder="Search by Code" /></td>
    </form>
    </tr>
  </table>
<div id="display"></div>  
<div id="display1"></div>  
</BODY>

</HTML>
