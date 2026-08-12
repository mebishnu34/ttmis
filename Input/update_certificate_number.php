<?php
session_start();
if($_SESSION['token']<>"Run")
{
header('Location: ../admin_login.php?msg= "Please Login"');

}
?>
<HTML>
<HEAD>
 <TITLE>TTMIS</TITLE>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <link rel="stylesheet" href="../CSS/main_table.css">
  <link rel="stylesheet" href="../CSS/sidemenu.css">
  <link rel="stylesheet" type="text/css" href="../CSS/div_column.css">
</HEAD>
<BODY class="bg">
<?php
include("../Processing/db_connection.php");
   include("title.htm");
if(isset($_GET['tid']))
  {
  $id=$_GET['tid'];
  
   $sql="SELECT ID,certificatenumber,registernumber,prepairedby, checkby,approvedby FROM tblttraining where ID='".$id."'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
      {
         $cnumber=$row['certificatenumber'];
      $regno=$row['registernumber'];
      $prepared=$row['prepairedby'];
      $checkby=$row['checkby'];
      $approveby=$row['approvedby'];
      
       }

?>
<div align="center">
    <table class="maintable">
<tr>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td  valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130" width="100%"></td>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
    <td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1" color="#FFFFFF"><b>Teacher Training Management Information System(TTMIS)</b></font></td>
<td bgcolor="#0000FF"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>

<form method="Post" Action="#">
    <table class="subtable" cellpadding="10">
           <tr>
           <td colspan="2" align="center">Update Certificate Number</td>
           </tr>
           <tr>
               <td align="right">Training ID</td>
               <td><input type="text" name="txtid" value="<?php echo $id; ?>" size="5" readonly></td>
           </tr>
           <tr>
               <td align="right">Certificate Number</td>
               <td><input type="Text" name="txtcnumber" value="<?php echo $cnumber; ?>" size="20"></td>
           </tr>
           <tr>
               <td align="right">Reg.Number</td>
               <td><input type="Text" name="txtregno" value="<?php echo $regno; ?>" size="20"></td>
           </tr>
           <tr>
               <td align="right">Prepaired By</td>
               <td><input type="text" name="txtprepaired" value="<?php echo $prepared;?>" size="20"></td>
           </tr>
           <tr>
               <td align="right">Checked By</td>
               <td><input type="Text" name="txtcheckby" value="<?php echo $checkby; ?>" size="20"></td>
           </tr>
           <tr>
               <td align="right">Approved By</td>
               <td><input type="Text" name="txtapproved" value="<?php echo $approveby; ?>" size="20"></td>
           </tr>
           <tr>
               <td colspan="2" align="center"><input type="submit" value="Update" name="btnupdate"></td>
           </tr>
    </table>
</form>
</div>
</BODY>
</HTML>
<?php
if(isset($_POST['btnupdate']))
    {
        mysqli_query($conn,"UPDATE tblttraining set certificatenumber='".$_POST['txtcnumber']."',registernumber='".$_POST['txtregno']."',prepairedby='".$_POST['txtprepaired']."', checkby='".$_POST['txtcheckby']."',approvedby='".$_POST['txtapproved']."'  where ID='".$_POST['txtid']."'");
        ?>
        <script>
            window.close();
        </script>
        <?php
    }
  }
?>