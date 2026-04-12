<?php
session_start();
include("../Processing/db_connection.php");
$output='';
$output .='
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
</tr>';
$i=1;
if($_SESSION["listtype"]=="Selected")
      {
                     
            if($_SESSION["chkdistrict"]=="district" and $_SESSION["chkpalika"]=="palika" and $_SESSION["chklevel"]=="level" and $_SESSION["chksubject"]="subject")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$_SESSION["district"]."' and munvdc='".$_SESSION["munvdc"]."' and appointlocallevel='".$_SESSION["level"]."' and trainingsubject='".$_SESSION["subject"]."' and remark='Selected' ORDER BY appid";
                  }
            elseif($_SESSION["chkdistrict"]=="district")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$_SESSION["district"]."' and remark='Selected' ORDER BY appid";
                  }
            elseif($_SESSION["chkdistrict"]=="district" and $_SESSION["chkpalika"]=="palika")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$_SESSION["district"]."' and munvdc='".$_SESSION["munvdc"]."' and remark='Selected' ORDER BY appid";
                  }
            elseif($_SESSION["chkdistrict"]=="district" and $_SESSION["chkpalika"]=="palika" and $_SESSION["chklevel"]=="level")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$_SESSION["district"]."' and munvdc='".$_SESSION["munvdc"]."' and appointlocallevel='".$_SESSION["level"]."' and remark='Selected' ORDER BY appid";
                  }
            elseif($_SESSION["chksubject"]=="subject")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where trainingsubject='".$_SESSION["subject"]."' and remark='Selected' ORDER BY appid";
                  }
            elseif($_SESSION["chklevel"]=="level" and $_SESSION["chksubject"]="subject")
                  {
                        
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where appointlocallevel='".$_SESSION["level"]."' and trainingsubject='".$_SESSION["subject"]."' and remark='Selected' ORDER BY appid";
                  }
            elseif($_SESSION["chkdistrict"]=="district" and $_SESSION["chklevel"]=="level" and $_SESSION["chksubject"]="subject")
                  {
                        
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$_SESSION["district"]."' and appointlocallevel='".$_SESSION["level"]."' and trainingsubject='".$_SESSION["subject"]."' and remark='Selected' ORDER BY appid";
                  }

            else
                  {
                        
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where remark='Selected' ORDER BY appid";
                        
                  }
      }
elseif($_SESSION["listtype"]=="NotSelected")
      {
            
            if($_SESSION["chkdistrict"]=="district" and $_SESSION["chkpalika"]=="palika" and $_SESSION["chklevel"]=="level" and $_SESSION["chksubject"]="subject")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$_SESSION["district"]."' and munvdc='".$_SESSION["munvdc"]."' and appointlocallevel='".$_SESSION["level"]."' and trainingsubject='".$_SESSION["subject"]."' and remark<>'Selected' ORDER BY appid";
                  }
            elseif($_SESSION["chkdistrict"]=="district")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$_SESSION["district"]."' and remark<>'Selected' ORDER BY appid";
                  }
            elseif($_SESSION["chkdistrict"]=="district" and $_SESSION["chkpalika"]=="palika")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$_SESSION["district"]."' and munvdc='".$_SESSION["munvdc"]."' and remark<>'Selected' ORDER BY appid";
                  }
            elseif($_SESSION["chkdistrict"]=="district" and $_SESSION["chkpalika"]=="palika" and $_SESSION["chklevel"]=="level")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$_SESSION["district"]."' and munvdc='".$_SESSION["munvdc"]."' and appointlocallevel='".$_SESSION["level"]."' and remark<>'Selected' ORDER BY appid";
                  }
            elseif($_SESSION["chksubject"]=="subject")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where trainingsubject='".$_SESSION["subject"]."' and remark<>'Selected' ORDER BY appid";
                  }
            elseif($_SESSION["chklevel"]=="level" and $_SESSION["chksubject"]="subject")
                  {
                        
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where appointlocallevel='".$_SESSION["level"]."' and trainingsubject='".$_SESSION["subject"]."' and remark<>'Selected' ORDER BY appid";
                  }
            elseif($_SESSION["chkdistrict"]=="district" and $_SESSION["chklevel"]=="level" and $_SESSION["chksubject"]="subject")
                  {
                        
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$_SESSION["district"]."' and appointlocallevel='".$_SESSION["level"]."' and trainingsubject='".$_SESSION["subject"]."' and remark<>'Selected' ORDER BY appid";
                  }

            else
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where remark<>'Selected' ORDER BY appid";
                        
                  }
      }
elseif($_SESSION["listtype"]=="All")
      {
            if($_SESSION["chkdistrict"]=="district" and $_SESSION["chkpalika"]=="palika" and $_SESSION["chklevel"]=="level" and $_SESSION["chksubject"]="subject")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$_SESSION["district"]."' and munvdc='".$_SESSION["munvdc"]."' and appointlocallevel='".$_SESSION["level"]."'and trainingsubject='".$_SESSION["subject"]."' ORDER BY appid";
                  }
            elseif($_SESSION["chkdistrict"]=="district")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$_SESSION["district"]."' ORDER BY appid";
                  }
            elseif($_SESSION["chkdistrict"]=="district" and $_SESSION["chkpalika"]=="palika")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$_SESSION["district"]."' and munvdc='".$_SESSION["munvdc"]."' ORDER BY appid";
                  }
            elseif($_SESSION["chkdistrict"]=="district" and $_SESSION["chkpalika"]=="palika" and $_SESSION["chklevel"]=="level")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$_SESSION["district"]."' and munvdc='".$_SESSION["munvdc"]."' and appointlocallevel='".$_SESSION["level"]."' ORDER BY appid";
                  }
            elseif($_SESSION["chksubject"]=="subject")
                  {
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where trainingsubject='".$_SESSION["subject"]."' ORDER BY appid";
                  }
            elseif($_SESSION["chklevel"]=="level" and $_SESSION["chksubject"]="subject")
                  {
                        
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where appointlocallevel='".$_SESSION["level"]."' and trainingsubject='".$_SESSION["subject"]."' ORDER BY appid";
                  }
            elseif($_SESSION["chkdistrict"]=="district" and $_SESSION["chklevel"]=="level" and $_SESSION["chksubject"]="subject")
                  {
                        
                        $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingsubject,appointlocallevel,district, munvdc,priority1model FROM tblapplication where district='".$_SESSION["district"]."' and appointlocallevel='".$_SESSION["level"]."' and trainingsubject='".$_SESSION["subject"]."' ORDER BY appid";
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
            $output .='
            <td align=center>' . $i .'</td>
            <td>'.$row["tname"].'</td>
            <td align=center>'.$row["mobileno"].'</td>
            <td align=center>'. $row["trainingsubject"].'</td>
            <td align=center>'. $row["appointlocallevel"].'</td>
            <td align=center>'. $row["district"].'</td>
            <td align=center>'. $row["munvdc"].'</td>
            <td align=center>'. $row["priority1model"].'</td>
            <td>'.$row["schoolname"].'</td>
            <td>'.$row["appointdate"].'</td>
            <td align=center>'.$row["appointsubject"].'</td>
            </tr>';
            $i++;
            }
            }
  mysqli_close($conn);
$output .= '</table>';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=application_details.xls");
echo $output;
?>
