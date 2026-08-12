<?php
Session_start();
?>
<HTML>
<HEAD>
 <TITLE>Education Training Center, Dhulikhel</TITLE>
<?php
$filename = 'teacher_import.xls';
//include("export_class.php");
?>
<head>
<script src="../script/table2excel.js"></script>
</HEAD>
<BODY>
<?php
$import=$_POST["impname"];
include("../Processing/db_connection.php");
$sql = "SELECT * FROM tblteacher where importno='$import'";
$result=mysqli_query($conn,$sql);  
   if(mysqli_num_rows($result)>0)
    {
     ?>
	   <table border="1" data-excel-name="teacher">
             <tr>
                 <th>S.No</th>
				 <th>Code</th>
                 <th>Name of Teacher</th>
                 <th>Gender</th>
                 <th>Date of Birth</th>
                 <th>Address</th>
                 <th>Contact No.</th>
                 <th>Email</th>
                 <th>District</th>
                 <th>Municipality/Rural</th>
                 <th>Ward No.</th>
                 <th>Appoint Date</th>
                 <th>Appoint Type</th>
                 <th>School Code</th>
				 <th>School Name</th>
                 <th>Teaching Level</th>
                 <th>Qualification</th>
                 <th>Faculty</th>
                 <th>Major Subject</th>
                 <th>Teaching Subject</th>
                 
             </tr>
           <?php
             $n=1;
  		 while($row=mysqli_fetch_array($result))
   		{
  		 ?>
             <tr>
                <td><?php echo $n; ?></td>
				<td><?php echo $row["teacherid"]; ?></td>
                <td><?php echo $row["tname"]; ?></td>
                <td><?php echo $row["gender"]; ?></td>
                <td><?php echo $row["dob"]; ?></td>
                <td><?php echo $row["address"]; ?></td>
                <td><?php echo $row["tcontact"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["district"]; ?></td>
                <td><?php echo $row["munvdc"]; ?></td>
                <td><?php echo $row["wardno"]; ?></td>
                <td><?php echo $row["appointdate"]; ?></td>
                <td><?php echo $row["appointtype"]; ?></td>
                <td><?php echo $row["schoolcode"]; ?></td>
                <td><?php echo $row["schoolname"]; ?></td>
                <td><?php echo $row["teachinglevel"]; ?></td>
                <td><?php echo $row["qualification"]; ?></td>
                <td><?php echo $row["faculty"]; ?></td>
                <td><?php echo $row["majorsubject"]; ?></td>
                <td><?php echo $row["teachingsubject"]; ?></td>
            </tr>
            <?php
            $n++;
   			 }
        }

?>
<center>
<button id="downloadexcel">Export To Excel</button></center>
<script>
      var table2excel = new Table2Excel();
      document.getElementById('downloadexcel').addEventListener('click', function() {
        table2excel.export(document.querySelectorAll('table'));
      });
   </script>
</BODY>
</HTML>
