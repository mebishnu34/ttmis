<?php
session_start();
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
  <script>
 function district(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../dropdistrict.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

</HEAD>
<BODY class="bg">
<div align="center">
<table class="maintable">
<tr>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td  valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130"></td>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
</table>
<?php
include("../Processing/db_connection.php");
include("../print_function.php");
?>
<form action="#" method="POST">
<table width="100%" bgcolor="lightblue" border="1">
      
      <tr>
            <th><input type="Radio" name="listtype" value="Selected" checked="true"> छनाेट भएका</th>
            <th><?php include("../district_list.htm");?></th>
            <th id="txtHint">
            Municipality
            </th>
            <th><select name="cmblevel" class="custom-combo" id="cmblevel" onchange="checkBoxAuto()">
         <option value="">तह छान्नुहोस्</option>
            <option value="प्रारम्भिक वालविकास र शिक्षा">प्रारम्भिक वालविकास र शिक्षा</option>
            <option value="आधारभूत तह कक्षा १-५">आधारभूत तह कक्षा १-५</option>
            <option value="आधारभूत तह कक्षा ६-८">आधारभूत तह कक्षा ६-८</option>
            <option value="माध्यमिक तह कक्षा ९-१०">माध्यमिक तह कक्षा ९-१०</option>
            <option value="माध्यमिक तह कक्षा ११-१२">माध्यमिक तह कक्षा ११-१२</option>
            <option value="५ औं तह">५ औं तह</option>
            <option value="६ औं तह">६ औं तह</option>
            <option value="७ औं तह">७ औं तह</option>
            <option value="८ औं तह">८ औं तह</option>
  </select></th>
            <script>
                  function checkBoxAuto()
                  {
                        const select = document.getElementById("cmblevel");
                        const checkbox = document.getElementById("chklevel");
                        if(select.value !=="")
                        {
                              checkbox.checked = true;
                        }
                        else
                        {
                              checkbox.checked = false;
                        }
                  }
            </script>
            <th><?php include("training_category.html");?></th>
            <script>
                  function checktraining()
                  {
                        const select = document.getElementById("trainingcategory");
                        const checkbox = document.getElementById("chkcategory");
                        if(select.value !=="")
                        {
                              checkbox.checked = true;
                        }
                        else
                        {
                              checkbox.checked = false;
                        }
                  }
            </script>
            <th>
		<input type="Button" name="btnprint" value="Print" onClick="javascript:CallPrint('pdata');">
            </th>
</tr>
<tr>
            <th><input type="Radio" name="listtype" value="NotSelected"> छनाेट नभएका &nbsp;<input type="Radio" name="listtype" value="All">सबै</th>
            <th><input type="Checkbox" name="chkdistrict" value="district"> District</div>
            <th><input type="Checkbox" name="chkpalika" value="palika"> Palika</div>
            <th><input type="Checkbox"  id="chklevel" name="chklevel" value="level"> Level</div>
            <th><input type="Checkbox" id="chkcategory" name="chksubject" value="subject"> Subject</div>
            <th>
		<input type="Submit" value="Display" name="btndisplay">
</th>
</tr>
</table>
</form>
<?php
if(isset($_POST["btndisplay"]))
      {
      $district="";$palika="";$level="";$subject="";$districtcheck="";$palikacheck="";$levelcheck="";$subjectcheck="";
      $_SESSION["district"]="";
      if(isset($_POST["cmbdistrict"]))
            {
      $district=$_POST["cmbdistrict"];
            $_SESSION["district"]=$district;
            }
      $_SESSION["munvdc"]="";
      if(isset($_POST["cmbmv"]))
            {
      $palika=$_POST["cmbmv"];
      $_SESSION["munvdc"]=$palika;
            }
      $_SESSION["level"]="";
      if(isset($_POST["cmblevel"]))
            {
      $level=$_POST["cmblevel"];
      $_SESSION["level"]=$level;
            }
      $_SESSION["category"]="";
      if(isset($_POST["cmbtrainingcategory"]))
            {
      $subject=$_POST["cmbtrainingcategory"];
      $_SESSION["category"]=$subject;
            }
$_SESSION["chkdistrict"]="";
if(isset($_POST["chkdistrict"]))
      {
      $districtcheck=$_POST["chkdistrict"];
      $_SESSION["chkdistrict"]=$districtcheck;
      }
$_SESSION["chkpalika"]="";
      if(isset($_POST["chkpalika"]))
            {
      $palikacheck=$_POST["chkpalika"];
      $_SESSION["chkpalika"]=$palikacheck;
            }
      $_SESSION["chklevel"]="";
      if(isset($_POST["chklevel"]))
            {
      $levelcheck=$_POST["chklevel"];
      $_SESSION["chklevel"]=$levelcheck;
            }
      $_SESSION["chksubject"]="";
      if(isset($_POST["chksubject"]))
            {
      $subjectcheck=$_POST["chksubject"];
      $_SESSION["chksubject"]=$subjectcheck;
            }

?>
<div id="pdata">
<form method="post" action="../export/export_application_details.php">
<table width="150%" bgcolor="#FFFFFF" border="1" cellspacing="0" cellpadding="2" id="datatable">
<tr>
<th align="center">
      <font size="+2"><b>तालिमको लागि प्राप्त आवेदनहरु</b></font>
 <table width="150%" bgcolor="#FFFFFF" border="1" cellspacing="0" cellpadding="2">
 <tr>
<th>S.No</th>
<th>शिक्षककाे नाम</th>
<th>माेबाइल न‌‍</th>
<th>तालिमको नाम</th>
<th>तह</th>
<th>जिल्ला</th>
<th>पालिका</th>
<th>तालिम माेड</th>
<th>बिद्यालय</th>
<th>नियुक्ति मिति</th>
<th>विषय</th>
<th>नियुत्ति</th>
<th>नागरिक्ता</th>
<th>विद्यालय पत्र<th>
</tr>
<?php
$i=1;
$_SESSION["listtype"]=$_POST["listtype"];
if($_POST["listtype"]=="Selected")
      {
                     
            if($districtcheck=="district" and $palikacheck=="palika" and $levelcheck=="level" and $subjectcheck="subject")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$district."' and munvdc='".$palika."' and appointlocallevel='".$level."' and trainingsubject='".$subject."' and remark='Selected' ORDER BY appid";
                  }
            elseif($districtcheck=="district")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$district."' and remark='Selected' ORDER BY appid";
                  }
            elseif($districtcheck=="district" and $palikacheck=="palika")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$district."' and munvdc='".$palika."' and remark='Selected' ORDER BY appid";
                  }
            elseif($districtcheck=="district" and $palikacheck=="palika" and $levelcheck=="level")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$district."' and munvdc='".$palika."' and appointlocallevel='".$level."' and remark='Selected' ORDER BY appid";
                  }
            elseif($subjectcheck=="subject")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where trainingsubject='".$subject."' and remark='Selected' ORDER BY appid";
                  }
            elseif($levelcheck=="level" and $subjectcheck="subject")
                  {
                        
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where appointlocallevel='".$level."' and trainingsubject='".$subject."' and remark='Selected' ORDER BY appid";
                  }
            elseif($districtcheck=="district" and $levelcheck=="level" and $subjectcheck="subject")
                  {
                        
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$district."' and appointlocallevel='".$level."' and trainingsubject='".$subject."' and remark='Selected' ORDER BY appid";
                  }

            else
                  {
                        
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where remark='Selected' ORDER BY appid";
                        
                  }
      }
elseif($_POST["listtype"]=="NotSelected")
      {
            
            if($districtcheck=="district" and $palikacheck=="palika" and $levelcheck=="level" and $subjectcheck="subject")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$district."' and munvdc='".$palika."' and appointlocallevel='".$level."' and trainingsubject='".$subject."' and remark<>'Selected' ORDER BY appid";
                  }
            elseif($districtcheck=="district")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$district."' and remark<>'Selected' ORDER BY appid";
                  }
            elseif($districtcheck=="district" and $palikacheck=="palika")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$district."' and munvdc='".$palika."' and remark<>'Selected' ORDER BY appid";
                  }
            elseif($districtcheck=="district" and $palikacheck=="palika" and $levelcheck=="level")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$district."' and munvdc='".$palika."' and appointlocallevel='".$level."' and remark<>'Selected' ORDER BY appid";
                  }
            elseif($subjectcheck=="subject")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where trainingsubject='".$subject."' and remark<>'Selected' ORDER BY appid";
                  }
            elseif($levelcheck=="level" and $subjectcheck="subject")
                  {
                        
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where appointlocallevel='".$level."' and trainingsubject='".$subject."' and remark<>'Selected' ORDER BY appid";
                  }
            elseif($districtcheck=="district" and $levelcheck=="level" and $subjectcheck="subject")
                  {
                        
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$district."' and appointlocallevel='".$level."' and trainingsubject='".$subject."' and remark<>'Selected' ORDER BY appid";
                  }

            else
                  {
                        echo "sdfdsfsdfsdfsdfsdf";
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where remark<>'Selected' ORDER BY appid";
                        
                  }
      }
elseif($_POST["listtype"]=="All")
      {
            if($districtcheck=="district" and $palikacheck=="palika" and $levelcheck=="level" and $subjectcheck="subject")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$district."' and munvdc='".$palika."' and appointlocallevel='".$level."' and trainingsubject='".$subject."' ORDER BY appid";
                  }
            elseif($districtcheck=="district")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$district."' ORDER BY appid";
                  }
            elseif($districtcheck=="district" and $palikacheck=="palika")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$district."' and munvdc='".$palika."' ORDER BY appid";
                  }
            elseif($districtcheck=="district" and $palikacheck=="palika" and $levelcheck=="level")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$district."' and munvdc='".$palika."' and appointlocallevel='".$level."' ORDER BY appid";
                  }
            elseif($subjectcheck=="subject")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where trainingsubject='".$subject."' ORDER BY appid";
                  }
            elseif($levelcheck=="level" and $subjectcheck="subject")
                  {
                        
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where appointlocallevel='".$level."' and trainingsubject='".$subject."' ORDER BY appid";
                  }
            elseif($districtcheck=="district" and $levelcheck=="level" and $subjectcheck="subject")
                  {
                        
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$district."' and appointlocallevel='".$level."' and trainingsubject='".$subject."' ORDER BY appid";
                  }

            else
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication ORDER BY appid";
                        
                  }
      }
     $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0)
            {
            while($row = $result1->fetch_assoc())
            {
            echo "<td align=center>" . $i ."</td>";
            echo "<td>".$row["tname"]."</td>";
            echo "<td align=center>".$row["mobileno"]."</td>";
            echo "<td align=center>". $row["trainingsubject"]."</td>";
            echo "<td align=center>". $row["appointlocallevel"]."</td>";
            echo "<td align=center>". $row["district"]."</td>";
            echo "<td align=center>". $row["munvdc"]."</td>";
            echo "<td align=center>". $row["priority1model"]."</td>";
            echo "<td>".$row["schoolname"]."</td>";
            echo "<td>".$row["appointdate"]."</td>";
            echo "<td align=center>".$row["appointsubject"]."</td>";
            ?>
            <td align="center">
                  <?php
                  if($row["appointletter"]<>"")
                        {
                  ?>
                  <a href="..\application_document\<?php echo $row["appointletter"];?>" target="_blank"><img src="../image/eye.png" width="20" height="15"></a>
            </td>
            <?php
                        }
                  else
                        {
                        ?>
                        <td>&nbsp;</td>
                        <?php
                        }
                        ?>
            
                  <?php
                  if($row["citizenship"]<>"")
                  {
                  ?>
                  <td align="center">
                        <a href="..\application_document\<?php echo $row["citizenship"];?>" target="_blank"><img src="../image/eye.png" width="20" height="15"></a>
                  </td>
                  <?php
                  }
                  else
                   {
                        ?>
                        <td>&nbsp;</td>
                        <?php
                        }
                        ?>
                  <?php
                  if($row["schoolrecommend"]<>"")
                  {
                  ?>
                  <td align="center">
                  <a href="..\application_document\<?php echo $row["schoolrecommend"];?>" target="_blank"><img src="../image/eye.png" width="20" height="15"></a>
                   </td>
                  <?php
                  }
                  else
                        {
                        ?>
                        <td>&nbsp;</td>
                        <?php
                        }

              echo "</tr>";
            $i++;
            }
            }
  mysqli_close($conn);
?>
</table>
</th>
</tr>
</table>
<div><input type="submit" value="Export In Excel" name="teacherdistrict"></div>
</form>
</div>
<?php
      }
?>

</body>
</html>
