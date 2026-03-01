<?php
session_start();
//include the following 2 files
include("../Processing/db_connection.php");
include('../PHPExcel/Classes/PHPExcel.php');
include('../PHPExcel/Classes/PHPExcel/IOFactory.php');
$result="";
$message="";
$tresult="";
$tmessage="";
$lresult="";
$lmessage="";
$mresult="";
$mmessage="";
$sql1 = "SELECT max(importno) FROM tbltpd";
$result = mysqli_query($conn,$sql1);
if ($row1 = mysqli_fetch_array($result))
	{
        $impno=$row1["max(importno)"]+1;
  	}
if(move_uploaded_file($_FILES['file']['tmp_name'], '../importfile/' . $_FILES['file']['name']))
	{
        //echo "File Saved: " . realpath('../importfile/' . $_FILES['file']['name']) . "<br>";
    	 echo "File Saved Successfully<br>";
    }
$path="../importfile/tpdresult.xlsx";
$objPHPExcel = PHPExcel_IOFactory::load($path);
foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) 
	{
   		$worksheetTitle     = $worksheet->getTitle();
   		$highestRow         = $worksheet->getHighestRow(); // e.g. 10
   		$highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
   		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
    	$nrColumns = ord($highestColumn) - 64;
    	echo "<br>The worksheet ".$worksheetTitle." has ";
    	echo $nrColumns . ' columns (A-' . $highestColumn . ') ';
    	echo ' and ' . $highestRow . ' row.';
    	echo '<br>Data: <table border="1"><tr>';
    	for ($row = 1; $row <= $highestRow; ++ $row)
		    {
      		echo '<tr>';
       		 for ($col = 0; $col < $highestColumnIndex; ++ $col)
			 	 {
           		 $cell = $worksheet->getCellByColumnAndRow($col, $row);
            	$val = $cell->getValue();
            	$dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);
           		 echo '<td>' . $val . '</td>';
       			 }
       		 echo '</tr>';
   			 }
    	echo '</table>';
		}
	for ($row = 2; $row <= $highestRow; ++ $row) 
	{
    	$val=array();
		for ($col = 0; $col < $highestColumnIndex; ++ $col) 
		{
   		$cell = $worksheet->getCellByColumnAndRow($col, $row);
  	 	$val[] = $cell->getValue();
		}
		$sql="INSERT INTO `tbltpd`(tcode,tname,teacherlevel,schoolname,district,logov,regularatten,creative,written,planning,trainingstep,tpdtype,tpdstep,tsubject,trainingdate,closingdate,fyear,trainingvenue,facilitator,remark,importno) VALUES ('".$val[0] . "','" . $val[1] . "','" . $val[2] . "','" . $val[3]. "','" . $val[4]. "','" . $val[5]. "','" . $val[6]. "','" . $val[7]. "','" . $val[8]. "','" . $val[9]. "','" . $val[10]. "','" . $val[11]. "','" . $val[12]. "','" . $val[13] . "','" . $val[14] . "','" . $val[15] . "','" . $val[16] . "','" . $val[17] . "','" . $val[18] . "','" . $val[19] . "','" . $impno . "')";
		//mysqli_query($conn,$sql);
		if (mysqli_query($conn, $sql))
         {
          $result= "True";
          }
      else
          {
		  $result= "False";
		  $message= "Import_tpd" . $sql . "<br>" . mysqli_error($conn);
		  }
	}
if ($result=="True")
         {
          echo "Data Imported Successfully";
          }
      else
          {
		 // echo $message;
		  $mobileno="9851001482";
		  include("sms_code.php");
          //header('Location: ../Admin/entry.php?msg= "Sorry, Try Later..."');
	}

?>

