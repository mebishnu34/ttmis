<HTML>
<HEAD>
<title>TTIMS</title>
<link rel="stylesheet" href="CSS/main_table.css">
    <link rel="stylesheet" href="CSS/sidemenu.css">
 <?php
  include("Processing/db_connection.php");
 ?>

</HEAD>
<body class="bg">
<div align="center">
 <table width="100%" bgcolor="#FFFFFF" border="1" cellspacing="0" cellpadding="2">
<tr>
<th align="center">S.No</th>
<th align="center">School Code</th>
<th align="center">Name of School</th>
<th align="center">Head of School</th>
<th align="center">Contact</th>
<th align="center">Login Name</th>
<th align="center">Password</th>

<th></th>
</tr>
<?php
                    $sql="SELECT schoolname, schoolcode,address,wardno, contact,email,authorizeperson,loginname,spass FROM tblschool where munvdc='$_SESSION[uname]' and (remark='Running' OR remark='Registered') ORDER BY schoolname";
                    $result = mysqli_query($conn,$sql);
                    $sn=1;
                    while($row = mysqli_fetch_array($result))
                          {
                          ?>
                          <tr>
                              <td align="center"><?php echo $sn;?></td>
							  <td align="center"><?php echo $row['schoolcode'];?></td>
                              <td><?php echo $row['schoolname'];?></td>
							  <td><?php echo $row['authorizeperson'];?></td>
							  <td align="center"><?php echo $row['contact'];?></td>
							  <td align="center"><?php echo $row['loginname'];?></td>
							  <td align="center"><?php echo $row['spass'];?></td>
							  
                              <td bgcolor="#0000FF" align="center"><a href="municipality/municipality_school_teacher.php?tlinkid=<?php echo $row['schoolcode'];?>" target="blank">Teacher</a> // <a href="municipality/update_school_information_1.php?tlinkid=<?php echo $row['schoolcode'];?>" target="blank">Edit</a></td>
                              </tr>

                          <?php
                          $sn++;
                          }

               ?>


</table>
<div align="center" style="background-color:#0000FF"><a href="export/export_palika_school.php" target="_blank">Export In Excel</a></div>
</BODY>
</HTML>
