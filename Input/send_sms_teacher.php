<HTML>
<?php
include("../Processing/db_connection.php");
   include("title.htm");
   $training="";
   if($_GET['tid'])
  {
  	$id=$_GET['tid'];
   $sql="SELECT * FROM tblruntraining where id='$id'";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result))
      {
	  $training= $row["trainingname"];
  	  }
		
  }
  
?>
<head>
<title>SMS To Teacher</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><BODY>
  <link rel="stylesheet" href="../CSS/main_table.css">
  <link rel="stylesheet" href="../CSS/sidemenu.css">
</HEAD>
<BODY class="bg">
<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="..\Image\logo.svg" width="200" height="180"></td>
<td align="left" bgcolor="#FFFFFF" class="tdradius"><center><img src="..\Image\banner.jpg" width="90%" height="180"></center></td>
</tr>
</table>

<form method="Post" Action="../Object/save_sms_teacher.php">
    <table class="subtable" cellpadding="0">
          <tr>
               <td align="Right">Training ID</td>
               <td><input type="text" name="tid" size="20" value="<?php echo $id;?>"></td>
           </tr>
		    <tr>
               <td align="Right">Name of Training</td>
               <td><?php echo $training; ?></td>
           </tr>
		  <tr>
               <td align="Right">Title</td>
               <td><input type="text" name="txttitle" size="20"></td>
           </tr>
           <tr>
               <td align="Right">Message*Eng.</td>
               <td><textarea name="txtsms" cols="70" rows="5"></textarea></td>
           </tr>

           <tr>
               <td colspan="2" align="center"><input type="submit" value="Send" class="button" name="btnsave"></td>
           </tr>
    </table>
</form>
</BODY>
</HTML>
