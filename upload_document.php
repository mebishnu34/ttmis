<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<?php
  include("Processing/db_connection.php");
  include("title.htm");
  if(isset($_SESSION['uname']))
  {
  $teacher=$_SESSION['uname'];
  }
?>

<body>
<form method="post" enctype="multipart/form-data" action="Object/save_teacher_document.php">
<table>

     <tr>
      <td>Select Document</td>
      <td><input name="txttid" type="hidden" value="<?php echo $_SESSION['tid'];?>"><input type="hidden" name="MAX_FILE_SIZE" value="2000000"></td>
<td> <input type="file" name="document" id="document"></td>
</tr>
<td colspan="3" align="center"><input type="submit" name="upload" id="upload" value="Upload"></td>
</table>
</form>
</body>
</html>

