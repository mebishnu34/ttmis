<?php
include("../Processing/db_connection.php");
   include("title.htm");
  if($_GET['tid'])
  {
  $id=$_GET['tid'];
  }
   $sql="SELECT * FROM tbltraining where ID='$id'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
      {
      $training=$row['trainingname'];
	  $level=$row['level'];
	  $subject=$row['subject'];
	  }

?>

<HTML>
<HEAD>
 <TITLE>Update Training Subject</TITLE>
  <link rel="stylesheet" href="../CSS/main_table.css">
  <link rel="stylesheet" href="../CSS/sidemenu.css">
</HEAD>
<BODY class="bg">
    <form method="Post" Action="../Object/Update_Training.php">
    <table class="maintable">
    <tr>
    <td colspan="2" align="center">Training</td>
    </tr>
    </tr>
    <td>ID</td>
    <td>
    <input type="text" name="txtid" size="20" value="<?php echo $id;?>">
     </td>
    </tr>
	<tr>
    <td>Name of Training</td>
    <td><select name="cmbtraining">
						<option><?php echo $training;?></option>
                         <option>शिक्षक पेशागत विकासशिक्षक पेशागत विकास</option>
                        <option>पुनर्ताजगी</option>
                        <option>नेतृत्व तथा व्यवस्थापन</option>
                </select>
    </td>
    </tr>
        <tr>
    <td>Level</td>
    <td><select name="cmblevel">
	<option><?php echo $level;?></option>
         <option>वालविकास केन्द्र</option>
         <option>आधारभूत (१ –५)</option>
         <option>आधारभूत (६ –८)</option>
         <option>माध्यमिक(९ –१०)</option>
         <option>माध्यमिक(११ –१२)</option>
         <option>शिक्षक प्रमुख</option>
         <option>अन्य</option>
</select>
     </td>
    </tr>
    <td>Subject</td>
    <td>
    <input type="text" name="txtsubject" size="50" value="<?php echo $subject;?>">
     </td>
    </tr>
<tr>
    <td colspan="2" align="center"><input type="submit" name="btnsave" value="Update" class="button"></td>
    </tr>
    </table>
    </form>
</BODY>
</HTML>
