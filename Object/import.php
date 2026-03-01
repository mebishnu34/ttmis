<?php
ob_start();
include("../Processing/db_connection.php");
include("../PHPExcel/Classes/PHPExcel/IOFactory.php");
include("../PHPEXCel/Classes/PHPExcel.php");
 /*
$html="<table border='1'>";
$objectPHPExcel=PHPExcel_IOFactory::load('Book1.xls');
foreach($objectPHPExcel->getworksheetIterator() as $worksheet)
{
	$highestRow=$worksheet->getHighestRow();
		for($row=2; $row<=$highestRow; $row++)
			{
			$html.="<tr>";
				$name=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(0,$row)->getValue());
				$address=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(1,$row)->getValue());
				$sql="INSERT INTO tblimport(schoolname, address) values('".$name."','".$address."')";
				mysqli_query($conn,$sql);
				$html.='<td>'.$name.'<td>';
				$html.='<td>'.$address.'<td>';
				$html.='</tr>';
				
			}
				
}
$html.='</table>';
echo $html;
echo '<br />Data Inserted';
*/
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
		$filename="../importfile/schoollist.xls";
		if($_FILES["file"]["size"] > 0)
		 {
           // $html="<table border='1'>";
			$objectPHPExcel=PHPExcel_IOFactory::load($filename);
			foreach($objectPHPExcel->getworksheetIterator() as $worksheet)
			{
			$highestRow=$worksheet->getHighestRow();
			for($row=2; $row<=$highestRow; $row++)
				{
				//$html.="<tr>";
				$name=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(0,$row)->getValue());
				$scode="";
				$address=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(1,$row)->getValue());
				$mun=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(2,$row)->getValue());
				$ward=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(3,$row)->getValue());
				$district=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(4,$row)->getValue());
				$contact=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(5,$row)->getValue());
				$mobileno=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(6,$row)->getValue());
				$authorize=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(7,$row)->getValue());
				$email=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(8,$row)->getValue());
				$website=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(9,$row)->getValue());
				$loginname=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(10,$row)->getValue());
				$pass=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(11,$row)->getValue());
				$remark=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(12,$row)->getValue());
				$sql="INSERT INTO tblschool(schoolname, schoolcode, address, munvdc, wardno, district, contact, mobileno, authorizeperson, email, website, loginname, spass, remark,importno) values('".$name."','".$scode."','".$address."','".$mun."','".$ward."','".$district."','".$contact."','".$mobileno."','".$authorize."','".$email."','".$website."','".$loginname."','".$pass."','".$remark."','".$impno."')";
				mysqli_query($conn,$sql);
				/*
				$html.='<td>'.$name.'<td>';
				$html.='<td>'.$scode.'<td>';
				$html.='<td>'.$address.'<td>';
				$html.='<td>'.$mun.'<td>';
				$html.='<td>'.$ward.'<td>';
				$html.='<td>'.$district.'<td>';
				$html.='<td>'.$contact.'<td>';
				$html.='<td>'.$mobileno.'<td>';
				$html.='<td>'.$authorize.'<td>';
				$html.='<td>'.$email.'<td>';
				$html.='<td>'.$website.'<td>';
				$html.='<td>'.$loginname.'<td>';
				$html.='<td>'.$pass.'<td>';
				$html.='<td>'.$remark.'<td>';
				$html.='</tr>';
				*/
				header('Location: ../Display/display_import_school.php?importno='.$impno);
			   }
				
		  }
//$html.='</table>';
//echo $html;
//echo '<br />Data Inserted';
	       
	         //throws a message if data successfully imported to mysql database from excel file
	       
	 }
}
 
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
		$filename="../importfile/teacherlist.xlsx";
		if($_FILES["file"]["size"] > 0)
		 {
           // $html="<table border='1'>";
			$objectPHPExcel=PHPExcel_IOFactory::load($filename);
			foreach($objectPHPExcel->getworksheetIterator() as $worksheet)
			{
			$highestRow=$worksheet->getHighestRow();
			for($row=3; $row<=$highestRow; $row++)
				{
				//$html.="<tr>";
				$tname=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(0,$row)->getValue());
				$gender=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(1,$row)->getValue());
				$dob=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(2,$row)->getValue())."/".mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(3,$row)->getValue())."/".mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(4,$row)->getValue());
				$fname=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(5,$row)->getValue());
				$a=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(6,$row)->getValue());
				$email=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(7,$row)->getValue());
				$d=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(8,$row)->getValue());
				$mun=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(9,$row)->getValue());
				$ward=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(10,$row)->getValue());
				$tc=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(11,$row)->getValue());
				$adate=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(12,$row)->getValue())."/".mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(13,$row)->getValue())."/".mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(14,$row)->getValue());
				$atype=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(15,$row)->getValue());
				$level=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(16,$row)->getValue());
				$scode=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(17,$row)->getValue());
				$tcode=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(18,$row)->getValue());
				$tlevel=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(19,$row)->getValue());
				$qualification=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(20,$row)->getValue());
				$faculty=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(21,$row)->getValue());
				$msubject=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(22,$row)->getValue());
				$tsubject=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(23,$row)->getValue());
				$ln=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(25,$row)->getValue());
				$up=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(26,$row)->getValue());
				$category="Teacher";
				$rem="Approved";
				$sql="INSERT INTO tblteacher(tname, gender, dob,fathername, address, email, district, munvdc, wardno, tcontact,appointdate, appointtype, workinglevel, schoolcode, teachercode, teachinglevel, qualification, faculty, majorsubject, teachingsubject, category, loginname,tpass, remark, importno) values('".$tname."','".$gender."','".$dob."','".$fname."','".$a."','".$email."','".$d."','".$mun."','".$ward."','".$tc."','".$adate."','".$atype."','".$level."','".$scode."','".$tcode."','".$tlevel."','".$qualification."','".$faculty."','".$msubject."','".$tsubject."','".$category."','".$ln."','".$up."','".$rem."','".$impno."')";
				mysqli_query($conn,$sql);
				/*$html.='<td>'.$tname.'<td>';
				$html.='<td>'.$gender.'<td>';
				$html.='<td>'.$dob.'<td>';
				$html.='<td>'.$fname.'<td>';
				$html.='<td>'.$a.'<td>';
				$html.='<td>'.$email.'<td>';
				$html.='<td>'.$d.'<td>';
				$html.='<td>'.$mun.'<td>';
				$html.='<td>'.$ward.'<td>';
				$html.='<td>'.$tc.'<td>';
				$html.='<td>'.$adate.'<td>';
				$html.='<td>'.$atype.'<td>';
				$html.='<td>'.$level.'<td>';
				$html.='<td>'.$scode.'<td>';
				$html.='<td>'.$tcode.'<td>';
				$html.='<td>'.$tlevel.'<td>';
				$html.='<td>'.$qualification.'<td>';
				$html.='<td>'.$faculty.'<td>';
				$html.='<td>'.$msubject.'<td>';
				$html.='<td>'.$tsubject.'<td>';
				$html.='<td>'.$ln.'<td>';
				$html.='<td>'.$up.'<td>';
				$html.='<td>'.$category.'<td>';
				$html.='<td>'.$rem.'<td>';
				$html.='</tr>';
				*/
				header('Location: ../Display/display_import_teacher.php?importno='.$impno);
			   }
				
		  }
//$html.='</table>';
//echo $html;
//echo '<br />Data Inserted';
	    //throws a message if data successfully imported to mysql database from excel file
	       
	 }
}
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
		$filename="../importfile/localgovlist.xlsx";
		if($_FILES["file"]["size"] > 0)
		 {
            //$html="<table border='1'>";
			$objectPHPExcel=PHPExcel_IOFactory::load($filename);
			foreach($objectPHPExcel->getworksheetIterator() as $worksheet)
			{
			$highestRow=$worksheet->getHighestRow();
			for($row=2; $row<=$highestRow; $row++)
				{
				//$html.="<tr>";
				$district=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(0,$row)->getValue());
				$mun=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(1,$row)->getValue());
				$noofward=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(2,$row)->getValue());
				$mobile=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(3,$row)->getValue());
				$pass=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(4,$row)->getValue());
				$sql="INSERT INTO tbldistrict(districtname, munvdc,noofward,mobileno,mpass,importno) values('".$district."','".$mun."','".$noofward."','".$mobile."','".$pass."','".$impno."')";
				mysqli_query($conn,$sql);
				/*$html.='<td>'.$district.'<td>';
				$html.='<td>'.$mun.'<td>';
				$html.='<td>'.$noofward.'<td>';
				$html.='<td>'.$mobile.'<td>';
				$html.='<td>'.$pass.'<td>';
				$html.='</tr>';
				*/
				header('Location: ../Display/display_import_localgov.php?importno='.$impno);
			   }
				
		  }
//$html.='</table>';
//echo $html;
//echo '<br />Data Inserted';
	    //throws a message if data successfully imported to mysql database from excel file
	       
	 }
}
if(isset($_POST["mark"]))
{
$sql1 = "SELECT max(importno) FROM tblmarkdetails";
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
		$filename="../importfile/markdetails.xlsx";
		if($_FILES["file"]["size"] > 0)
		 {
            $html="<table border='1'>";
			$objectPHPExcel=PHPExcel_IOFactory::load($filename);
			foreach($objectPHPExcel->getworksheetIterator() as $worksheet)
			{
			$highestRow=$worksheet->getHighestRow();
			for($row=2; $row<=$highestRow; $row++)
				{
				//$html.="<tr>";
				$edate=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(0,$row)->getValue())."/".mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(1,$row)->getValue())."/".mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(3,$row)->getValue());
				$tid=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(4,$row)->getValue());
				$teacherid=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(5,$row)->getValue());
				$present=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(6,$row)->getValue());
				$dicipline=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(7,$row)->getValue());
				$active=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(8,$row)->getValue());
				$objective=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(9,$row)->getValue());
				$subjective=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(10,$row)->getValue());
				$reporting=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(11,$row)->getValue());
				$remark=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(12,$row)->getValue());
				$sql="INSERT INTO tblmarkdetails(entrydate, trainingid, teacherid, present, dicipline, activeness, objective, subjective, reporting, remark,importno) values('".$edate."','".$tid."','".$teacherid."','".$present."','".$dicipline."','".$active."','".$objective."','".$subjective."','".$reporting."','".$remark."','".$impno."')";
				mysqli_query($conn,$sql);
				/*$html.='<td>'.$edate.'<td>';
				$html.='<td>'.$tid.'<td>';
				$html.='<td>'.$teacherid.'<td>';
				$html.='<td>'.$present.'<td>';
				$html.='<td>'.$dicipline.'<td>';
				$html.='<td>'.$active.'<td>';
				$html.='<td>'.$objective.'<td>';
				$html.='<td>'.$subjective.'<td>';
				$html.='<td>'.$reporting.'<td>';
				$html.='<td>'.$remark.'<td>';
				$html.='</tr>';
				*/
				header('Location: ../Display/display_import_markdetails.php?importno='.$impno);
			   }
				
		  }
//$html.='</table>';
//echo $html;
//echo '<br />Data Inserted';
	    //throws a message if data successfully imported to mysql database from excel file
	       
	 }
}
?>
