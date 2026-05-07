<?php
include("../Processing/db_connection.php");
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <!-- Including our scripting file. -->
   <script type="text/javascript" src="../script/search_for_certificate.js"></script>
 <table width="100%">
    <tr>
        <td bgcolor="blue"><a href="registration.php?linkid=14" target="_blank">New Teacher</a> </td>
  </tr>
    <tr>
    <td valign="top">
Search By Name: <input type="text" id="search" placeholder="Search BY Name" /> Search By Mobile No: <input type="text" id="searchmobile" placeholder="Search BY Mobile No" />
  </td>
  </tr>
  </table>
<div id="display"></div>