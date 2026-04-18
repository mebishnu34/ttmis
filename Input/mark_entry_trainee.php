<?php
include("../Processing/db_connection.php");
include("title.htm");
include("../Processing/db_connection.php");
?>
<HTML>
<HEAD>
 <TITLE>TTMIS</TITLE>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <link rel="stylesheet" href="../CSS/main_table.css">
  <link rel="stylesheet" href="../CSS/sidemenu.css">
  <link rel="stylesheet" href="../CSS/table_css.css">
  <link rel="stylesheet" type="text/css" href="../CSS/div_column.css">
</HEAD>
<BODY class="bg">
<div align="center">
<table class="maintable">
<tr>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td  valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130" width="100%"></td>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
</table>

<form method="Post" Action="../Object/save_training_mark.php">
 <table width="60%" border="1" bgcolor="#FFFFFF" cellpadding="2" cellspacing="0">
<tr>
<th>S.No</th>
<th>शिक्षककाे नाम</th>
<th>माेबाइल न‌‍</th>
<th>तालिमकाे नाम</th>
<th>अ‌क</th>
</tr>
<?php
if(isset($_GET['id']))
{
$_SESSION['trunid']=$_GET['id'];
$i=1;
$sql1 = "SELECT ID,teacherid,schoolcode,sdate,edate,runid FROM tblttraining where (trainingid='".$_SESSION['trunid']."' or runid='".$_SESSION['trunid']."') and remark='Running'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
	while($row = $result->fetch_assoc())
    {
	$tcode=$row["teacherid"];
  
	$tname="";
	$contact="";
		$sqlt = "SELECT tname,tcontact,district, munvdc,loginname, tpass FROM tblteacher where (teacherid='$tcode' or teachercode='$tcode')";
		$resultt = $conn->query($sqlt);
		if($resultt->num_rows > 0)
   		  {
    	    if($rowt = $resultt->fetch_assoc())
    	      {
		          $contact=$rowt["tcontact"];
		          $tname=$rowt["tname"];
		    
		        }
		    }
		    $sql2="SELECT trainingname,coordinator, mobileno,startdate, enddate,subject from tblruntraining where id='".$row["runid"]."'";
        $result2=$conn->query($sql2);
        if($result2->num_rows>0)
	            {
		            if($data=$result2->fetch_assoc())
			            {
                      $sdate=$data["startdate"];
                      $edate=$data["enddate"];
                        $subject=$data["trainingname"].'-'.$data["subject"];
			            }
                }

	?>
 <tr>
<td align="center"><?php echo $i; ?><input type="Hidden" name="id" value="<?php echo $i; ?>" readonly="true" size="5">
<input size="10" readonly="True" type="hidden" name="teacherid[]" value="<?php echo $tcode;?>">
<input size="10" readonly="True" type="hidden" name="trainingid[]" value="<?php echo $_SESSION['trunid'];?>">
</td>
<td><?php echo $tname;?></td>
<td><?php echo $contact;?></td>
<td><?php echo $subject;?></td>
<?php
$obtmark="";
//echo $tcode;
$sqlmark = "select subjective from tblmarkdetails where teacherid='".$tcode."' and trainingid='".$row["runid"]."'";
$resultmark=$conn->query($sqlmark);
    {
      if($datamark=$resultmark->fetch_assoc())
			            {
                      $obtmark=$datamark["subjective"];
                     // echo $obtmark;
                  }
          }
?>
<td align="center"><input type="text" value="<?php echo $obtmark;?>" name="obtmark[]" size="5"></td>
<!--<td bgcolor="#0000FF"><?php //echo "<a href=../Input/teacher_update_1.php?tid=$teacherid target=_blank>Edit</a>";?></td>-->
<?php
  	echo "</tr>";
    	$i++;
  
         }
    }
	
?>


<tr>
<td colspan="6" align="center"><input type="Submit" value="Save" class="button"> </td>
</tr>
</table>
</form>
<?php
}
?>
</body>
</html>
