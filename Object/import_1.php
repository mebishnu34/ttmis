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
if(isset($_POST["school"]))
{
	$sql1 = "SELECT max(importno) FROM tblschool";
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
		$path="../importfile/schoollist.xlsx";
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
		$sql="INSERT INTO `tblschool` (schoolname,schoolcode, address, munvdc, wardno, district, contact, mobileno, authorizeperson, email, website, loginname, spass, remark,importno) VALUES ('".$val[0] . "','" . $val[1] . "','" . $val[2] . "','" . $val[3]. "','" . $val[4]. "','" . $val[5]. "','" . $val[6]. "','" . $val[7]. "','" . $val[8]. "','" . $val[9]. "','" . $val[10]. "','" . $val[11]. "','" . $val[12]. "','" . $val[13] . "','" . $impno . "')";
		//mysqli_query($conn,$sql);
		if (mysqli_query($conn, $sql))
         {
          $result= "True";
          }
      else
          {
		  $result= "False";
		  $message= "Import_School" . $sql . "<br>" . mysqli_error($conn);
		  }
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
// Teacher List Import
if(isset($_POST["teacher"]))
{
	$sql1 = "SELECT max(importno) FROM tblteacher";
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
		//$path="../importfile/teacherlist.xlsx";
		$path="../importfile/teacher_reg.xlsx";
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
	
//		$sql="INSERT INTO `tblteacher` (tname, gender, dob,fathername, address, email, district, munvdc, wardno, tcontact,appointdate, appointtype, workinglevel, schoolcode, teachercode, teachinglevel, qualification, faculty, majorsubject, teachingsubject, category, loginname,tpass, remark,importno) VALUES ('".$val[0] . "','" . $val[1] . "','" . $val[2] . "','" . $val[3]. "','" . $val[4]. "','" . $val[5]. "','" . $val[6]. "','" . $val[7]. "','" . $val[8]. "','" . $val[9]. "','" . $val[10]. "','" . $val[11]. "','" . $val[12]. "','" . $val[13]. "','" . $val[14]. "','" . $val[15]. "','" . $val[16]. "','" . $val[17]. "','" . $val[18]. "','" . $val[19]. "','" . $val[20]. "','" . $val[21]. "','" . $val[22]. "','" . $val[23]. "','" . $impno . "')";
		$sql="INSERT INTO `tblteacher` (teachercode,tname,cast, mothertong,teachertype,qualification,teachingsubject,stream,workinglevel,rank,position,scode,schoolname,schooladdress, appointdate, appointtype,subject,fathername, district, munvdc, wardno, tcontact, contact, loginname, tpass, remark,importno,username) VALUES('".$val[0] . "','" . $val[1] . "','" . $val[2] . "','" . $val[3]. "','" . $val[4]. "','" . $val[5]. "','" . $val[6]. "','" . $val[7]. "','" . $val[8]. "','" . $val[9]. "','" . $val[10]. "','" . $val[11]. "','" . $val[12]. "','" . $val[13]. "','" . $val[14]. "','" . $val[15]. "','" . $val[16]. "','" . $val[17]. "','" . $val[18]. "','" . $val[19]. "','" . $val[20]. "','" . $val[21]. "','" . $val[22]. "','" . $val[23]. "','" . $val[24]. "','Approved','" . $impno . "','$_SESSION[uname]')";
		//mysqli_query($conn,$sql);
		if (mysqli_query($conn, $sql))
         {
             	      $tresult= "True";
          }
      else
          {
		  $tresult= "False";
		  $tmessage= "Import_Teacher" . $sql . "<br>" . mysqli_error($conn);
		  }
		  //echo $val[0];
	//echo "<br>";
		}
	}
	if ($tresult=="True")
         {
          echo "Data Imported Successfully";
          }
      else
          {
		  $message=$tmessage;
		  echo $message;
		  //$mobileno="9851001482";
		  //include("sms_code.php");
         // header('Location: ../Admin/entry.php?msg= "Sorry, Try Later..."');
	}
// Teacher Training Import
if(isset($_POST["training"]))
{
	$sql1 = "SELECT max(importno) FROM tblteacher";
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
		//$path="../importfile/teacherlist.xlsx";
		$path="../importfile/training_details.xlsx";
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
	
//		$sql="INSERT INTO `tblteacher` (tname, gender, dob,fathername, address, email, district, munvdc, wardno, tcontact,appointdate, appointtype, workinglevel, schoolcode, teachercode, teachinglevel, qualification, faculty, majorsubject, teachingsubject, category, loginname,tpass, remark,importno) VALUES ('".$val[0] . "','" . $val[1] . "','" . $val[2] . "','" . $val[3]. "','" . $val[4]. "','" . $val[5]. "','" . $val[6]. "','" . $val[7]. "','" . $val[8]. "','" . $val[9]. "','" . $val[10]. "','" . $val[11]. "','" . $val[12]. "','" . $val[13]. "','" . $val[14]. "','" . $val[15]. "','" . $val[16]. "','" . $val[17]. "','" . $val[18]. "','" . $val[19]. "','" . $val[20]. "','" . $val[21]. "','" . $val[22]. "','" . $val[23]. "','" . $impno . "')";
		$sql="INSERT INTO `tblttraining` (teacherid,trainingid,schoolcode,gnumber,coordinator, mobileno,sdate, edate, remark,training,duration,division,organization,importno) VALUES('".$val[0] . "','" . $val[1] . "','" . $val[2] . "','" . $val[3]. "','" . $val[4]. "','" . $val[5]. "','" . $val[6]. "','" . $val[7]. "','" . $val[8]. "','" . $val[9]. "','" . $val[10]. "','" . $val[11]. "','" . $val[12]. "','" . $impno . "')";
		//mysqli_query($conn,$sql);
		if (mysqli_query($conn, $sql))
         {
             	      $tresult= "True";
          }
      else
          {
		  $tresult= "False";
		  $tmessage= "Import_Training" . $sql . "<br>" . mysqli_error($conn);
		  }
		  //echo $val[0];
	//echo "<br>";
		}
	}
	if ($tresult=="True")
         {
          echo "Training Imported Successfully";
          }
      else
          {
		  $message=$tmessage;
		  echo $message;
		  //$mobileno="9851001482";
		  //include("sms_code.php");
         // header('Location: ../Admin/entry.php?msg= "Sorry, Try Later..."');
	}
// import Local Government List
if(isset($_POST["localgov"]))
{
	$sql1 = "SELECT max(importno) FROM tbldistrict";
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
		$path="../importfile/localgovlist.xlsx";
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
		$sql="INSERT INTO `tbldistrict` (districtname, munvdc,noofward,mobileno,mpass,importno) VALUES ('".$val[0] . "','" . $val[1] . "','" . $val[2] . "','" . $val[3]. "','" . $val[4]. "','" . $impno . "')";
		//mysqli_query($conn,$sql);
		if (mysqli_query($conn, $sql))
         {
          $lresult= "True";
          }
      else
          {
		  $lresult= "False";
		  $lmessage= "Import_LocalGov" . $sql . "<br>" . mysqli_error($conn);
		  }
		}
	}
	if ($lresult=="True")
         {
          echo "Data Imported Successfully";
          }
      else
          {
		  $message=$lmessage;
		  $mobileno="9851001482";
		  include("sms_code.php");
          //header('Location: ../Admin/entry.php?msg= "Sorry, Try Later..."');
	}

if(isset($_POST["mark"]))
{
	$sql1 = "SELECT max(importno) FROM tblschool";
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
		$path="../importfile/markdetails.xlsx";
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
		$sql="INSERT INTO `tblmarkdetails` (entrydate, trainingid, teacherid, present, dicipline, activeness, objective, subjective, reporting, remark,importno) VALUES ('".$val[0] . "','" . $val[1] . "','" . $val[2] . "','" . $val[3]. "','" . $val[4]. "','" . $val[5]. "','" . $val[6]. "','" . $val[7]. "','" . $val[8]. "','" . $val[9]. "','" . $impno . "')";
		//mysqli_query($conn,$sql);
		if (mysqli_query($conn, $sql))
         {
          $mresult= "True";
          }
      else
          {
		  $mresult= "False";
		  $mmessage= "Import_Mark" . $sql . "<br>" . mysqli_error($conn);
		  }
		}
	}
	if ($mresult=="True")
         {
          echo "Data Imported Successfully";
          }
      else
          {
		  $message=$mmessage;
		  $mobileno="9851001482";
		  include("sms_code.php");
          //header('Location: ../Admin/entry.php?msg= "Sorry, Try Later..."');
	}

?>

