<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$dn=$_POST['cmbdistrict'];
$mv=$_POST['cmbmv'];
$office=$_POST['txtofficename'];
$phone=$_POST['txtphone'];
$mobile=$_POST['txtmobile'];
$email=$_POST['txtemail'];
$group=$_POST['cmbgroup'];
$head=$_POST['txthead'];

//$districtobject->savedistrict($dn, $mv, $wn);
//echo "Records Saved";
if($dn=="" and $mv=="" and $mobile=="" and $office=="" and $group=="")
{
 echo "Fields are Required";
}
else
{
 $sql1 = "SELECT * FROM tblcontact where mobileno='$mobile'";
$result = $conn->query($sql1);

if ($result->num_rows > 0)
   {
    // output data of each row
   // while($row = $result->fetch_assoc()) {
     //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
     header('Location: ../Admin/create.php?msg="Found Duplicate"');
    }
 else
  {
     $sql = "INSERT INTO tblcontact(districtname, municipality, organization, phone, mobileno, email, ctype, officehead, remark) values('$dn', '$mv', '$office','$phone','$mobile','$email','$group','$head','Active')";
      if (mysqli_query($conn, $sql))
         {
            header('Location: ../Admin/create.php?msg= "Saved Successfully"');
          }
      else
          {
         $message= "save_contact: " . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  header('Location: ../Admin/create.php?msg= "Sorry, Try Later..."');
          }
  }
}
mysqli_close($conn);
?>
