<?php
session_start();
include("../Processing/db_connection.php");
include("../print_function.php");
$fyear=$_SESSION["fyear"];
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
<div align="center">
<table class="maintable">
<tr>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td  valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130" width="100%"></td>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
</table>
<form>
<div align="right">
		<input type="Button" name="btnprint" value="Print" onClick="javascript:CallPrint('pdata');">
        </div>
</form>
<?php
if($_GET['id'])
    {
        $trainingid=$_GET['id'];
        //echo $trainingid;
    
?>
<div id="pdata">
      <font size="+2"><b>तालिम सम्पन्न भएका शिक्षकहरु-<?php echo $fyear;?></b></font>
 <table width="100%" bgcolor="#FFFFFF" border="1" cellspacing="0" cellpadding="2">
 <tr>
<th>S.No</th>
<th>काेड</th>
<th>शिक्षककाे नाम</th>
<th>माेबाइल न‌‍</th>
<th>बिद्यालय</th>
<th>तालिमको नाम</th>
<th></th>
</tr>
<?php
$i=1;
$tname="";
$mobileno="";
$schoolname="";
$trainingname="";
$sql = "SELECT ID, teacherid,trainingid FROM tblmarkdetails where trainingid='".$trainingid."' ORDER BY teacherid";
$result = $conn->query($sql);
if ($result->num_rows > 0)
      {
         while($row1 = $result->fetch_assoc())
         {
        echo "<td align=center>" . $i ."</td>";
            $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,runtrainingid,groupnumber FROM tblapplication where appid='".$row1["teacherid"]."'";
            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 0)
                {
                    if($row = $result1->fetch_assoc())
                        {
                        $tname=$row["tname"];
                        $mobileno=$row["mobileno"];
                        $schoolname=$row["schoolname"];
                        }
                }
             $sql2 = "SELECT id,subject, startdate, enddate from tblruntraining where id='".$row1["trainingid"]."'";
             $result2 = $conn->query($sql2);
             if ($result2->num_rows > 0)
                {
                   if($row2 = $result2->fetch_assoc())
                        {
                        $trainingname=$row2["subject"];
                        $sdate=$row2["startdate"];
                        $edate=$row2["enddate"];
                        }
                }
            echo "<td>".$row1["teacherid"]."</td>";
            echo "<td>".$tname."</td>";
            echo "<td align=center>". $mobileno."</td>";
            echo "<td>".$schoolname."</td>";
            echo "<td>".$trainingname."</td>";
            echo "<th align=center bgcolor=blue><a href=../Display/select_certificate_1.php?tid=".$row1["ID"]. " target=blank>Certificate</a></th>";
            echo "</tr>";
         $i++;
         }
      }
mysqli_close($conn);
?>
</table>
</div>
<?php
    }
?>
<body>
    </html>
