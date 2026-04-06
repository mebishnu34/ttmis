<?php
$subject=$_SESSION['training'];
$fyear=$_SESSION['fyear'];
$sdate=$_SESSION['sdate'];
$edate=$_SESSION['edate'];
$selectno=$_SESSION['selectno'];
$alter=$_SESSION['alter'];
?>
<html>
    <head>
        <link rel="stylesheet" href="../../CSS/body.css">
        <link rel="stylesheet" href="../../CSS/header.css">
        <link rel="stylesheet" href="../../CSS/login.css">
    </head>
<body>
<?php
   // echo $_SESSION['trainingid'];
?>
<center><h3><u>तालिमको विषय :-<?php echo $subject; ?> , आर्थिक वर्ष <?php echo $fyear;?></u> </h3></center>
<center><h3><u>तालिमको शुरु भएको  मिति :-<?php echo $sdate; ?> ,तालिमको समापन हुने मिति <?php echo $edate;?></u> </h3></center>
<form action="../PHP/save_selection.php" method="POST" align="center">
<table width="80%" border="1" cellspacing="0" cellpadding="4" align="center" bgcolor="#FFFFFF"> 

<tr> 
      <th>र्क्र.सं.</th> 
      <th>प्रशिक्षार्थिको नाम</th>
      <th>नागरिक्ता नम्बर</th>
      <th>अन्तरवार्तामा प्राप्त अंक</th>
      <th>छनोट</th>
      </tr>
  
<?php
include("../PHP/db_connection.php");
$mark=0;
$i=0;
$trainingid=$_SESSION['trainingid'];
$msql = "SELECT employeeid,obtmark, remark FROM tblmarkdetails where trainingid='".$trainingid."' and remark<>'Dropped' ORDER BY obtmark DESC";
$mresult = mysqli_query($conn, $msql);       
$Sno=1;
if (mysqli_num_rows($mresult) > 0) 
        {
        while($mrow = mysqli_fetch_assoc($mresult))
            {
                $mark=$mrow['obtmark'];
                $tnameid=$mrow["employeeid"];
                $sql = "SELECT traineename, citizenshipno, district, palika, wardno, contactno, profession, certificateno,financial_year,ministry, remark FROM tbltrainee where trainingid='".$trainingid."' and id='".$tnameid."'";
                $result = mysqli_query($conn, $sql);       
                $sno=1;
                    if (mysqli_num_rows($result) > 0) 
                        {
                        if($row = mysqli_fetch_assoc($result))
                            {
                            $tname=$row["traineename"];
                            $ctzno=$row["citizenshipno"];
                        
                           }
             }
   ?>
            <input type="hidden" value="<?php echo $tnameid;?>" name="txtname[]">
        <?php
                echo '<tr> 
                <td align=center>'.$Sno++.'</td> 
                <td>'.$tname. '</td> 
                <td align="center">'.$ctzno.'</td> 
                <td align="center">'.$mark.'</td> 
                <td align="center">';
                if($i<$selectno)
                {
            ?>
                    <input type="Radio" name="txtselection<?php echo $i;?>" value="Selected" checked>छनोट भएको &nbsp;&nbsp;&nbsp; <input type="Radio" name="txtselection<?php echo $i;?>" value="Alter">बैकल्पिकमा छनोट भएको &nbsp;&nbsp&nbsp; <input type="Radio" name="txtselection<?php echo $i;?>" value="Reject">छनोट नभएको </td> 
        <?php
                }
                elseif($i<($selectno+$alter))
                {
                ?>
                    <input type="Radio" name="txtselection<?php echo $i;?>" value="Selected">छनोट भएको &nbsp;&nbsp;&nbsp; <input type="Radio" name="txtselection<?php echo $i;?>" value="Alter" checked>बैकल्पिकमा छनोट भएको &nbsp;&nbsp&nbsp; <input type="Radio" name="txtselection<?php echo $i;?>" value="Reject">छनोट नभएको </td> 
        <?php
                }
                else
                {
        ?>
                <input type="Radio" name="txtselection<?php echo $i;?>" value="Selected">छनोट भएको &nbsp;&nbsp;&nbsp; <input type="Radio" name="txtselection<?php echo $i;?>" value="Alter">बैकल्पिकमा छनोट भएको &nbsp;&nbsp&nbsp; <input type="Radio" name="txtselection<?php echo $i;?>" value="Reject" checked>छनोट नभएको </td> 
        <?php
                }
                echo "</tr>";
            $i++;
    
   }
}
?>
     <tr>
                    <td align="center" colspan="5"><input type="submit" value="Save" class="btn_ucreate" name="btnsave" id="btnsave"></td>
    </tr>
</table>
<div align="center">

<?php 

if(isset($_GET['msg']))
{
  echo $_GET['msg'];
}
?>
</div>

</body>
</html>
    
