<?php
$QueryP1 = "SELECT tsubject,regularatten, creative, written, planning,trainingdate, closingdate, fyear, trainingvenue, facilitator,remark FROM tbltpd where tcode='$teachercode' and tpdstep='P1'";
$ExecQueryP1 = MySQLi_query($conn, $QueryP1);
if ($rowt = MySQLi_fetch_array($ExecQueryP1)) 
   {
    $p1subject=$rowt["tsubject"];
    $p1regular=$rowt["regularatten"];
    $p1creative=$rowt["creative"];
    $p1written=$rowt["written"];
    $p1planning=$rowt["planning"];
    $p1startdate=$rowt["trainingdate"];
     $p1enddate=$rowt["closingdate"];
    $p1venue=$rowt["trainingvenue"];
    $p1facilitor=$rowt["facilitator"];
    }

$QueryP2 = "SELECT tsubject,regularatten, creative, written, planning,trainingdate, closingdate, fyear, trainingvenue, facilitator,remark FROM tbltpd where tcode='$teachercode' and tpdstep='P2'";
$ExecQueryP2 = MySQLi_query($conn, $QueryP2);
    if ($rowt = MySQLi_fetch_array($ExecQueryP2)) 
       {
        $p2subject=$rowt["tsubject"];
        $p2regular=$rowt["regularatten"];
        $p2creative=$rowt["creative"];
        $p2written=$rowt["written"];
        $p2planning=$rowt["planning"];
        $p2startdate=$rowt["trainingdate"];
         $p2enddate=$rowt["closingdate"];
        $p2venue=$rowt["trainingvenue"];
        $p2facilitor=$rowt["facilitator"];
        }
  
if($percent>=50)
{
   $result="Passed";
}
else
{
    $result="Failed";
}
if($percent>=90)
{
    $division="Distinction";
}
elseif($percent>=80)
{
    $division="First";
}
elseif($percent>=60)
{
    $division="Second";
}
elseif($percent>=50)
{
    $division="Third";
}
else
{
    $division="Failed";
}
$rem="";

$p1percent=$p1gtotal/50*100;


if($p1percent>=40)
{
   $p1result="Passed";
}
else
{
    $p1result="Failed";
}
if($p1percent>=90)
{
    $p1division="Distinction";
}
elseif($p1percent>=80)
{
    $p1division="First";
}
elseif($p1percent>=60)
{
    $p1division="Second";
}
elseif($p1percent>=40)
{
    $p1division="Third";
}
else
{
    $p1division="Failed";
}

$p2percent=$p2gtotal/50*100;
if($p2percent>=40)
{
   $p2result="Passed";
}
else
{
    $p2result="Failed";
}
if($p2percent>=90)
{
    $p2division="Distinction";
}
elseif($p2percent>=80)
{
    $p2division="First";
}
elseif($p2percent>=60)
{
    $p2division="Second";
}
elseif($p2percent>=40)
{
    $p2division="Third";
}
else
{
    $p2division="Failed";
}



$nettotal=$p1gtotal+$p2gtotal;
$finalpercent=$nettotal/100 *100;
if($finalpercent>=50)
{
   $finalresult="Passed";
}
else
{
    $finalresult="Failed";
}
if($finalpercent>=90)
{
    $finaldivision="Distinction";
}
elseif($finalpercent>=80)
{
    $finaldivision="First";
}
elseif($finalpercent>=60)
{
    $finaldivision="Second";
}
elseif($finalpercent>=50)
{
    $finaldivision="Third";
}
else
{
    $finaldivision="Failed";
}
$finalrem="";

?>